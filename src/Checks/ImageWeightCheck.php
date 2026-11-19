<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I5: a light file, up to 1 MB; messengers load heavy pictures slowly or skip them.
 */
class ImageWeightCheck implements PreviewCheck
{
    public const int LIMIT = 1024 * 1024;

    public function run(Snapshot $site): Check
    {
        $image = $site->loadedImage();

        if ($image === null) {
            return Check::skip('I5', 5, 'no_image');
        }

        $replace = ['size' => (int) ceil($image->bytes / 1024)];

        return $image->bytes <= self::LIMIT
            ? Check::pass('I5', 5, 'ok', $replace)
            : Check::warn('I5', 2, 5, 'heavy', $replace);
    }
}
