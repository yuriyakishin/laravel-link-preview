<?php

namespace Yu\LinkPreview\Data;

/**
 * Everything the checks and the previews need: the page tags and the picture.
 */
final readonly class Snapshot
{
    public function __construct(
        public PageTags $page,
        public ?ImageFile $image = null,
    ) {}

    public function loadedImage(): ?ImageFile
    {
        return $this->image?->isLoaded() ? $this->image : null;
    }
}
