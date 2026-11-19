<?php

declare(strict_types=1);

return [
    'enabled' => env('LINK_PREVIEW_ENABLED', true),

    /* Version of the scoring rules shown under the score; change it when the checks or points change. */
    'ruleset' => '2026-11-13',

    'fetch' => [
        'page_bytes' => 2 * 1024 * 1024,
        'image_bytes' => 8 * 1024 * 1024,
    ],

    'rate_limit' => [
        'per_hour' => (int) env('LINK_PREVIEW_PER_HOUR', 10),
    ],

    /* Short: people fix the tags and check again right away. */
    'cache' => [
        'ttl' => 120,
    ],
];
