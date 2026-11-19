<?php

return [
    'form' => [
        'label' => 'Dirección de la página',
        'button' => 'Comprobar',
        'hint' => 'Gratis · sin registro · hasta :count comprobaciones por hora',
    ],
    'loading' => [
        'page' => 'Escaneando la página',
        'image' => 'Comprobando la imagen de vista previa',
        'checks' => 'Preparando las tarjetas de redes sociales',
    ],
    'verdicts' => [
        'ready' => 'El enlace se ve bien',
        'almost' => 'El enlace se ve casi bien',
        'partly' => 'La vista previa del enlace necesita mejoras',
        'not_ready' => 'La vista previa del enlace no está configurada',
    ],
    'previews' => [
        'title' => 'Cómo se verá el enlace',
        'note' => 'Una aproximación: cada red social y mensajería recorta el texto y la imagen de forma algo distinta.',
        'no_title' => 'Sin título',
    ],
    'refresh' => [
        'title' => 'Cómo actualizar la vista previa tras una corrección',
        'text' => 'Las redes sociales recuerdan la tarjeta de un enlace durante varios días. Tras cambiar las etiquetas, pídales que vuelvan a leer la página.',
        'facebook' => 'pegue la dirección y pulse «Scrape Again»:',
        'linkedin' => 'pegue la dirección y la tarjeta se actualizará:',
        'telegram' => 'envíe el enlace al bot y actualizará la vista previa:',
        'others' => 'no hay herramienta; la tarjeta se actualiza sola en unos días. Para ver la nueva enseguida, añada un parámetro a la dirección, p. ej. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Qué dirá la tarjeta',
            'text' => 'El título y la descripción del enlace',
        ],
        'I' => [
            'title' => 'Qué imagen tendrá',
            'text' => 'La imagen og:image: existe, se abre, tiene el tamaño adecuado',
        ],
        'M' => [
            'title' => 'Etiquetas técnicas',
            'text' => 'Etiquetas con las que las redes montan la tarjeta',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => '¿Tiene título la tarjeta?',
            'text' => 'og:title, 10–70 caracteres',
            'fix' => 'Añada og:title: un título corto que invite a abrir el enlace. Puede diferir del <title>, porque las redes sociales no necesitan palabras clave de búsqueda.',
            'notes' => [
                'ok' => 'Hay título, :length caracteres.',
                'short' => 'El título es demasiado corto: :length caracteres. Dice poco de la página.',
                'long' => 'El título es largo: :length caracteres. La mayoría de redes lo cortan hacia 60–70.',
                'fallback' => 'No hay og:title, así que las redes tomarán el <title> de la página.',
                'none' => 'No hay ni og:title ni <title>: la tarjeta no tendrá título.',
            ],
        ],
        'T2' => [
            'title' => '¿Tiene descripción la tarjeta?',
            'text' => 'og:description, 50–200 caracteres',
            'fix' => 'Añada og:description: una o dos frases sobre lo que encontrarán en la página.',
            'notes' => [
                'ok' => 'Hay descripción, :length caracteres.',
                'short' => 'La descripción es corta: :length caracteres. Añada por qué es útil la página.',
                'long' => 'La descripción es larga: :length caracteres. Las redes solo muestran el principio.',
                'fallback' => 'No hay og:description, así que las redes tomarán la meta description.',
                'none' => 'No hay ni og:description ni meta description: la tarjeta no tendrá descripción.',
            ],
        ],
        'I1' => [
            'title' => '¿Hay imagen de vista previa?',
            'text' => 'og:image con dirección completa',
            'fix' => 'Añada og:image con la dirección completa de la imagen, empezando por https://. Lo mejor es 1200×630 píxeles, JPG o PNG.',
            'notes' => [
                'ok' => 'La imagen está indicada.',
                'relative' => 'La dirección de la imagen está incompleta. Algunas redes no la abren sin https:// y el dominio.',
                'twitter_only' => 'Solo hay twitter:image. Facebook, Telegram y otras leen og:image.',
                'none' => 'No hay imagen: el enlace será texto plano o la red elegirá una imagen al azar.',
            ],
        ],
        'I2' => [
            'title' => '¿Se abre la imagen?',
            'text' => 'Estado 200 y JPG, PNG, WebP o GIF',
            'fix' => 'Compruebe que la imagen se abre en esa dirección sin iniciar sesión y que es JPG, PNG, WebP o GIF.',
            'notes' => [
                'ok' => 'La imagen se abre, formato :type.',
                'status' => 'El servidor respondió con el código :status en lugar de la imagen.',
                'not_image' => 'En la dirección no hay una imagen.',
                'svg' => 'La imagen es SVG: las redes sociales no la muestran.',
                'too_large' => 'El archivo es demasiado grande, más de 8 MB.',
                'unreachable' => 'No se pudo descargar la imagen.',
                'no_image' => 'No hay imagen que comprobar.',
            ],
        ],
        'I3' => [
            'title' => '¿Es la imagen lo bastante grande?',
            'text' => 'Al menos 1200×630 píxeles',
            'fix' => 'Haga la imagen de 1200×630 píxeles. Las más pequeñas se muestran como miniatura a un lado.',
            'notes' => [
                'ok' => 'Tamaño :width×:height.',
                'medium' => 'Tamaño :width×:height: habrá tarjeta grande, pero borrosa en pantallas nítidas.',
                'small' => 'Tamaño :width×:height: las redes mostrarán una miniatura en lugar de una tarjeta grande.',
                'no_image' => 'No se pudo leer la imagen.',
            ],
        ],
        'I4' => [
            'title' => '¿Se recortará la imagen?',
            'text' => 'Proporción de unos 1.91:1',
            'fix' => 'Haga la imagen en proporción 1.91:1, p. ej. 1200×630. Mantenga lo importante cerca del centro.',
            'notes' => [
                'ok' => 'Proporción :ratio:1.',
                'cropped' => 'Proporción :ratio:1: una tarjeta grande recortará los bordes de la imagen.',
                'no_image' => 'No se pudo leer la imagen.',
            ],
        ],
        'I5' => [
            'title' => '¿Cargará rápido la imagen?',
            'text' => 'Hasta 1 MB',
            'fix' => 'Comprima la imagen por debajo de 1 MB, mejor de 300 KB: guárdela como JPG o WebP al 80–85 % de calidad.',
            'notes' => [
                'ok' => 'El archivo pesa :size KB.',
                'heavy' => 'El archivo pesa :size KB: las mensajerías lo cargan despacio o lo omiten.',
                'no_image' => 'No se pudo leer la imagen.',
            ],
        ],
        'I6' => [
            'title' => '¿Está la imagen descrita con texto?',
            'text' => 'og:image:alt',
            'fix' => 'Añada og:image:alt con una descripción de la imagen: la leen los lectores de pantalla.',
            'notes' => [
                'ok' => 'La imagen tiene descripción.',
                'none' => 'La imagen no tiene descripción.',
                'no_image' => 'No hay imagen que comprobar.',
            ],
        ],
        'M1' => [
            'title' => '¿Lleva la tarjeta a la dirección correcta?',
            'text' => 'og:url coincide con canonical',
            'fix' => 'Ponga en og:url la dirección principal de la página, la misma que en canonical. Con ella las redes cuentan los me gusta y los compartidos.',
            'notes' => [
                'ok' => 'La dirección está indicada.',
                'mismatch' => 'og:url difiere de canonical (:canonical). Los me gusta pueden repartirse entre dos direcciones.',
                'none' => 'No hay og:url.',
            ],
        ],
        'M2' => [
            'title' => '¿Está indicado el tipo de página?',
            'text' => 'og:type',
            'fix' => 'Añada og:type: website para la portada y páginas normales, article para artículos.',
            'notes' => [
                'ok' => 'El tipo está indicado.',
                'none' => 'No hay og:type.',
            ],
        ],
        'M3' => [
            'title' => '¿Está indicado el nombre del sitio?',
            'text' => 'og:site_name',
            'fix' => 'Añada og:site_name con el nombre del sitio: las mensajerías lo muestran sobre el título de la tarjeta.',
            'notes' => [
                'ok' => 'El nombre del sitio está indicado.',
                'none' => 'No hay og:site_name.',
            ],
        ],
        'M4' => [
            'title' => '¿Mostrará X una tarjeta grande?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Añada twitter:card con el valor summary_large_image para que X muestre una tarjeta grande con imagen.',
            'notes' => [
                'ok' => 'La tarjeta grande está activada.',
                'small' => 'El valor es summary: X muestra una tarjeta pequeña.',
                'unknown' => 'Un valor poco habitual de twitter:card.',
                'none' => 'No hay twitter:card.',
            ],
        ],
    ],
];
