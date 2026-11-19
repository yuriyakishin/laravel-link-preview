<?php

return [
    'form' => [
        'label' => 'Endereço da página',
        'button' => 'Verificar',
        'hint' => 'Grátis · sem registo · até :count verificações por hora',
    ],
    'loading' => [
        'page' => 'A analisar a página',
        'image' => 'A verificar a imagem de pré-visualização',
        'checks' => 'A preparar os cartões das redes sociais',
    ],
    'verdicts' => [
        'ready' => 'A ligação tem bom aspeto',
        'almost' => 'A ligação tem quase bom aspeto',
        'partly' => 'A pré-visualização da ligação precisa de melhorias',
        'not_ready' => 'A pré-visualização da ligação não está configurada',
    ],
    'previews' => [
        'title' => 'Como a ligação vai aparecer',
        'note' => 'Uma aproximação: cada rede social e mensageiro corta o texto e a imagem de forma um pouco diferente.',
        'no_title' => 'Sem título',
    ],
    'refresh' => [
        'title' => 'Como atualizar a pré-visualização depois de corrigir',
        'text' => 'As redes sociais guardam o cartão de uma ligação durante vários dias. Depois de alterar as etiquetas, peça-lhes que voltem a ler a página.',
        'facebook' => 'cole o endereço e carregue em «Scrape Again»:',
        'linkedin' => 'cole o endereço e o cartão será atualizado:',
        'telegram' => 'envie a ligação ao bot e ele atualiza a pré-visualização:',
        'others' => 'não há ferramenta; o cartão atualiza-se sozinho em poucos dias. Para ver o novo de imediato, acrescente um parâmetro ao endereço, por ex. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'O que o cartão vai dizer',
            'text' => 'O título e a descrição da ligação',
        ],
        'I' => [
            'title' => 'Qual será a imagem',
            'text' => 'A imagem og:image: existe, abre, tem o tamanho certo',
        ],
        'M' => [
            'title' => 'Etiquetas técnicas',
            'text' => 'Etiquetas com que as redes constroem o cartão',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'O cartão tem título?',
            'text' => 'og:title, 10–70 caracteres',
            'fix' => 'Adicione og:title: um título curto que dê vontade de abrir. Pode ser diferente do <title>, pois as redes sociais não precisam de palavras-chave de pesquisa.',
            'notes' => [
                'ok' => 'Há título, :length caracteres.',
                'short' => 'O título é demasiado curto: :length caracteres. Diz pouco sobre a página.',
                'long' => 'O título é longo: :length caracteres. A maioria das redes corta-o por volta de 60–70.',
                'fallback' => 'Não há og:title, por isso as redes usam o <title> da página.',
                'none' => 'Não há og:title nem <title>: o cartão ficará sem título.',
            ],
        ],
        'T2' => [
            'title' => 'O cartão tem descrição?',
            'text' => 'og:description, 50–200 caracteres',
            'fix' => 'Adicione og:description: uma ou duas frases sobre o que se encontra na página.',
            'notes' => [
                'ok' => 'Há descrição, :length caracteres.',
                'short' => 'A descrição é curta: :length caracteres. Acrescente porque a página é útil.',
                'long' => 'A descrição é longa: :length caracteres. As redes mostram só o início.',
                'fallback' => 'Não há og:description, por isso as redes usam a meta description.',
                'none' => 'Não há og:description nem meta description: o cartão ficará sem descrição.',
            ],
        ],
        'I1' => [
            'title' => 'Há imagem de pré-visualização?',
            'text' => 'og:image com endereço completo',
            'fix' => 'Adicione og:image com o endereço completo da imagem, a começar por https://. O ideal é 1200×630 píxeis, JPG ou PNG.',
            'notes' => [
                'ok' => 'A imagem está indicada.',
                'relative' => 'O endereço da imagem está incompleto. Algumas redes não o abrem sem https:// e o domínio.',
                'twitter_only' => 'Só há twitter:image. Facebook, Telegram e outras leem og:image.',
                'none' => 'Não há imagem: a ligação fica só em texto ou a rede escolhe uma imagem ao acaso.',
            ],
        ],
        'I2' => [
            'title' => 'A imagem abre?',
            'text' => 'Estado 200 e JPG, PNG, WebP ou GIF',
            'fix' => 'Confirme que a imagem abre neste endereço sem iniciar sessão e que é JPG, PNG, WebP ou GIF.',
            'notes' => [
                'ok' => 'A imagem abre, formato :type.',
                'status' => 'O servidor respondeu com o código :status em vez da imagem.',
                'not_image' => 'O endereço não é uma imagem.',
                'svg' => 'A imagem é SVG: as redes sociais não a mostram.',
                'too_large' => 'O ficheiro é demasiado grande, mais de 8 MB.',
                'unreachable' => 'Não foi possível transferir a imagem.',
                'no_image' => 'Não há imagem para verificar.',
            ],
        ],
        'I3' => [
            'title' => 'A imagem é suficientemente grande?',
            'text' => 'Pelo menos 1200×630 píxeis',
            'fix' => 'Faça a imagem com 1200×630 píxeis. As redes mostram as mais pequenas como miniatura ao lado.',
            'notes' => [
                'ok' => 'Tamanho :width×:height.',
                'medium' => 'Tamanho :width×:height: haverá cartão grande, mas desfocado em ecrãs nítidos.',
                'small' => 'Tamanho :width×:height: as redes mostram uma miniatura em vez de um cartão grande.',
                'no_image' => 'Não foi possível ler a imagem.',
            ],
        ],
        'I4' => [
            'title' => 'A imagem vai ser cortada?',
            'text' => 'Proporções de cerca de 1.91:1',
            'fix' => 'Faça a imagem em 1.91:1, por ex. 1200×630. Mantenha o importante perto do centro.',
            'notes' => [
                'ok' => 'Proporções :ratio:1.',
                'cropped' => 'Proporções :ratio:1: um cartão grande vai cortar as margens da imagem.',
                'no_image' => 'Não foi possível ler a imagem.',
            ],
        ],
        'I5' => [
            'title' => 'A imagem carrega depressa?',
            'text' => 'Até 1 MB',
            'fix' => 'Comprima a imagem para menos de 1 MB, idealmente menos de 300 KB: guarde-a em JPG ou WebP com qualidade 80–85%.',
            'notes' => [
                'ok' => 'O ficheiro tem :size KB.',
                'heavy' => 'O ficheiro tem :size KB: os mensageiros carregam-no devagar ou ignoram-no.',
                'no_image' => 'Não foi possível ler a imagem.',
            ],
        ],
        'I6' => [
            'title' => 'A imagem está descrita em texto?',
            'text' => 'og:image:alt',
            'fix' => 'Adicione og:image:alt com a descrição da imagem: os leitores de ecrã leem-na.',
            'notes' => [
                'ok' => 'A imagem tem descrição.',
                'none' => 'A imagem não tem descrição.',
                'no_image' => 'Não há imagem para verificar.',
            ],
        ],
        'M1' => [
            'title' => 'O cartão leva ao endereço certo?',
            'text' => 'og:url coincide com canonical',
            'fix' => 'Indique em og:url o endereço principal da página, o mesmo de canonical. É por ele que as redes contam gostos e partilhas.',
            'notes' => [
                'ok' => 'O endereço está indicado.',
                'mismatch' => 'og:url é diferente de canonical (:canonical). Os gostos podem dividir-se entre dois endereços.',
                'none' => 'Não há og:url.',
            ],
        ],
        'M2' => [
            'title' => 'O tipo de página está indicado?',
            'text' => 'og:type',
            'fix' => 'Adicione og:type: website para a página inicial e páginas normais, article para artigos.',
            'notes' => [
                'ok' => 'O tipo está indicado.',
                'none' => 'Não há og:type.',
            ],
        ],
        'M3' => [
            'title' => 'O nome do site está indicado?',
            'text' => 'og:site_name',
            'fix' => 'Adicione og:site_name com o nome do site: os mensageiros mostram-no acima do título do cartão.',
            'notes' => [
                'ok' => 'O nome do site está indicado.',
                'none' => 'Não há og:site_name.',
            ],
        ],
        'M4' => [
            'title' => 'O X vai mostrar um cartão grande?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'Adicione twitter:card com o valor summary_large_image para que o X mostre um cartão grande com imagem.',
            'notes' => [
                'ok' => 'O cartão grande está ativo.',
                'small' => 'O valor é summary: o X mostra um cartão pequeno.',
                'unknown' => 'Um valor invulgar de twitter:card.',
                'none' => 'Não há twitter:card.',
            ],
        ],
    ],
];
