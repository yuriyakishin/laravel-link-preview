<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Services;

use Dom\HTMLDocument;
use Yu\LinkPreview\Data\PageTags;

/**
 * Reads the title, the description, the canonical link and the og:* and twitter:* tags of a page.
 */
class PageParser
{
    public function parse(string $html, string $url, ?string $charset = null): PageTags
    {
        $document = HTMLDocument::createFromString($html, LIBXML_NOERROR, $charset);
        $meta = [];
        $description = null;

        foreach ($document->querySelectorAll('meta[property], meta[name]') as $tag) {
            $name = strtolower(trim($tag->getAttribute('property') ?: $tag->getAttribute('name') ?? ''));
            $content = $this->clean($tag->getAttribute('content'));

            if ($content === null) {
                continue;
            }

            if ($name === 'description') {
                $description ??= $content;
            } elseif (str_starts_with($name, 'og:') || str_starts_with($name, 'twitter:')) {
                // A network takes the first tag when there are several
                $meta[$name] ??= $content;
            }
        }

        return new PageTags(
            url: $url,
            title: $this->clean($document->querySelector('title')?->textContent),
            description: $description,
            canonical: $this->clean($document->querySelector('link[rel~="canonical" i]')?->getAttribute('href')),
            meta: $meta,
        );
    }

    private function clean(?string $value): ?string
    {
        $value = trim(preg_replace('/\s+/u', ' ', $value ?? ''));

        return $value === '' ? null : $value;
    }
}
