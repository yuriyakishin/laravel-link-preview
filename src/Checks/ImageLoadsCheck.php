<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * I2: the picture opens and is a picture networks can show.
 */
class ImageLoadsCheck implements PreviewCheck
{
    public function run(Snapshot $site): Check
    {
        $image = $site->image;

        if ($image === null) {
            return Check::skip('I2', 10, 'no_image');
        }

        return $image->isLoaded()
            ? Check::pass('I2', 10, 'ok', ['type' => $image->type], [$image->url])
            : Check::fail('I2', 10, $image->error, $image->replace, [$image->url]);
    }
}
