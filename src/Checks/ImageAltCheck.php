<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I6: og:image:alt, the text of the picture for screen readers.
 */
class ImageAltCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:image:alt" content="What the picture shows">';

    public function run(Snapshot $site): Check
    {
        if ($site->page->imageUrl() === null) {
            return Check::skip('I6', 5, 'no_image');
        }

        $alt = $site->page->tag('og:image:alt') ?? $site->page->tag('twitter:image:alt');

        return $alt === null
            ? Check::warn('I6', 2, 5, 'none', snippet: self::SNIPPET)
            : Check::pass('I6', 5, 'ok', evidence: [$alt]);
    }
}
