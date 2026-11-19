<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Data;

/**
 * The downloaded og:image: its size and type, or why it could not be read.
 */
final readonly class ImageFile
{
    /**
     * @param  string|null  $error  status, not_image, svg, too_large or unreachable; null when the image was read
     * @param  array<string, string|int>  $replace  placeholders for the error note
     */
    public function __construct(
        public string $url,
        public ?string $error = null,
        public array $replace = [],
        public ?string $type = null,
        public int $width = 0,
        public int $height = 0,
        public int $bytes = 0,
    ) {}

    public function isLoaded(): bool
    {
        return $this->error === null;
    }
}
