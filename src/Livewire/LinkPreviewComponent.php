<?php

declare(strict_types=1);

namespace Yu\LinkPreview\Livewire;

use Illuminate\Contracts\View\View;
use Yu\LinkPreview\Events\LinkPreviewEvent;
use Yu\LinkPreview\Services\LinkPreviewAnalyzer;
use Yu\LinkPreview\Services\PreviewBuilder;
use Yu\WebToolsCore\Livewire\ToolComponent;
use Yu\WebToolsCore\Locale\LocaleResolver;

/**
 * The link preview check: the form, the loading log, the cards of each network and the checklist report.
 */
class LinkPreviewComponent extends ToolComponent
{
    protected function name(): string
    {
        return 'link-preview';
    }

    protected function event(): string
    {
        return LinkPreviewEvent::class;
    }

    protected function locales(): LocaleResolver
    {
        return new LocaleResolver(dirname(__DIR__, 2).'/resources/lang');
    }

    protected function run(string $url, string $locale): array
    {
        return app(LinkPreviewAnalyzer::class)->analyze($url, $locale);
    }

    public function render(): View
    {
        return view('link-preview::link-preview', ['icons' => $this->icons()]);
    }

    /**
     * One-colour SVG icons of the networks by platform key, from resources/icons.
     *
     * @return array<string, string>
     */
    private function icons(): array
    {
        $icons = [];
        foreach (array_keys(PreviewBuilder::PLATFORMS) as $platform) {
            $icons[$platform] = (string) file_get_contents(dirname(__DIR__, 2).'/resources/icons/'.$platform.'.svg');
        }

        return $icons;
    }
}
