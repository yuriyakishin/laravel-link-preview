<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Paginaadres',
        'button' => 'Controleren',
        'hint' => 'Gratis · zonder registratie · tot :count controles per uur',
    ],
    'loading' => [
        'page' => 'Pagina wordt gescand',
        'image' => 'Voorbeeldafbeelding wordt gecontroleerd',
        'checks' => 'Kaarten van sociale netwerken worden opgebouwd',
    ],
    'verdicts' => [
        'ready' => 'De link ziet er goed uit',
        'almost' => 'De link ziet er bijna goed uit',
        'partly' => 'De linkvoorvertoning moet beter',
        'not_ready' => 'De linkvoorvertoning is niet ingesteld',
    ],
    'previews' => [
        'title' => 'Zo ziet de link eruit',
        'note' => 'Een benadering: elk sociaal netwerk en elke messenger snijdt tekst en afbeelding net iets anders bij.',
        'no_title' => 'Geen titel',
    ],
    'refresh' => [
        'title' => 'Zo vernieuwt u de voorvertoning na een correctie',
        'text' => 'Sociale netwerken onthouden de kaart van een link enkele dagen. Vraag ze na het wijzigen van de tags om de pagina opnieuw te lezen.',
        'facebook' => 'plak het adres en klik op ‘Scrape Again’:',
        'linkedin' => 'plak het adres, de kaart wordt vernieuwd:',
        'telegram' => 'stuur de link naar de bot, die vernieuwt de voorvertoning:',
        'others' => 'er is geen tool; de kaart vernieuwt zichzelf binnen enkele dagen. Voeg een parameter aan het adres toe om de nieuwe meteen te zien, bijv. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Wat er op de kaart staat',
            'text' => 'De titel en beschrijving van de link',
        ],
        'I' => [
            'title' => 'Welke afbeelding er komt',
            'text' => 'De afbeelding og:image: aanwezig, opent, het juiste formaat',
        ],
        'M' => [
            'title' => 'Technische tags',
            'text' => 'Tags waarmee sociale netwerken de kaart opbouwen',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Heeft de kaart een titel?',
            'text' => 'og:title, 10–70 tekens',
            'fix' => 'Voeg og:title toe: een korte titel die uitnodigt om te klikken. Hij mag afwijken van de <title>, want sociale netwerken hebben geen zoekwoorden nodig.',
            'notes' => [
                'ok' => 'Er is een titel, :length tekens.',
                'short' => 'De titel is te kort: :length tekens. Hij zegt weinig over de pagina.',
                'long' => 'De titel is lang: :length tekens. De meeste netwerken kappen hem af rond 60–70.',
                'fallback' => 'Er is geen og:title, dus netwerken nemen de <title> van de pagina.',
                'none' => 'Geen og:title en geen <title>: de kaart krijgt geen titel.',
            ],
        ],
        'T2' => [
            'title' => 'Heeft de kaart een beschrijving?',
            'text' => 'og:description, 50–200 tekens',
            'fix' => 'Voeg og:description toe: een of twee zinnen over wat men op de pagina vindt.',
            'notes' => [
                'ok' => 'Er is een beschrijving, :length tekens.',
                'short' => 'De beschrijving is kort: :length tekens. Vertel waarom de pagina nuttig is.',
                'long' => 'De beschrijving is lang: :length tekens. Netwerken tonen alleen het begin.',
                'fallback' => 'Er is geen og:description, dus netwerken nemen de meta description.',
                'none' => 'Geen og:description en geen meta description: de kaart krijgt geen beschrijving.',
            ],
        ],
        'I1' => [
            'title' => 'Is er een voorbeeldafbeelding?',
            'text' => 'og:image met een volledig adres',
            'fix' => 'Voeg og:image toe met het volledige adres van de afbeelding, beginnend met https://. Het best is 1200×630 pixels, JPG of PNG.',
            'notes' => [
                'ok' => 'De afbeelding is opgegeven.',
                'relative' => 'Het adres van de afbeelding is onvolledig. Sommige netwerken openen het niet zonder https:// en het domein.',
                'twitter_only' => 'Er is alleen twitter:image. Facebook, Telegram en anderen lezen og:image.',
                'none' => 'Er is geen afbeelding: de link blijft platte tekst of het netwerk kiest een willekeurige afbeelding.',
            ],
        ],
        'I2' => [
            'title' => 'Opent de afbeelding?',
            'text' => 'Status 200 en JPG, PNG, WebP of GIF',
            'fix' => 'Controleer of de afbeelding op dit adres opent zonder in te loggen en een JPG, PNG, WebP of GIF is.',
            'notes' => [
                'ok' => 'De afbeelding opent, formaat :type.',
                'status' => 'De server antwoordde met code :status in plaats van de afbeelding.',
                'not_image' => 'Op dit adres staat geen afbeelding.',
                'svg' => 'De afbeelding is een SVG: sociale netwerken tonen die niet.',
                'too_large' => 'Het bestand is te groot, meer dan 8 MB.',
                'unreachable' => 'De afbeelding kon niet worden gedownload.',
                'no_image' => 'Er is geen afbeelding om te controleren.',
            ],
        ],
        'I3' => [
            'title' => 'Is de afbeelding groot genoeg?',
            'text' => 'Minstens 1200×630 pixels',
            'fix' => 'Maak de afbeelding 1200×630 pixels. Kleinere tonen netwerken als kleine miniatuur aan de zijkant.',
            'notes' => [
                'ok' => 'Formaat :width×:height.',
                'medium' => 'Formaat :width×:height: er komt een grote kaart, maar wazig op scherpe schermen.',
                'small' => 'Formaat :width×:height: netwerken tonen een kleine miniatuur in plaats van een grote kaart.',
                'no_image' => 'De afbeelding kon niet worden gelezen.',
            ],
        ],
        'I4' => [
            'title' => 'Wordt de afbeelding bijgesneden?',
            'text' => 'Verhouding ongeveer 1.91:1',
            'fix' => 'Maak de afbeelding in de verhouding 1.91:1, bijv. 1200×630. Houd het belangrijkste dicht bij het midden.',
            'notes' => [
                'ok' => 'Verhouding :ratio:1.',
                'cropped' => 'Verhouding :ratio:1: een grote kaart snijdt de randen van de afbeelding af.',
                'no_image' => 'De afbeelding kon niet worden gelezen.',
            ],
        ],
        'I5' => [
            'title' => 'Laadt de afbeelding snel?',
            'text' => 'Tot 1 MB',
            'fix' => 'Comprimeer de afbeelding tot onder 1 MB, liever onder 300 KB: sla op als JPG of WebP met 80–85% kwaliteit.',
            'notes' => [
                'ok' => 'Het bestand is :size KB.',
                'heavy' => 'Het bestand is :size KB: messengers laden het traag of slaan het over.',
                'no_image' => 'De afbeelding kon niet worden gelezen.',
            ],
        ],
        'I6' => [
            'title' => 'Is de afbeelding in tekst beschreven?',
            'text' => 'og:image:alt',
            'fix' => 'Voeg og:image:alt toe met een beschrijving van de afbeelding: schermlezers lezen die voor.',
            'notes' => [
                'ok' => 'De afbeelding heeft een beschrijving.',
                'none' => 'De afbeelding heeft geen beschrijving.',
                'no_image' => 'Er is geen afbeelding om te controleren.',
            ],
        ],
        'M1' => [
            'title' => 'Leidt de kaart naar het juiste adres?',
            'text' => 'og:url komt overeen met canonical',
            'fix' => 'Zet in og:url het hoofdadres van de pagina, hetzelfde als in canonical. Daarop tellen netwerken likes en shares.',
            'notes' => [
                'ok' => 'Het adres is opgegeven.',
                'mismatch' => 'og:url wijkt af van canonical (:canonical). Likes kunnen over twee adressen verdeeld raken.',
                'none' => 'Er is geen og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Is het paginatype opgegeven?',
            'text' => 'og:type',
            'fix' => 'Voeg og:type toe: website voor de homepage en gewone pagina’s, article voor artikelen.',
            'notes' => [
                'ok' => 'Het type is opgegeven.',
                'none' => 'Er is geen og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Is de naam van de site opgegeven?',
            'text' => 'og:site_name',
            'fix' => 'Voeg og:site_name toe met de naam van de site: messengers tonen die boven de titel van de kaart.',
            'notes' => [
                'ok' => 'De naam van de site is opgegeven.',
                'none' => 'Er is geen og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'Toont X een grote kaart?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Voeg twitter:card toe met de waarde summary_large_image, zodat X een grote kaart met afbeelding toont.',
            'notes' => [
                'ok' => 'De grote kaart staat aan.',
                'small' => 'De waarde is summary: X toont een kleine kaart.',
                'unknown' => 'Een ongebruikelijke waarde van twitter:card.',
                'none' => 'Er is geen twitter:card.',
            ],
        ],
    ],
];
