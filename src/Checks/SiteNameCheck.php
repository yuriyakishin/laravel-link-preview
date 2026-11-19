<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * M3: og:site_name, the name messengers show above the card title.
 */
class SiteNameCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:site_name" content="Name of the site">';

    public function run(Snapshot $site): Check
    {
        $name = $site->page->tag('og:site_name');

        return $name === null
            ? Check::fail('M3', 5, 'none', snippet: self::SNIPPET)
            : Check::pass('M3', 5, 'ok', evidence: [$name]);
    }
}
