<?php

namespace Yu\LinkPreview\Services;

use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use Yu\LinkPreview\Data\ImageFile;
use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Exceptions\ToolException;
use Yu\WebToolsCore\Http\SafeFetcher;

/**
 * Downloads the page and its og:image the way a social network does.
 */
class SnapshotCollector
{
    public function __construct(private SafeFetcher $fetcher, private PageParser $parser) {}

    /**
     * @throws ToolException when the page itself cannot be read
     */
    public function collect(string $url): Snapshot
    {
        $page = $this->fetcher->fetch($url, ['text/html', 'application/xhtml'], (int) config('link-preview.fetch.page_bytes'), 'text/html,application/xhtml+xml');

        if ($page->status !== 200) {
            throw new ToolException('http_error', ['status' => $page->status]);
        }

        $tags = $this->parser->parse($page->body, $page->url, $page->charset);
        $imageUrl = $tags->imageUrl();

        return new Snapshot($tags, $imageUrl === null ? null : $this->image((string) UriResolver::resolve(new Uri($page->url), new Uri($imageUrl))));
    }

    /**
     * A problem with the picture is a finding of the report, not an error of the check.
     */
    private function image(string $url): ImageFile
    {
        try {
            $file = $this->fetcher->fetch($url, ['image/'], (int) config('link-preview.fetch.image_bytes'), 'image/*');
        } catch (ToolException $e) {
            return new ImageFile($url, match ($e->reason) {
                'unsupported_type' => 'not_image',
                'too_large' => 'too_large',
                'http_error' => 'status',
                default => 'unreachable',
            }, $e->replace);
        }

        if ($file->status !== 200) {
            return new ImageFile($url, 'status', ['status' => $file->status]);
        }

        // Social networks do not show SVG pictures
        if (str_contains($file->contentType, 'svg')) {
            return new ImageFile($url, 'svg', type: 'image/svg+xml', bytes: strlen($file->body));
        }

        $size = @getimagesizefromstring($file->body);

        if ($size === false) {
            return new ImageFile($url, 'not_image');
        }

        return new ImageFile($url, type: $size['mime'], width: $size[0], height: $size[1], bytes: strlen($file->body));
    }
}
