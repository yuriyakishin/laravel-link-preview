@php($t = fn (string $key, array $replace = []) => __('link-preview::messages.'.$key, $replace, $locale))
{{-- Icons: Simple Icons (CC0), one colour, next to the name only; the cards themselves stay neutral --}}
@php($networks = ['telegram' => 'Telegram', 'facebook' => 'Facebook', 'x' => 'X', 'linkedin' => 'LinkedIn', 'viber' => 'Viber', 'whatsapp' => 'WhatsApp'])

<div class="wt" lang="{{ $locale }}" x-data="{
        step: 0,
        timer: null,
        start() { this.step = 0; clearInterval(this.timer); this.timer = setInterval(() => this.step = Math.min(this.step + 1, 2), 1200) },
        again() { this.$refs.form.scrollIntoView({ behavior: 'smooth', block: 'center' }); this.$refs.url.focus({ preventScroll: true }); this.$refs.url.select() },
    }" @wt-again="again()">
    <form class="wt-tool" wire:submit="analyze" @submit="start()" x-ref="form" novalidate>
        <div class="wt-row">
            <div @class(['wt-field', 'wt-field-err' => $errors->has('url')])>
                <input id="wt-url" type="text" inputmode="url" autocomplete="url" placeholder=" "
                       wire:model="url" x-ref="url">
                <label for="wt-url">{{ $t('form.label') }}</label>
            </div>
            <button type="submit" class="wt-go" wire:loading.attr="disabled" wire:target="analyze">
                <span wire:loading.remove wire:target="analyze">{{ $t('form.button') }}</span>
                <span wire:loading wire:target="analyze" class="wt-spin" aria-hidden="true"></span>
            </button>
        </div>
        <p class="wt-hint">{{ $t('form.hint', ['count' => config('link-preview.rate_limit.per_hour')]) }}</p>
        @error('url')<p class="wt-error">{{ $message }}</p>@enderror
        @if ($error)
            <p class="wt-error" role="alert">{{ $error }}</p>
        @endif
    </form>

    {{-- Lines light up on a timer while one request runs; the server does not report its steps --}}
    <div class="wt-log" wire:loading.block wire:target="analyze" aria-hidden="true">
        @foreach (['page', 'image', 'checks'] as $i => $line)
            <p :class="{ 'wt-run': step === {{ $i }}, 'wt-done': step > {{ $i }} }">{{ $t('loading.'.$line) }}</p>
        @endforeach
    </div>

    @if ($report)
        <div wire:loading.remove wire:target="analyze" aria-live="polite">
            <section class="lp-previews" aria-labelledby="lp-previews-title">
                <h3 id="lp-previews-title">{{ $t('previews.title') }}</h3>
                <p class="lp-note">{{ $t('previews.note') }}</p>

                <div class="lp-grid">
                    @foreach ($report['previews'] as $platform => $card)
                        <figure class="lp-p lp-{{ $platform }}">
                            <figcaption>{!! $icons[$platform] !!}{{ $networks[$platform] }}</figcaption>
                            <div @class(['lp-card', 'lp-large' => $card['large'], 'lp-small' => !$card['large'] && $card['image']])>
                                @if ($card['image'])
                                    <img class="lp-img" src="{{ $card['image'] }}" alt="" loading="lazy" referrerpolicy="no-referrer">
                                @endif
                                <div class="lp-body">
                                    @if ($platform === 'telegram' && $card['siteName'])
                                        <span class="lp-site">{{ $card['siteName'] }}</span>
                                    @elseif (in_array($platform, ['facebook', 'linkedin'], true))
                                        <span class="lp-domain">{{ $card['domain'] }}</span>
                                    @endif
                                    <b class="lp-title">{{ $card['title'] ?? $t('previews.no_title') }}</b>
                                    @if ($card['description'])
                                        <span class="lp-text">{{ $card['description'] }}</span>
                                    @endif
                                    @if (in_array($platform, ['x', 'viber', 'whatsapp'], true))
                                        <span class="lp-domain">{{ $card['domain'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </figure>
                    @endforeach
                </div>
            </section>

            @include('web-tools-core::checklist-report', ['report' => $report, 'tool' => 'link-preview', 'locale' => $locale])

            {{-- Networks keep a card for days; after a fix the old one has to be dropped by hand --}}
            <section class="lp-refresh" aria-labelledby="lp-refresh-title">
                <h3 id="lp-refresh-title">{{ $t('refresh.title') }}</h3>
                <p>{{ $t('refresh.text') }}</p>
                <ul>
                    <li><b>Facebook</b> — {{ $t('refresh.facebook') }}
                        <a href="https://developers.facebook.com/tools/debug/?q={{ urlencode($report['url']) }}" target="_blank" rel="noopener">Sharing Debugger ↗</a></li>
                    <li><b>LinkedIn</b> — {{ $t('refresh.linkedin') }}
                        <a href="https://www.linkedin.com/post-inspector/inspect/{{ urlencode($report['url']) }}" target="_blank" rel="noopener">Post Inspector ↗</a></li>
                    <li><b>Telegram</b> — {{ $t('refresh.telegram') }}
                        <a href="https://t.me/WebpageBot" target="_blank" rel="noopener">@WebpageBot ↗</a></li>
                    <li><b>X, Viber, WhatsApp</b> — {{ $t('refresh.others') }}</li>
                </ul>
            </section>
        </div>
    @endif
</div>
