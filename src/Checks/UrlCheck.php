<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * M1: og:url, the address networks count likes and shares for; it should match the canonical address.
 */
class UrlCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:url" content="https://example.com/page">';

    public function run(Snapshot $site): Check
    {
        $url = $site->page->tag('og:url');
        $canonical = $site->page->canonical;

        if ($url === null) {
            return Check::fail('M1', 5, 'none', snippet: self::SNIPPET);
        }

        if ($canonical !== null && $this->normalize($url) !== $this->normalize($canonical)) {
            return Check::warn('M1', 2, 5, 'mismatch', ['canonical' => $canonical], [$url]);
        }

        return Check::pass('M1', 5, 'ok', evidence: [$url]);
    }

    private function normalize(string $url): string
    {
        return rtrim(strtolower($url), '/');
    }
}
