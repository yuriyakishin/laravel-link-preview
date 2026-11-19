<?php

return [
    'form' => [
        'label' => 'Indirizzo della pagina',
        'button' => 'Verifica',
        'hint' => 'Gratis · senza registrazione · fino a :count verifiche all’ora',
    ],
    'loading' => [
        'page' => 'Scansione della pagina',
        'image' => 'Controllo dell’immagine di anteprima',
        'checks' => 'Preparazione delle schede dei social',
    ],
    'verdicts' => [
        'ready' => 'Il link ha un bell’aspetto',
        'almost' => 'Il link ha quasi un bell’aspetto',
        'partly' => 'L’anteprima del link va migliorata',
        'not_ready' => 'L’anteprima del link non è configurata',
    ],
    'previews' => [
        'title' => 'Come apparirà il link',
        'note' => 'Un’approssimazione: ogni social e app di messaggistica taglia testo e immagine in modo un po’ diverso.',
        'no_title' => 'Senza titolo',
    ],
    'refresh' => [
        'title' => 'Come aggiornare l’anteprima dopo una correzione',
        'text' => 'I social ricordano la scheda di un link per diversi giorni. Dopo aver modificato i tag, chiedete loro di rileggere la pagina.',
        'facebook' => 'incollate l’indirizzo e premete «Scrape Again»:',
        'linkedin' => 'incollate l’indirizzo e la scheda verrà aggiornata:',
        'telegram' => 'inviate il link al bot, aggiornerà l’anteprima:',
        'others' => 'non c’è uno strumento; la scheda si aggiorna da sola in pochi giorni. Per vedere subito quella nuova, aggiungete un parametro all’indirizzo, ad es. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Cosa dirà la scheda',
            'text' => 'Il titolo e la descrizione del link',
        ],
        'I' => [
            'title' => 'Quale sarà l’immagine',
            'text' => 'L’immagine og:image: presente, si apre, della giusta dimensione',
        ],
        'M' => [
            'title' => 'Tag tecnici',
            'text' => 'I tag con cui i social costruiscono la scheda',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'La scheda ha un titolo?',
            'text' => 'og:title, 10–70 caratteri',
            'fix' => 'Aggiungete og:title: un titolo breve che invogli ad aprire. Può differire dal <title>, perché ai social non servono parole chiave di ricerca.',
            'notes' => [
                'ok' => 'Il titolo c’è, :length caratteri.',
                'short' => 'Il titolo è troppo corto: :length caratteri. Dice poco della pagina.',
                'long' => 'Il titolo è lungo: :length caratteri. La maggior parte dei social lo taglia verso 60–70.',
                'fallback' => 'Non c’è og:title, quindi i social prenderanno il <title> della pagina.',
                'none' => 'Non ci sono né og:title né <title>: la scheda non avrà titolo.',
            ],
        ],
        'T2' => [
            'title' => 'La scheda ha una descrizione?',
            'text' => 'og:description, 50–200 caratteri',
            'fix' => 'Aggiungete og:description: una o due frasi su cosa si troverà nella pagina.',
            'notes' => [
                'ok' => 'La descrizione c’è, :length caratteri.',
                'short' => 'La descrizione è corta: :length caratteri. Aggiungete perché la pagina è utile.',
                'long' => 'La descrizione è lunga: :length caratteri. I social ne mostrano solo l’inizio.',
                'fallback' => 'Non c’è og:description, quindi i social prenderanno la meta description.',
                'none' => 'Non ci sono né og:description né meta description: la scheda non avrà descrizione.',
            ],
        ],
        'I1' => [
            'title' => 'C’è un’immagine di anteprima?',
            'text' => 'og:image con indirizzo completo',
            'fix' => 'Aggiungete og:image con l’indirizzo completo dell’immagine, che inizi con https://. L’ideale è 1200×630 pixel, JPG o PNG.',
            'notes' => [
                'ok' => 'L’immagine è indicata.',
                'relative' => 'L’indirizzo dell’immagine è incompleto. Alcuni social non lo aprono senza https:// e il dominio.',
                'twitter_only' => 'C’è solo twitter:image. Facebook, Telegram e gli altri leggono og:image.',
                'none' => 'Non c’è un’immagine: il link resterà solo testo o il social sceglierà un’immagine a caso.',
            ],
        ],
        'I2' => [
            'title' => 'L’immagine si apre?',
            'text' => 'Stato 200 e JPG, PNG, WebP o GIF',
            'fix' => 'Verificate che l’immagine si apra a questo indirizzo senza login e che sia JPG, PNG, WebP o GIF.',
            'notes' => [
                'ok' => 'L’immagine si apre, formato :type.',
                'status' => 'Il server ha risposto con il codice :status invece dell’immagine.',
                'not_image' => 'All’indirizzo non c’è un’immagine.',
                'svg' => 'L’immagine è un SVG: i social non lo mostrano.',
                'too_large' => 'Il file è troppo grande, oltre 8 MB.',
                'unreachable' => 'Impossibile scaricare l’immagine.',
                'no_image' => 'Non c’è un’immagine da verificare.',
            ],
        ],
        'I3' => [
            'title' => 'L’immagine è abbastanza grande?',
            'text' => 'Almeno 1200×630 pixel',
            'fix' => 'Fate l’immagine di 1200×630 pixel. Quelle più piccole i social le mostrano come miniatura laterale.',
            'notes' => [
                'ok' => 'Dimensioni :width×:height.',
                'medium' => 'Dimensioni :width×:height: la scheda grande ci sarà, ma sfocata sugli schermi nitidi.',
                'small' => 'Dimensioni :width×:height: i social mostreranno una miniatura invece di una scheda grande.',
                'no_image' => 'Impossibile leggere l’immagine.',
            ],
        ],
        'I4' => [
            'title' => 'L’immagine verrà ritagliata?',
            'text' => 'Proporzioni circa 1.91:1',
            'fix' => 'Fate l’immagine in proporzione 1.91:1, ad es. 1200×630. Tenete l’importante vicino al centro.',
            'notes' => [
                'ok' => 'Proporzioni :ratio:1.',
                'cropped' => 'Proporzioni :ratio:1: una scheda grande taglierà i bordi dell’immagine.',
                'no_image' => 'Impossibile leggere l’immagine.',
            ],
        ],
        'I5' => [
            'title' => 'L’immagine si caricherà in fretta?',
            'text' => 'Fino a 1 MB',
            'fix' => 'Comprimete l’immagine sotto 1 MB, meglio sotto 300 KB: salvatela in JPG o WebP con qualità 80–85%.',
            'notes' => [
                'ok' => 'Il file pesa :size KB.',
                'heavy' => 'Il file pesa :size KB: le app di messaggistica lo caricano lentamente o lo saltano.',
                'no_image' => 'Impossibile leggere l’immagine.',
            ],
        ],
        'I6' => [
            'title' => 'L’immagine è descritta da un testo?',
            'text' => 'og:image:alt',
            'fix' => 'Aggiungete og:image:alt con una descrizione dell’immagine: la leggono gli screen reader.',
            'notes' => [
                'ok' => 'L’immagine ha una descrizione.',
                'none' => 'L’immagine non ha una descrizione.',
                'no_image' => 'Non c’è un’immagine da verificare.',
            ],
        ],
        'M1' => [
            'title' => 'La scheda porta all’indirizzo giusto?',
            'text' => 'og:url coincide con canonical',
            'fix' => 'Indicate in og:url l’indirizzo principale della pagina, lo stesso di canonical. Su di esso i social contano mi piace e condivisioni.',
            'notes' => [
                'ok' => 'L’indirizzo è indicato.',
                'mismatch' => 'og:url è diverso da canonical (:canonical). I mi piace possono dividersi tra due indirizzi.',
                'none' => 'Non c’è og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Il tipo di pagina è indicato?',
            'text' => 'og:type',
            'fix' => 'Aggiungete og:type: website per la home e le pagine normali, article per gli articoli.',
            'notes' => [
                'ok' => 'Il tipo è indicato.',
                'none' => 'Non c’è og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Il nome del sito è indicato?',
            'text' => 'og:site_name',
            'fix' => 'Aggiungete og:site_name con il nome del sito: le app di messaggistica lo mostrano sopra il titolo della scheda.',
            'notes' => [
                'ok' => 'Il nome del sito è indicato.',
                'none' => 'Non c’è og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'X mostrerà una scheda grande?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Aggiungete twitter:card con valore summary_large_image perché X mostri una scheda grande con l’immagine.',
            'notes' => [
                'ok' => 'La scheda grande è attiva.',
                'small' => 'Il valore è summary: X mostra una scheda piccola.',
                'unknown' => 'Un valore insolito di twitter:card.',
                'none' => 'Non c’è twitter:card.',
            ],
        ],
    ],
];
