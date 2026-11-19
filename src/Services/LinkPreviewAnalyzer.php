<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Services;

use Yu\LinkPreview\Checks;
use Yu\LinkPreview\Data\Snapshot;
use Yu\WebToolsCore\Checklist\ChecklistReport;

/**
 * Collects the page and its picture, runs the checks and builds the card previews.
 */
class LinkPreviewAnalyzer
{
    /**
     * Checks by group, in the order of the report: T — title and description, I — the picture, M — other tags.
     * The letter codes are internal keys of the translations, the report never shows them.
     */
    public const array GROUPS = [
        'T' => [Checks\TitleCheck::class, Checks\DescriptionCheck::class],
        'I' => [Checks\ImageTagCheck::class, Checks\ImageLoadsCheck::class, Checks\ImageSizeCheck::class, Checks\ImageRatioCheck::class, Checks\ImageWeightCheck::class, Checks\ImageAltCheck::class],
        'M' => [Checks\UrlCheck::class, Checks\TypeCheck::class, Checks\SiteNameCheck::class, Checks\TwitterCardCheck::class],
    ];

    public function __construct(private SnapshotCollector $collector, private PreviewBuilder $previews) {}

    /**
     * The checklist report with the card previews under the key "previews".
     *
     * @return array<string, mixed>
     */
    public function analyze(string $url, string $locale): array
    {
        $site = $this->collector->collect($url);

        return [...$this->report($site, $locale)->toArray(), 'previews' => $this->previews->build($site)];
    }

    public function report(Snapshot $site, string $locale): ChecklistReport
    {
        $groups = [];
        foreach (self::GROUPS as $group => $checks) {
            $groups[$group] = array_map(fn (string $check) => app($check)->run($site), $checks);
        }

        return new ChecklistReport(
            url: $site->page->url,
            locale: $locale,
            checkedAt: now()->toIso8601String(),
            ruleset: (string) config('link-preview.ruleset'),
            groups: $groups,
        );
    }
}
