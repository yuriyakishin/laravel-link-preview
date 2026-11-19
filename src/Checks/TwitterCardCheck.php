<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * M4: twitter:card; summary_large_image gives a large card with the picture in X.
 */
class TwitterCardCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta name="twitter:card" content="summary_large_image">';

    public function run(Snapshot $site): Check
    {
        $card = $site->page->tag('twitter:card');

        return match ($card) {
            null => Check::fail('M4', 5, 'none', snippet: self::SNIPPET),
            'summary_large_image' => Check::pass('M4', 5, 'ok', evidence: [$card]),
            'summary' => Check::warn('M4', 3, 5, 'small', evidence: [$card], snippet: self::SNIPPET),
            default => Check::warn('M4', 2, 5, 'unknown', evidence: [$card], snippet: self::SNIPPET),
        };
    }
}
