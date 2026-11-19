<?php

return [
    'form' => [
        'label' => 'Adresse de la page',
        'button' => 'Vérifier',
        'hint' => 'Gratuit · sans inscription · jusqu’à :count vérifications par heure',
    ],
    'loading' => [
        'page' => 'Analyse de la page',
        'image' => 'Vérification de l’image d’aperçu',
        'checks' => 'Préparation des cartes des réseaux sociaux',
    ],
    'verdicts' => [
        'ready' => 'Le lien a bonne allure',
        'almost' => 'Le lien a presque bonne allure',
        'partly' => 'L’aperçu du lien est à améliorer',
        'not_ready' => 'L’aperçu du lien n’est pas configuré',
    ],
    'previews' => [
        'title' => 'Aspect du lien',
        'note' => 'Une approximation : chaque réseau social et messagerie coupe le texte et l’image un peu différemment.',
        'no_title' => 'Sans titre',
    ],
    'refresh' => [
        'title' => 'Comment rafraîchir l’aperçu après une correction',
        'text' => 'Les réseaux sociaux gardent la carte d’un lien en mémoire plusieurs jours. Après avoir modifié les balises, demandez-leur de relire la page.',
        'facebook' => 'collez l’adresse et cliquez sur « Scrape Again » :',
        'linkedin' => 'collez l’adresse, la carte sera mise à jour :',
        'telegram' => 'envoyez le lien au bot, il rafraîchit l’aperçu :',
        'others' => 'il n’y a pas d’outil ; la carte se met à jour seule en quelques jours. Pour voir la nouvelle tout de suite, ajoutez un paramètre à l’adresse, par ex. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Ce que dira la carte',
            'text' => 'Le titre et la description du lien',
        ],
        'I' => [
            'title' => 'Quelle sera l’image',
            'text' => 'L’image og:image : présente, accessible, à la bonne taille',
        ],
        'M' => [
            'title' => 'Balises techniques',
            'text' => 'Les balises à partir desquelles les réseaux construisent la carte',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'La carte a-t-elle un titre ?',
            'text' => 'og:title, 10–70 caractères',
            'fix' => 'Ajoutez og:title : un titre court qui donne envie de cliquer. Il peut différer du <title>, car les réseaux sociaux n’ont pas besoin de mots-clés de recherche.',
            'notes' => [
                'ok' => 'Le titre est présent, :length caractères.',
                'short' => 'Le titre est trop court : :length caractères. Il dit peu de chose sur la page.',
                'long' => 'Le titre est long : :length caractères. La plupart des réseaux le coupent vers 60–70.',
                'fallback' => 'Il n’y a pas d’og:title, les réseaux prendront donc le <title> de la page.',
                'none' => 'Ni og:title ni <title> : la carte n’aura pas de titre.',
            ],
        ],
        'T2' => [
            'title' => 'La carte a-t-elle une description ?',
            'text' => 'og:description, 50–200 caractères',
            'fix' => 'Ajoutez og:description : une ou deux phrases sur ce que l’on trouvera sur la page.',
            'notes' => [
                'ok' => 'La description est présente, :length caractères.',
                'short' => 'La description est courte : :length caractères. Précisez en quoi la page est utile.',
                'long' => 'La description est longue : :length caractères. Les réseaux n’en montrent que le début.',
                'fallback' => 'Il n’y a pas d’og:description, les réseaux prendront donc la meta description.',
                'none' => 'Ni og:description ni meta description : la carte n’aura pas de description.',
            ],
        ],
        'I1' => [
            'title' => 'Y a-t-il une image d’aperçu ?',
            'text' => 'og:image avec une adresse complète',
            'fix' => 'Ajoutez og:image avec l’adresse complète de l’image, commençant par https://. Idéalement 1200×630 pixels, JPG ou PNG.',
            'notes' => [
                'ok' => 'L’image est indiquée.',
                'relative' => 'L’adresse de l’image est incomplète. Certains réseaux ne l’ouvrent pas sans https:// et le domaine.',
                'twitter_only' => 'Il n’y a que twitter:image. Facebook, Telegram et les autres lisent og:image.',
                'none' => 'Il n’y a pas d’image : le lien restera du texte brut ou le réseau choisira une image au hasard.',
            ],
        ],
        'I2' => [
            'title' => 'L’image s’ouvre-t-elle ?',
            'text' => 'Statut 200 et JPG, PNG, WebP ou GIF',
            'fix' => 'Vérifiez que l’image s’ouvre à cette adresse sans connexion et qu’il s’agit d’un JPG, PNG, WebP ou GIF.',
            'notes' => [
                'ok' => 'L’image s’ouvre, format :type.',
                'status' => 'Le serveur a répondu avec le code :status au lieu de l’image.',
                'not_image' => 'L’adresse ne mène pas à une image.',
                'svg' => 'L’image est un SVG : les réseaux sociaux ne l’affichent pas.',
                'too_large' => 'Le fichier est trop lourd, plus de 8 Mo.',
                'unreachable' => 'Impossible de télécharger l’image.',
                'no_image' => 'Il n’y a pas d’image à vérifier.',
            ],
        ],
        'I3' => [
            'title' => 'L’image est-elle assez grande ?',
            'text' => 'Au moins 1200×630 pixels',
            'fix' => 'Faites une image de 1200×630 pixels. Les réseaux affichent les plus petites en vignette sur le côté.',
            'notes' => [
                'ok' => 'Taille :width×:height.',
                'medium' => 'Taille :width×:height : la grande carte s’affichera, mais floue sur les écrans nets.',
                'small' => 'Taille :width×:height : les réseaux afficheront une petite vignette au lieu d’une grande carte.',
                'no_image' => 'Impossible de lire l’image.',
            ],
        ],
        'I4' => [
            'title' => 'L’image sera-t-elle rognée ?',
            'text' => 'Proportions d’environ 1.91:1',
            'fix' => 'Faites une image au format 1.91:1, par ex. 1200×630. Gardez l’essentiel près du centre.',
            'notes' => [
                'ok' => 'Proportions :ratio:1.',
                'cropped' => 'Proportions :ratio:1 : une grande carte rognera les bords de l’image.',
                'no_image' => 'Impossible de lire l’image.',
            ],
        ],
        'I5' => [
            'title' => 'L’image se chargera-t-elle vite ?',
            'text' => 'Jusqu’à 1 Mo',
            'fix' => 'Compressez l’image sous 1 Mo, idéalement sous 300 Ko : enregistrez-la en JPG ou WebP à 80–85 % de qualité.',
            'notes' => [
                'ok' => 'Le fichier fait :size Ko.',
                'heavy' => 'Le fichier fait :size Ko : les messageries le chargent lentement ou l’ignorent.',
                'no_image' => 'Impossible de lire l’image.',
            ],
        ],
        'I6' => [
            'title' => 'L’image est-elle décrite par un texte ?',
            'text' => 'og:image:alt',
            'fix' => 'Ajoutez og:image:alt décrivant l’image : les lecteurs d’écran le lisent.',
            'notes' => [
                'ok' => 'L’image a une description.',
                'none' => 'L’image n’a pas de description.',
                'no_image' => 'Il n’y a pas d’image à vérifier.',
            ],
        ],
        'M1' => [
            'title' => 'La carte mène-t-elle à la bonne adresse ?',
            'text' => 'og:url correspond au canonical',
            'fix' => 'Indiquez dans og:url l’adresse principale de la page, la même que dans canonical. Les réseaux y comptent les j’aime et les partages.',
            'notes' => [
                'ok' => 'L’adresse est indiquée.',
                'mismatch' => 'og:url diffère du canonical (:canonical). Les j’aime peuvent se répartir entre deux adresses.',
                'none' => 'Il n’y a pas d’og:url.',
            ],
        ],
        'M2' => [
            'title' => 'Le type de page est-il indiqué ?',
            'text' => 'og:type',
            'fix' => 'Ajoutez og:type : website pour l’accueil et les pages ordinaires, article pour les articles.',
            'notes' => [
                'ok' => 'Le type est indiqué.',
                'none' => 'Il n’y a pas d’og:type.',
            ],
        ],
        'M3' => [
            'title' => 'Le nom du site est-il indiqué ?',
            'text' => 'og:site_name',
            'fix' => 'Ajoutez og:site_name avec le nom du site : les messageries l’affichent au-dessus du titre de la carte.',
            'notes' => [
                'ok' => 'Le nom du site est indiqué.',
                'none' => 'Il n’y a pas d’og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'X affichera-t-il une grande carte ?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Ajoutez twitter:card avec la valeur summary_large_image pour que X affiche une grande carte avec l’image.',
            'notes' => [
                'ok' => 'La grande carte est activée.',
                'small' => 'La valeur est summary : X affiche une petite carte.',
                'unknown' => 'Une valeur inhabituelle de twitter:card.',
                'none' => 'Il n’y a pas de twitter:card.',
            ],
        ],
    ],
];
