<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * T1: the card title, og:title; without it networks take the <title> of the page.
 */
class TitleCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:title" content="Short title of the page">';

    public function run(Snapshot $site): Check
    {
        $title = $site->page->tag('og:title');

        if ($title === null) {
            return $site->page->title === null
                ? Check::fail('T1', 15, 'none', snippet: self::SNIPPET)
                : Check::warn('T1', 7, 15, 'fallback', evidence: [$site->page->title], snippet: self::SNIPPET);
        }

        $length = mb_strlen($title);

        return match (true) {
            $length < 10 => Check::warn('T1', 10, 15, 'short', ['length' => $length], [$title]),
            $length > 70 => Check::warn('T1', 10, 15, 'long', ['length' => $length], [$title]),
            default => Check::pass('T1', 15, 'ok', ['length' => $length], [$title]),
        };
    }
}
