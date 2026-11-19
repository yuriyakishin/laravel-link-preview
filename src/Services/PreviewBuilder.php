<?php

namespace Yu\LinkPreview\Services;

use Yu\LinkPreview\Data\Snapshot;

/**
 * What each network would put in the link card: its own fallbacks for the title and the picture,
 * texts cut to roughly the length it shows. The cards are an approximation; every network changes its look.
 */
class PreviewBuilder
{
    /** Roughly how many characters of the title and the description each network shows; 0 hides the description. */
    public const array PLATFORMS = [
        'telegram' => ['title' => 80, 'description' => 200],
        'facebook' => ['title' => 90, 'description' => 110],
        'x' => ['title' => 70, 'description' => 0],
        'linkedin' => ['title' => 70, 'description' => 0],
        'viber' => ['title' => 60, 'description' => 90],
        'whatsapp' => ['title' => 60, 'description' => 90],
    ];

    /**
     * @return array<string, array{title: ?string, description: ?string, image: ?string, large: bool, domain: string, siteName: ?string}>
     */
    public function build(Snapshot $site): array
    {
        $page = $site->page;
        $image = $site->loadedImage();
        $domain = preg_replace('/^www\./', '', (string) parse_url($page->tag('og:url') ?? $page->url, PHP_URL_HOST));
        $title = $page->tag('og:title') ?? $page->title;
        $description = $page->tag('og:description') ?? $page->description;
        $large = $image !== null && $image->width >= 600 && $image->height >= 315;
        $previews = [];

        foreach (self::PLATFORMS as $platform => $limits) {
            $platformTitle = $platform === 'x' ? ($page->tag('twitter:title') ?? $title) : $title;

            $previews[$platform] = [
                'title' => $this->cut($platformTitle, $limits['title']),
                'description' => $limits['description'] > 0 ? $this->cut($description, $limits['description']) : null,
                'image' => $image?->url,
                'large' => $platform === 'x' ? $image !== null && $page->tag('twitter:card') === 'summary_large_image' : $large,
                'domain' => $domain,
                'siteName' => $page->tag('og:site_name'),
            ];
        }

        return $previews;
    }

    private function cut(?string $text, int $limit): ?string
    {
        if ($text === null || mb_strlen($text) <= $limit) {
            return $text;
        }

        return rtrim(mb_substr($text, 0, $limit - 1)).'…';
    }
}
