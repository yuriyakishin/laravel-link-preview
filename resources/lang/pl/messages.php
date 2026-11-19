<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Adres strony',
        'button' => 'Sprawdź',
        'hint' => 'Bezpłatnie · bez rejestracji · do :count sprawdzeń na godzinę',
    ],
    'loading' => [
        'page' => 'Skanuję stronę',
        'image' => 'Sprawdzam obrazek podglądu',
        'checks' => 'Przygotowuję karty serwisów społecznościowych',
    ],
    'verdicts' => [
        'ready' => 'Link wygląda dobrze',
        'almost' => 'Link wygląda prawie dobrze',
        'partly' => 'Podgląd linku wymaga poprawek',
        'not_ready' => 'Podgląd linku nie jest skonfigurowany',
    ],
    'previews' => [
        'title' => 'Jak będzie wyglądał link',
        'note' => 'Przybliżenie: każdy serwis i komunikator przycina tekst i obrazek trochę inaczej.',
        'no_title' => 'Bez tytułu',
    ],
    'refresh' => [
        'title' => 'Jak odświeżyć podgląd po poprawkach',
        'text' => 'Serwisy społecznościowe pamiętają kartę linku przez kilka dni. Po zmianie tagów poproś je o ponowne odczytanie strony.',
        'facebook' => 'wklej adres i naciśnij „Scrape Again”:',
        'linkedin' => 'wklej adres, a karta zostanie odświeżona:',
        'telegram' => 'wyślij link do bota, a odświeży podgląd:',
        'others' => 'nie ma narzędzia; karta odświeży się sama w ciągu kilku dni. Aby od razu zobaczyć nową, dodaj do adresu parametr, np. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Co będzie napisane na karcie',
            'text' => 'Tytuł i opis linku',
        ],
        'I' => [
            'title' => 'Jaki będzie obrazek',
            'text' => 'Obrazek og:image: jest, otwiera się, ma właściwy rozmiar',
        ],
        'M' => [
            'title' => 'Tagi techniczne',
            'text' => 'Tagi, z których serwisy budują kartę',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Czy karta ma tytuł?',
            'text' => 'og:title, 10–70 znaków',
            'fix' => 'Dodaj og:title: krótki tytuł, który zachęca do kliknięcia. Może różnić się od <title>, bo serwisom społecznościowym nie są potrzebne słowa kluczowe.',
            'notes' => [
                'ok' => 'Tytuł jest, :length znaków.',
                'short' => 'Tytuł jest za krótki: :length znaków. Mało mówi o stronie.',
                'long' => 'Tytuł jest długi: :length znaków. Większość serwisów utnie go około 60–70.',
                'fallback' => 'Brak og:title, więc serwisy wezmą <title> strony.',
                'none' => 'Brak og:title i <title>: karta nie będzie miała tytułu.',
            ],
        ],
        'T2' => [
            'title' => 'Czy karta ma opis?',
            'text' => 'og:description, 50–200 znaków',
            'fix' => 'Dodaj og:description: jedno lub dwa zdania o tym, co ktoś znajdzie na stronie.',
            'notes' => [
                'ok' => 'Opis jest, :length znaków.',
                'short' => 'Opis jest krótki: :length znaków. Dodaj, czym strona jest przydatna.',
                'long' => 'Opis jest długi: :length znaków. Serwisy pokażą tylko początek.',
                'fallback' => 'Brak og:description, więc serwisy wezmą meta description.',
                'none' => 'Brak og:description i meta description: karta nie będzie miała opisu.',
            ],
        ],
        'I1' => [
            'title' => 'Czy jest obrazek podglądu?',
            'text' => 'og:image z pełnym adresem',
            'fix' => 'Dodaj og:image z pełnym adresem obrazka zaczynającym się od https://. Najlepiej 1200×630 pikseli, JPG lub PNG.',
            'notes' => [
                'ok' => 'Obrazek jest wskazany.',
                'relative' => 'Adres obrazka jest niepełny. Niektóre serwisy nie otworzą go bez https:// i domeny.',
                'twitter_only' => 'Jest tylko twitter:image. Facebook, Telegram i inne czytają og:image.',
                'none' => 'Brak obrazka: link będzie samym tekstem albo serwis wybierze losowy obrazek.',
            ],
        ],
        'I2' => [
            'title' => 'Czy obrazek się otwiera?',
            'text' => 'Status 200 i JPG, PNG, WebP lub GIF',
            'fix' => 'Sprawdź, czy obrazek otwiera się pod tym adresem bez logowania i czy to JPG, PNG, WebP lub GIF.',
            'notes' => [
                'ok' => 'Obrazek się otwiera, format :type.',
                'status' => 'Serwer odpowiedział kodem :status zamiast obrazka.',
                'not_image' => 'Pod adresem nie ma obrazka.',
                'svg' => 'Obrazek jest w formacie SVG: serwisy społecznościowe go nie pokazują.',
                'too_large' => 'Plik jest za duży, ponad 8 MB.',
                'unreachable' => 'Nie udało się pobrać obrazka.',
                'no_image' => 'Nie ma obrazka do sprawdzenia.',
            ],
        ],
        'I3' => [
            'title' => 'Czy obrazek jest wystarczająco duży?',
            'text' => 'Od 1200×630 pikseli',
            'fix' => 'Zrób obrazek 1200×630 pikseli. Mniejsze serwisy pokazują jako małą miniaturę z boku.',
            'notes' => [
                'ok' => 'Rozmiar :width×:height.',
                'medium' => 'Rozmiar :width×:height: duża karta będzie, ale rozmyta na ostrych ekranach.',
                'small' => 'Rozmiar :width×:height: serwisy pokażą małą miniaturę zamiast dużej karty.',
                'no_image' => 'Nie udało się odczytać obrazka.',
            ],
        ],
        'I4' => [
            'title' => 'Czy obrazek nie zostanie przycięty?',
            'text' => 'Proporcje około 1.91:1',
            'fix' => 'Zrób obrazek w proporcjach 1.91:1, np. 1200×630. Ważne elementy trzymaj bliżej środka.',
            'notes' => [
                'ok' => 'Proporcje :ratio:1.',
                'cropped' => 'Proporcje :ratio:1: duża karta przytnie krawędzie obrazka.',
                'no_image' => 'Nie udało się odczytać obrazka.',
            ],
        ],
        'I5' => [
            'title' => 'Czy obrazek szybko się załaduje?',
            'text' => 'Do 1 MB',
            'fix' => 'Skompresuj obrazek poniżej 1 MB, lepiej poniżej 300 KB: zapisz jako JPG lub WebP z jakością 80–85%.',
            'notes' => [
                'ok' => 'Plik ma :size KB.',
                'heavy' => 'Plik ma :size KB: komunikatory ładują go wolno lub pomijają.',
                'no_image' => 'Nie udało się odczytać obrazka.',
            ],
        ],
        'I6' => [
            'title' => 'Czy obrazek ma opis tekstowy?',
            'text' => 'og:image:alt',
            'fix' => 'Dodaj og:image:alt z opisem obrazka: czytają go czytniki ekranu.',
            'notes' => [
                'ok' => 'Obrazek ma opis.',
                'none' => 'Obrazek nie ma opisu.',
                'no_image' => 'Nie ma obrazka do sprawdzenia.',
            ],
        ],
        'M1' => [
            'title' => 'Czy karta prowadzi pod właściwy adres?',
            'text' => 'og:url zgodny z canonical',
            'fix' => 'Podaj w og:url główny adres strony, taki sam jak w canonical. Według niego serwisy liczą polubienia i udostępnienia.',
            'notes' => [
                'ok' => 'Adres jest podany.',
                'mismatch' => 'og:url różni się od canonical (:canonical). Polubienia mogą rozdzielić się między dwa adresy.',
                'none' => 'Brak og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Czy podano typ strony?',
            'text' => 'og:type',
            'fix' => 'Dodaj og:type: website dla strony głównej i zwykłych stron, article dla artykułów.',
            'notes' => [
                'ok' => 'Typ jest podany.',
                'none' => 'Brak og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Czy podano nazwę serwisu?',
            'text' => 'og:site_name',
            'fix' => 'Dodaj og:site_name z nazwą serwisu: komunikatory pokazują ją nad tytułem karty.',
            'notes' => [
                'ok' => 'Nazwa serwisu jest podana.',
                'none' => 'Brak og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'Czy X pokaże dużą kartę?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Dodaj twitter:card z wartością summary_large_image, aby X pokazywał dużą kartę z obrazkiem.',
            'notes' => [
                'ok' => 'Duża karta jest włączona.',
                'small' => 'Wartość to summary: X pokaże małą kartę.',
                'unknown' => 'Nietypowa wartość twitter:card.',
                'none' => 'Brak twitter:card.',
            ],
        ],
    ],
];
