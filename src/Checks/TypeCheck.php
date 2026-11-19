<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * M2: og:type, what the page is (website, article, product).
 */
class TypeCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:type" content="website">';

    public function run(Snapshot $site): Check
    {
        $type = $site->page->tag('og:type');

        return $type === null
            ? Check::fail('M2', 5, 'none', snippet: self::SNIPPET)
            : Check::pass('M2', 5, 'ok', evidence: [$type]);
    }
}
