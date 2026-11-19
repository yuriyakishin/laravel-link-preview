<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * T2: the card description, og:description; without it networks take the meta description.
 */
class DescriptionCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:description" content="One or two sentences about what the visitor will find on the page">';

    public function run(Snapshot $site): Check
    {
        $description = $site->page->tag('og:description');

        if ($description === null) {
            return $site->page->description === null
                ? Check::fail('T2', 10, 'none', snippet: self::SNIPPET)
                : Check::warn('T2', 5, 10, 'fallback', evidence: [$site->page->description], snippet: self::SNIPPET);
        }

        $length = mb_strlen($description);

        return match (true) {
            $length < 50 => Check::warn('T2', 6, 10, 'short', ['length' => $length], [$description]),
            $length > 200 => Check::warn('T2', 6, 10, 'long', ['length' => $length], [$description]),
            default => Check::pass('T2', 10, 'ok', ['length' => $length], [$description]),
        };
    }
}
