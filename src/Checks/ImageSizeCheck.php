<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I3: at least 1200×630 for a large card; below 600×315 networks show a small thumbnail.
 */
class ImageSizeCheck implements PreviewCheck
{
    public function run(Snapshot $site): Check
    {
        $image = $site->loadedImage();

        if ($image === null) {
            return Check::skip('I3', 10, 'no_image');
        }

        $replace = ['width' => $image->width, 'height' => $image->height];

        return match (true) {
            $image->width >= 1200 && $image->height >= 630 => Check::pass('I3', 10, 'ok', $replace),
            $image->width >= 600 && $image->height >= 315 => Check::warn('I3', 5, 10, 'medium', $replace),
            default => Check::fail('I3', 10, 'small', $replace),
        };
    }
}
