<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Seitenadresse',
        'button' => 'Prüfen',
        'hint' => 'Kostenlos · ohne Anmeldung · bis zu :count Prüfungen pro Stunde',
    ],
    'loading' => [
        'page' => 'Seite wird gescannt',
        'image' => 'Vorschaubild wird geprüft',
        'checks' => 'Karten der sozialen Netzwerke werden erstellt',
    ],
    'verdicts' => [
        'ready' => 'Der Link sieht gut aus',
        'almost' => 'Der Link sieht fast gut aus',
        'partly' => 'Die Linkvorschau braucht Arbeit',
        'not_ready' => 'Die Linkvorschau ist nicht eingerichtet',
    ],
    'previews' => [
        'title' => 'So wird der Link aussehen',
        'note' => 'Eine Annäherung: Jedes soziale Netzwerk und jeder Messenger schneidet Text und Bild etwas anders zu.',
        'no_title' => 'Kein Titel',
    ],
    'refresh' => [
        'title' => 'So aktualisieren Sie die Vorschau nach einer Korrektur',
        'text' => 'Soziale Netzwerke merken sich eine Linkkarte mehrere Tage lang. Bitten Sie sie nach dem Ändern der Tags, die Seite neu einzulesen.',
        'facebook' => 'Adresse einfügen und „Scrape Again“ drücken:',
        'linkedin' => 'Adresse einfügen, die Karte wird aktualisiert:',
        'telegram' => 'den Link an den Bot senden, er aktualisiert die Vorschau:',
        'others' => 'es gibt kein Werkzeug; die Karte aktualisiert sich nach einigen Tagen von selbst. Um die neue sofort zu sehen, hängen Sie einen Parameter an die Adresse an, z. B. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Was in der Karte steht',
            'text' => 'Titel und Beschreibung des Links',
        ],
        'I' => [
            'title' => 'Welches Bild es gibt',
            'text' => 'Das Bild og:image: vorhanden, öffnet sich, die richtige Größe',
        ],
        'M' => [
            'title' => 'Technische Tags',
            'text' => 'Tags, aus denen soziale Netzwerke die Karte bauen',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Hat die Karte einen Titel?',
            'text' => 'og:title, 10–70 Zeichen',
            'fix' => 'Fügen Sie og:title hinzu: einen kurzen Titel, den man öffnen möchte. Er darf vom <title> abweichen, denn soziale Netzwerke brauchen keine Suchbegriffe.',
            'notes' => [
                'ok' => 'Ein Titel ist vorhanden, :length Zeichen.',
                'short' => 'Der Titel ist zu kurz: :length Zeichen. Er sagt wenig über die Seite.',
                'long' => 'Der Titel ist lang: :length Zeichen. Die meisten Netzwerke kürzen ihn bei etwa 60–70.',
                'fallback' => 'Es gibt kein og:title, daher nehmen Netzwerke den <title> der Seite.',
                'none' => 'Weder og:title noch <title>: Die Karte hat keinen Titel.',
            ],
        ],
        'T2' => [
            'title' => 'Hat die Karte eine Beschreibung?',
            'text' => 'og:description, 50–200 Zeichen',
            'fix' => 'Fügen Sie og:description hinzu: ein oder zwei Sätze darüber, was man auf der Seite findet.',
            'notes' => [
                'ok' => 'Eine Beschreibung ist vorhanden, :length Zeichen.',
                'short' => 'Die Beschreibung ist kurz: :length Zeichen. Ergänzen Sie, wofür die Seite nützlich ist.',
                'long' => 'Die Beschreibung ist lang: :length Zeichen. Netzwerke zeigen nur den Anfang.',
                'fallback' => 'Es gibt kein og:description, daher nehmen Netzwerke die Meta-Description.',
                'none' => 'Weder og:description noch Meta-Description: Die Karte hat keine Beschreibung.',
            ],
        ],
        'I1' => [
            'title' => 'Gibt es ein Vorschaubild?',
            'text' => 'og:image mit vollständiger Adresse',
            'fix' => 'Fügen Sie og:image mit der vollständigen Bildadresse ab https:// hinzu. Am besten 1200×630 Pixel, JPG oder PNG.',
            'notes' => [
                'ok' => 'Das Bild ist angegeben.',
                'relative' => 'Die Bildadresse ist unvollständig. Manche Netzwerke öffnen sie ohne https:// und Domain nicht.',
                'twitter_only' => 'Es gibt nur twitter:image. Facebook, Telegram und andere lesen og:image.',
                'none' => 'Es gibt kein Bild: Der Link bleibt reiner Text oder das Netzwerk wählt ein zufälliges Bild.',
            ],
        ],
        'I2' => [
            'title' => 'Öffnet sich das Bild?',
            'text' => 'Status 200 und JPG, PNG, WebP oder GIF',
            'fix' => 'Stellen Sie sicher, dass das Bild unter dieser Adresse ohne Anmeldung öffnet und ein JPG, PNG, WebP oder GIF ist.',
            'notes' => [
                'ok' => 'Das Bild öffnet sich, Format :type.',
                'status' => 'Der Server antwortete mit Code :status statt des Bildes.',
                'not_image' => 'Unter der Adresse liegt kein Bild.',
                'svg' => 'Das Bild ist ein SVG: Soziale Netzwerke zeigen es nicht.',
                'too_large' => 'Die Datei ist zu groß, über 8 MB.',
                'unreachable' => 'Das Bild konnte nicht geladen werden.',
                'no_image' => 'Es gibt kein Bild zu prüfen.',
            ],
        ],
        'I3' => [
            'title' => 'Ist das Bild groß genug?',
            'text' => 'Mindestens 1200×630 Pixel',
            'fix' => 'Machen Sie das Bild 1200×630 Pixel groß. Kleinere zeigen Netzwerke als kleines Vorschaubild an der Seite.',
            'notes' => [
                'ok' => 'Größe :width×:height.',
                'medium' => 'Größe :width×:height: Es gibt eine große Karte, aber auf scharfen Bildschirmen unscharf.',
                'small' => 'Größe :width×:height: Netzwerke zeigen ein kleines Vorschaubild statt einer großen Karte.',
                'no_image' => 'Das Bild konnte nicht gelesen werden.',
            ],
        ],
        'I4' => [
            'title' => 'Wird das Bild beschnitten?',
            'text' => 'Seitenverhältnis etwa 1.91:1',
            'fix' => 'Machen Sie das Bild im Verhältnis 1.91:1, z. B. 1200×630. Halten Sie das Wichtige nahe der Mitte.',
            'notes' => [
                'ok' => 'Verhältnis :ratio:1.',
                'cropped' => 'Verhältnis :ratio:1: Eine große Karte schneidet die Ränder ab.',
                'no_image' => 'Das Bild konnte nicht gelesen werden.',
            ],
        ],
        'I5' => [
            'title' => 'Lädt das Bild schnell?',
            'text' => 'Bis 1 MB',
            'fix' => 'Komprimieren Sie das Bild auf unter 1 MB, besser unter 300 KB: als JPG oder WebP mit 80–85 % Qualität speichern.',
            'notes' => [
                'ok' => 'Die Datei hat :size KB.',
                'heavy' => 'Die Datei hat :size KB: Messenger laden sie langsam oder überspringen sie.',
                'no_image' => 'Das Bild konnte nicht gelesen werden.',
            ],
        ],
        'I6' => [
            'title' => 'Ist das Bild in Text beschrieben?',
            'text' => 'og:image:alt',
            'fix' => 'Fügen Sie og:image:alt mit einer Bildbeschreibung hinzu: Screenreader lesen sie vor.',
            'notes' => [
                'ok' => 'Das Bild hat eine Beschreibung.',
                'none' => 'Das Bild hat keine Beschreibung.',
                'no_image' => 'Es gibt kein Bild zu prüfen.',
            ],
        ],
        'M1' => [
            'title' => 'Führt die Karte zur richtigen Adresse?',
            'text' => 'og:url stimmt mit canonical überein',
            'fix' => 'Tragen Sie in og:url die Hauptadresse der Seite ein, dieselbe wie in canonical. Danach zählen Netzwerke Likes und Shares.',
            'notes' => [
                'ok' => 'Die Adresse ist angegeben.',
                'mismatch' => 'og:url weicht von canonical ab (:canonical). Likes können sich auf zwei Adressen verteilen.',
                'none' => 'Es gibt kein og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Ist der Seitentyp angegeben?',
            'text' => 'og:type',
            'fix' => 'Fügen Sie og:type hinzu: website für die Startseite und normale Seiten, article für Artikel.',
            'notes' => [
                'ok' => 'Der Typ ist angegeben.',
                'none' => 'Es gibt kein og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Ist der Name der Website angegeben?',
            'text' => 'og:site_name',
            'fix' => 'Fügen Sie og:site_name mit dem Namen der Website hinzu: Messenger zeigen ihn über dem Kartentitel.',
            'notes' => [
                'ok' => 'Der Name der Website ist angegeben.',
                'none' => 'Es gibt kein og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'Zeigt X eine große Karte?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Fügen Sie twitter:card mit dem Wert summary_large_image hinzu, damit X eine große Karte mit Bild zeigt.',
            'notes' => [
                'ok' => 'Die große Karte ist aktiv.',
                'small' => 'Der Wert ist summary: X zeigt eine kleine Karte.',
                'unknown' => 'Ein ungewöhnlicher Wert für twitter:card.',
                'none' => 'Es gibt kein twitter:card.',
            ],
        ],
    ],
];
