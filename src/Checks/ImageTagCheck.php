<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I1: og:image with a full address.
 */
class ImageTagCheck implements PreviewCheck
{
    public const string SNIPPET = '<meta property="og:image" content="https://example.com/images/preview-1200x630.jpg">';

    public function run(Snapshot $site): Check
    {
        $image = $site->page->tag('og:image');

        if ($image === null) {
            $twitter = $site->page->tag('twitter:image');

            return $twitter === null
                ? Check::fail('I1', 20, 'none', snippet: self::SNIPPET)
                : Check::warn('I1', 10, 20, 'twitter_only', evidence: [$twitter], snippet: self::SNIPPET);
        }

        return preg_match('~^https?://~i', $image)
            ? Check::pass('I1', 20, 'ok', evidence: [$image])
            : Check::warn('I1', 10, 20, 'relative', evidence: [$image], snippet: self::SNIPPET);
    }
}
