<?php

return [
    'form' => [
        'label' => 'Page address',
        'button' => 'Check',
        'hint' => 'Free · no sign-up · up to :count checks per hour',
    ],
    'loading' => [
        'page' => 'Scanning the page',
        'image' => 'Checking the preview image',
        'checks' => 'Building the social cards',
    ],
    'verdicts' => [
        'ready' => 'The link looks good',
        'almost' => 'The link looks almost good',
        'partly' => 'The link preview needs work',
        'not_ready' => 'The link preview is not set up',
    ],
    'previews' => [
        'title' => 'How the link will look',
        'note' => 'An approximation: every social network and messenger cuts the text and the image a little differently.',
        'no_title' => 'No title',
    ],
    'refresh' => [
        'title' => 'How to refresh the preview after a fix',
        'text' => 'Social networks remember a link card for several days. After changing the tags, ask them to read the page again.',
        'facebook' => 'paste the address and press "Scrape Again":',
        'linkedin' => 'paste the address and the card is refreshed:',
        'telegram' => 'send the link to the bot and it refreshes the preview:',
        'others' => 'there is no tool; the card refreshes by itself within a few days. To see the new one right away, add a parameter to the address, e.g. ?v=2.',
    ],
    'groups' => [
        'T' => ['title' => 'What the card will say', 'text' => 'The title and description of the link'],
        'I' => ['title' => 'What the image will be', 'text' => 'The og:image picture: present, opens, the right size'],
        'M' => ['title' => 'Service tags', 'text' => 'Tags social networks build the card from'],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Does the card have a title?',
            'text' => 'og:title, 10–70 characters',
            'fix' => 'Add og:title: a short title people want to open. It can differ from <title>, since social networks do not need search keywords.',
            'notes' => [
                'ok' => 'There is a title, :length characters.',
                'short' => 'The title is too short: :length characters. It says little about the page.',
                'long' => 'The title is long: :length characters. Most networks cut it at about 60–70.',
                'fallback' => 'There is no og:title, so networks take the page <title>.',
                'none' => 'There is neither og:title nor <title>: the card will have no title.',
            ],
        ],
        'T2' => [
            'title' => 'Does the card have a description?',
            'text' => 'og:description, 50–200 characters',
            'fix' => 'Add og:description: one or two sentences about what people will find on the page.',
            'notes' => [
                'ok' => 'There is a description, :length characters.',
                'short' => 'The description is short: :length characters. Add why the page is useful.',
                'long' => 'The description is long: :length characters. Networks show only the beginning.',
                'fallback' => 'There is no og:description, so networks take the meta description.',
                'none' => 'There is neither og:description nor a meta description: the card will have no description.',
            ],
        ],
        'I1' => [
            'title' => 'Is there a preview image?',
            'text' => 'og:image with a full address',
            'fix' => 'Add og:image with the full address of the picture, starting with https://. Best is 1200×630 pixels, JPG or PNG.',
            'notes' => [
                'ok' => 'The image is set.',
                'relative' => 'The image address is not full. Some networks cannot open it without https:// and the domain.',
                'twitter_only' => 'There is only twitter:image. Facebook, Telegram and others read og:image.',
                'none' => 'There is no image: the link will be plain text or the network will pick a random picture.',
            ],
        ],
        'I2' => [
            'title' => 'Does the image open?',
            'text' => 'Status 200 and JPG, PNG, WebP or GIF',
            'fix' => 'Make sure the picture opens at this address without logging in and is a JPG, PNG, WebP or GIF.',
            'notes' => [
                'ok' => 'The image opens, format :type.',
                'status' => 'The server answered with code :status instead of the image.',
                'not_image' => 'The address is not an image.',
                'svg' => 'The image is an SVG: social networks do not show it.',
                'too_large' => 'The file is too large, over 8 MB.',
                'unreachable' => 'The image could not be downloaded.',
                'no_image' => 'There is no image to check.',
            ],
        ],
        'I3' => [
            'title' => 'Is the image big enough?',
            'text' => 'At least 1200×630 pixels',
            'fix' => 'Make the image 1200×630 pixels. Networks show smaller ones as a small thumbnail at the side.',
            'notes' => [
                'ok' => 'Size :width×:height.',
                'medium' => 'Size :width×:height: there will be a large card, but blurry on sharp screens.',
                'small' => 'Size :width×:height: networks will show a small thumbnail instead of a large card.',
                'no_image' => 'The image could not be read.',
            ],
        ],
        'I4' => [
            'title' => 'Will the image be cropped?',
            'text' => 'Proportions about 1.91:1',
            'fix' => 'Make the image 1.91:1, e.g. 1200×630. Keep the important part near the centre.',
            'notes' => [
                'ok' => 'Proportions :ratio:1.',
                'cropped' => 'Proportions :ratio:1: a large card will crop the edges of the image.',
                'no_image' => 'The image could not be read.',
            ],
        ],
        'I5' => [
            'title' => 'Will the image load quickly?',
            'text' => 'Up to 1 MB',
            'fix' => 'Compress the image to under 1 MB, better under 300 KB: save it as JPG or WebP at 80–85% quality.',
            'notes' => [
                'ok' => 'The file is :size KB.',
                'heavy' => 'The file is :size KB: messengers load it slowly or skip it.',
                'no_image' => 'The image could not be read.',
            ],
        ],
        'I6' => [
            'title' => 'Is the image described in text?',
            'text' => 'og:image:alt',
            'fix' => 'Add og:image:alt describing the picture: screen readers read it.',
            'notes' => [
                'ok' => 'The image has a description.',
                'none' => 'The image has no description.',
                'no_image' => 'There is no image to check.',
            ],
        ],
        'M1' => [
            'title' => 'Does the card lead to the right address?',
            'text' => 'og:url matches canonical',
            'fix' => 'Put the main address of the page in og:url, the same as in canonical. Networks count likes and shares by it.',
            'notes' => [
                'ok' => 'The address is set.',
                'mismatch' => 'og:url differs from canonical (:canonical). Likes may be split between two addresses.',
                'none' => 'There is no og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Is the page type set?',
            'text' => 'og:type',
            'fix' => 'Add og:type: website for the home page and ordinary pages, article for articles.',
            'notes' => [
                'ok' => 'The type is set.',
                'none' => 'There is no og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Is the site name set?',
            'text' => 'og:site_name',
            'fix' => 'Add og:site_name with the name of the site: messengers show it above the card title.',
            'notes' => [
                'ok' => 'The site name is set.',
                'none' => 'There is no og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'Will X show a large card?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Add twitter:card with the value summary_large_image so that X shows a large card with the image.',
            'notes' => [
                'ok' => 'The large card is on.',
                'small' => 'The value is summary: X shows a small card.',
                'unknown' => 'An unusual twitter:card value.',
                'none' => 'There is no twitter:card.',
            ],
        ],
    ],
];
