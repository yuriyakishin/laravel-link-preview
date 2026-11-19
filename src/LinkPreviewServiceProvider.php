<?php

namespace Yu\LinkPreview;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Yu\LinkPreview\Livewire\LinkPreviewComponent;

class LinkPreviewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/link-preview.php', 'link-preview');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'link-preview');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'link-preview');

        // The name is required: without it Livewire 4 makes up a hash and <livewire:link-preview /> is not found
        Livewire::component('link-preview', LinkPreviewComponent::class);
    }
}
