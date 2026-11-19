<?php

return [
    'form' => [
        'label' => 'Adresa stránky',
        'button' => 'Zkontrolovat',
        'hint' => 'Zdarma · bez registrace · až :count kontrol za hodinu',
    ],
    'loading' => [
        'page' => 'Skenuji stránku',
        'image' => 'Kontroluji náhledový obrázek',
        'checks' => 'Připravuji karty sociálních sítí',
    ],
    'verdicts' => [
        'ready' => 'Odkaz vypadá dobře',
        'almost' => 'Odkaz vypadá téměř dobře',
        'partly' => 'Náhled odkazu potřebuje úpravy',
        'not_ready' => 'Náhled odkazu není nastaven',
    ],
    'previews' => [
        'title' => 'Jak bude odkaz vypadat',
        'note' => 'Přibližně: každá sociální síť a messenger ořezává text a obrázek trochu jinak.',
        'no_title' => 'Bez názvu',
    ],
    'refresh' => [
        'title' => 'Jak obnovit náhled po opravě',
        'text' => 'Sociální sítě si kartu odkazu pamatují několik dní. Po změně značek je požádejte, aby stránku načetly znovu.',
        'facebook' => 'vložte adresu a stiskněte „Scrape Again“:',
        'linkedin' => 'vložte adresu a karta se obnoví:',
        'telegram' => 'pošlete odkaz botovi a ten náhled obnoví:',
        'others' => 'nástroj neexistuje; karta se obnoví sama během několika dní. Chcete-li novou vidět hned, přidejte k adrese parametr, např. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Co bude na kartě napsáno',
            'text' => 'Název a popis odkazu',
        ],
        'I' => [
            'title' => 'Jaký bude obrázek',
            'text' => 'Obrázek og:image: existuje, otevírá se, má správnou velikost',
        ],
        'M' => [
            'title' => 'Technické značky',
            'text' => 'Značky, ze kterých sítě sestavují kartu',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Má karta název?',
            'text' => 'og:title, 10–70 znaků',
            'fix' => 'Přidejte og:title: krátký název, na který se chce kliknout. Může se lišit od <title>, protože sociální sítě nepotřebují klíčová slova pro vyhledávání.',
            'notes' => [
                'ok' => 'Název je, :length znaků.',
                'short' => 'Název je příliš krátký: :length znaků. O stránce toho moc neřekne.',
                'long' => 'Název je dlouhý: :length znaků. Většina sítí ho ořízne kolem 60–70.',
                'fallback' => 'Chybí og:title, sítě proto vezmou <title> stránky.',
                'none' => 'Chybí og:title i <title>: karta nebude mít název.',
            ],
        ],
        'T2' => [
            'title' => 'Má karta popis?',
            'text' => 'og:description, 50–200 znaků',
            'fix' => 'Přidejte og:description: jednu až dvě věty o tom, co na stránce člověk najde.',
            'notes' => [
                'ok' => 'Popis je, :length znaků.',
                'short' => 'Popis je krátký: :length znaků. Doplňte, v čem je stránka užitečná.',
                'long' => 'Popis je dlouhý: :length znaků. Sítě ukážou jen začátek.',
                'fallback' => 'Chybí og:description, sítě proto vezmou meta description.',
                'none' => 'Chybí og:description i meta description: karta nebude mít popis.',
            ],
        ],
        'I1' => [
            'title' => 'Je k dispozici náhledový obrázek?',
            'text' => 'og:image s úplnou adresou',
            'fix' => 'Přidejte og:image s úplnou adresou obrázku začínající https://. Nejlépe 1200×630 pixelů, JPG nebo PNG.',
            'notes' => [
                'ok' => 'Obrázek je uveden.',
                'relative' => 'Adresa obrázku není úplná. Některé sítě ji bez https:// a domény neotevřou.',
                'twitter_only' => 'Je jen twitter:image. Facebook, Telegram a další čtou og:image.',
                'none' => 'Obrázek chybí: odkaz zůstane holým textem nebo síť vybere náhodný obrázek.',
            ],
        ],
        'I2' => [
            'title' => 'Otevírá se obrázek?',
            'text' => 'Stav 200 a JPG, PNG, WebP nebo GIF',
            'fix' => 'Ověřte, že se obrázek na této adrese otevře bez přihlášení a že je to JPG, PNG, WebP nebo GIF.',
            'notes' => [
                'ok' => 'Obrázek se otevírá, formát :type.',
                'status' => 'Server místo obrázku odpověděl kódem :status.',
                'not_image' => 'Na adrese není obrázek.',
                'svg' => 'Obrázek je ve formátu SVG: sociální sítě ho nezobrazují.',
                'too_large' => 'Soubor je příliš velký, přes 8 MB.',
                'unreachable' => 'Obrázek se nepodařilo stáhnout.',
                'no_image' => 'Není co kontrolovat, obrázek chybí.',
            ],
        ],
        'I3' => [
            'title' => 'Je obrázek dost velký?',
            'text' => 'Alespoň 1200×630 pixelů',
            'fix' => 'Udělejte obrázek 1200×630 pixelů. Menší sítě zobrazí jako malou miniaturu po straně.',
            'notes' => [
                'ok' => 'Velikost :width×:height.',
                'medium' => 'Velikost :width×:height: velká karta bude, ale na ostrých displejích rozmazaná.',
                'small' => 'Velikost :width×:height: sítě ukážou malou miniaturu místo velké karty.',
                'no_image' => 'Obrázek se nepodařilo přečíst.',
            ],
        ],
        'I4' => [
            'title' => 'Neořízne se obrázek?',
            'text' => 'Poměr stran asi 1.91:1',
            'fix' => 'Udělejte obrázek v poměru 1.91:1, např. 1200×630. Důležité věci držte blíž ke středu.',
            'notes' => [
                'ok' => 'Poměr :ratio:1.',
                'cropped' => 'Poměr :ratio:1: velká karta ořízne okraje obrázku.',
                'no_image' => 'Obrázek se nepodařilo přečíst.',
            ],
        ],
        'I5' => [
            'title' => 'Načte se obrázek rychle?',
            'text' => 'Do 1 MB',
            'fix' => 'Zkomprimujte obrázek pod 1 MB, lépe pod 300 KB: uložte jako JPG nebo WebP v kvalitě 80–85 %.',
            'notes' => [
                'ok' => 'Soubor má :size KB.',
                'heavy' => 'Soubor má :size KB: messengery ho načítají pomalu nebo ho přeskočí.',
                'no_image' => 'Obrázek se nepodařilo přečíst.',
            ],
        ],
        'I6' => [
            'title' => 'Je obrázek popsán textem?',
            'text' => 'og:image:alt',
            'fix' => 'Přidejte og:image:alt s popisem obrázku: čtou ho čtečky obrazovky.',
            'notes' => [
                'ok' => 'Obrázek má popis.',
                'none' => 'Obrázek nemá popis.',
                'no_image' => 'Není co kontrolovat, obrázek chybí.',
            ],
        ],
        'M1' => [
            'title' => 'Vede karta na správnou adresu?',
            'text' => 'og:url odpovídá canonical',
            'fix' => 'Uveďte v og:url hlavní adresu stránky, stejnou jako v canonical. Podle ní sítě počítají lajky a sdílení.',
            'notes' => [
                'ok' => 'Adresa je uvedena.',
                'mismatch' => 'og:url se liší od canonical (:canonical). Lajky se mohou rozdělit mezi dvě adresy.',
                'none' => 'Chybí og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Je uveden typ stránky?',
            'text' => 'og:type',
            'fix' => 'Přidejte og:type: website pro úvodní a běžné stránky, article pro články.',
            'notes' => [
                'ok' => 'Typ je uveden.',
                'none' => 'Chybí og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Je uveden název webu?',
            'text' => 'og:site_name',
            'fix' => 'Přidejte og:site_name s názvem webu: messengery ho zobrazují nad názvem karty.',
            'notes' => [
                'ok' => 'Název webu je uveden.',
                'none' => 'Chybí og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'Zobrazí X velkou kartu?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Přidejte twitter:card s hodnotou summary_large_image, aby X zobrazoval velkou kartu s obrázkem.',
            'notes' => [
                'ok' => 'Velká karta je zapnutá.',
                'small' => 'Hodnota je summary: X zobrazí malou kartu.',
                'unknown' => 'Neobvyklá hodnota twitter:card.',
                'none' => 'Chybí twitter:card.',
            ],
        ],
    ],
];
