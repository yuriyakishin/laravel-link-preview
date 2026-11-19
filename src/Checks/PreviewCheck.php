<?php

namespace Yu\LinkPreview\Checks;

use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\Check;

/**
 * One rule of the report. Its title, description and advice are translations under messages.checks.{code}.
 */
interface PreviewCheck
{
    public function run(Snapshot $site): Check;
}
