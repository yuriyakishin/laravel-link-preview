<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I4: proportions close to 1.91:1, so a large card does not crop the picture.
 */
class ImageRatioCheck implements PreviewCheck
{
    public function run(Snapshot $site): Check
    {
        $image = $site->loadedImage();

        if ($image === null || $image->height === 0) {
            return Check::skip('I4', 5, 'no_image');
        }

        $ratio = $image->width / $image->height;
        $replace = ['ratio' => number_format($ratio, 2)];

        return $ratio >= 1.7 && $ratio <= 2.1
            ? Check::pass('I4', 5, 'ok', $replace)
            : Check::warn('I4', 2, 5, 'cropped', $replace);
    }
}
