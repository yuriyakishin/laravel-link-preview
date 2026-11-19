<?php

namespace Yu\LinkPreview\Data;

/**
 * The tags of a page that social networks read to build a link card.
 */
final readonly class PageTags
{
    /**
     * @param  array<string, string>  $meta  og:* and twitter:* tags, names in lower case, the first value of each
     */
    public function __construct(
        public string $url,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $canonical = null,
        public array $meta = [],
    ) {}

    public function tag(string $name): ?string
    {
        return $this->meta[$name] ?? null;
    }

    /**
     * The address of the picture a network takes: og:image, else twitter:image.
     */
    public function imageUrl(): ?string
    {
        return $this->tag('og:image') ?? $this->tag('twitter:image');
    }
}
