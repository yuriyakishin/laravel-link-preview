<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Sayfa adresi',
        'button' => 'Kontrol et',
        'hint' => 'Ücretsiz · kayıt yok · saatte en fazla :count kontrol',
    ],
    'loading' => [
        'page' => 'Sayfa taranıyor',
        'image' => 'Önizleme görseli kontrol ediliyor',
        'checks' => 'Sosyal ağ kartları hazırlanıyor',
    ],
    'verdicts' => [
        'ready' => 'Bağlantı iyi görünüyor',
        'almost' => 'Bağlantı neredeyse iyi görünüyor',
        'partly' => 'Bağlantı önizlemesinin iyileştirilmesi gerekiyor',
        'not_ready' => 'Bağlantı önizlemesi ayarlanmamış',
    ],
    'previews' => [
        'title' => 'Bağlantı nasıl görünecek',
        'note' => 'Yaklaşık bir görünüm: her sosyal ağ ve mesajlaşma uygulaması metni ve görseli biraz farklı kırpar.',
        'no_title' => 'Başlık yok',
    ],
    'refresh' => [
        'title' => 'Düzeltmeden sonra önizleme nasıl yenilenir',
        'text' => 'Sosyal ağlar bir bağlantının kartını birkaç gün hatırlar. Etiketleri değiştirdikten sonra sayfayı yeniden okumalarını isteyin.',
        'facebook' => 'adresi yapıştırıp “Scrape Again” düğmesine basın:',
        'linkedin' => 'adresi yapıştırın, kart yenilenir:',
        'telegram' => 'bağlantıyı bota gönderin, önizlemeyi yeniler:',
        'others' => 'bir araç yok; kart birkaç gün içinde kendiliğinden yenilenir. Yenisini hemen görmek için adrese bir parametre ekleyin, ör. ?v=2.',
    ],
    'groups' => [
        'T' => [
            'title' => 'Kartta ne yazacak',
            'text' => 'Bağlantının başlığı ve açıklaması',
        ],
        'I' => [
            'title' => 'Görsel ne olacak',
            'text' => 'og:image görseli: var mı, açılıyor mu, boyutu doğru mu',
        ],
        'M' => [
            'title' => 'Teknik etiketler',
            'text' => 'Sosyal ağların kartı oluşturduğu etiketler',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => 'Kartın başlığı var mı?',
            'text' => 'og:title, 10–70 karakter',
            'fix' => 'og:title ekleyin: tıklanmak istenecek kısa bir başlık. Sosyal ağlar arama anahtar kelimelerine ihtiyaç duymadığı için <title> etiketinden farklı olabilir.',
            'notes' => [
                'ok' => 'Başlık var, :length karakter.',
                'short' => 'Başlık çok kısa: :length karakter. Sayfa hakkında az şey söylüyor.',
                'long' => 'Başlık uzun: :length karakter. Çoğu ağ onu 60–70 civarında keser.',
                'fallback' => 'og:title yok, bu yüzden ağlar sayfanın <title> etiketini alır.',
                'none' => 'Ne og:title ne <title> var: kartın başlığı olmayacak.',
            ],
        ],
        'T2' => [
            'title' => 'Kartın açıklaması var mı?',
            'text' => 'og:description, 50–200 karakter',
            'fix' => 'og:description ekleyin: sayfada ne bulunacağını anlatan bir iki cümle.',
            'notes' => [
                'ok' => 'Açıklama var, :length karakter.',
                'short' => 'Açıklama kısa: :length karakter. Sayfanın neden yararlı olduğunu ekleyin.',
                'long' => 'Açıklama uzun: :length karakter. Ağlar yalnızca başını gösterir.',
                'fallback' => 'og:description yok, bu yüzden ağlar meta description’ı alır.',
                'none' => 'Ne og:description ne meta description var: kartın açıklaması olmayacak.',
            ],
        ],
        'I1' => [
            'title' => 'Önizleme görseli var mı?',
            'text' => 'Tam adresli og:image',
            'fix' => 'Görselin https:// ile başlayan tam adresiyle og:image ekleyin. En iyisi 1200×630 piksel, JPG veya PNG.',
            'notes' => [
                'ok' => 'Görsel belirtilmiş.',
                'relative' => 'Görselin adresi eksik. Bazı ağlar https:// ve alan adı olmadan açamaz.',
                'twitter_only' => 'Yalnızca twitter:image var. Facebook, Telegram ve diğerleri og:image okur.',
                'none' => 'Görsel yok: bağlantı düz metin kalır ya da ağ rastgele bir görsel seçer.',
            ],
        ],
        'I2' => [
            'title' => 'Görsel açılıyor mu?',
            'text' => 'Durum 200 ve JPG, PNG, WebP veya GIF',
            'fix' => 'Görselin bu adreste giriş yapmadan açıldığını ve JPG, PNG, WebP veya GIF olduğunu kontrol edin.',
            'notes' => [
                'ok' => 'Görsel açılıyor, biçim :type.',
                'status' => 'Sunucu görsel yerine :status koduyla yanıt verdi.',
                'not_image' => 'Adreste bir görsel yok.',
                'svg' => 'Görsel SVG biçiminde: sosyal ağlar bunu göstermez.',
                'too_large' => 'Dosya çok büyük, 8 MB’tan fazla.',
                'unreachable' => 'Görsel indirilemedi.',
                'no_image' => 'Kontrol edilecek görsel yok.',
            ],
        ],
        'I3' => [
            'title' => 'Görsel yeterince büyük mü?',
            'text' => 'En az 1200×630 piksel',
            'fix' => 'Görseli 1200×630 piksel yapın. Ağlar daha küçüklerini yanda küçük bir minyatür olarak gösterir.',
            'notes' => [
                'ok' => 'Boyut :width×:height.',
                'medium' => 'Boyut :width×:height: büyük kart olur ama keskin ekranlarda bulanık görünür.',
                'small' => 'Boyut :width×:height: ağlar büyük kart yerine küçük bir minyatür gösterir.',
                'no_image' => 'Görsel okunamadı.',
            ],
        ],
        'I4' => [
            'title' => 'Görsel kırpılacak mı?',
            'text' => 'Oran yaklaşık 1.91:1',
            'fix' => 'Görseli 1.91:1 oranında yapın, ör. 1200×630. Önemli kısmı merkeze yakın tutun.',
            'notes' => [
                'ok' => 'Oran :ratio:1.',
                'cropped' => 'Oran :ratio:1: büyük kart görselin kenarlarını kırpar.',
                'no_image' => 'Görsel okunamadı.',
            ],
        ],
        'I5' => [
            'title' => 'Görsel hızlı yüklenecek mi?',
            'text' => 'En fazla 1 MB',
            'fix' => 'Görseli 1 MB’ın, tercihen 300 KB’ın altına sıkıştırın: %80–85 kalitede JPG veya WebP olarak kaydedin.',
            'notes' => [
                'ok' => 'Dosya :size KB.',
                'heavy' => 'Dosya :size KB: mesajlaşma uygulamaları onu yavaş yükler veya atlar.',
                'no_image' => 'Görsel okunamadı.',
            ],
        ],
        'I6' => [
            'title' => 'Görsel metinle açıklanmış mı?',
            'text' => 'og:image:alt',
            'fix' => 'Görseli açıklayan og:image:alt ekleyin: ekran okuyucular bunu okur.',
            'notes' => [
                'ok' => 'Görselin açıklaması var.',
                'none' => 'Görselin açıklaması yok.',
                'no_image' => 'Kontrol edilecek görsel yok.',
            ],
        ],
        'M1' => [
            'title' => 'Kart doğru adrese mi götürüyor?',
            'text' => 'og:url, canonical ile aynı',
            'fix' => 'og:url etiketine sayfanın ana adresini, canonical ile aynısını yazın. Ağlar beğeni ve paylaşımları bu adrese göre sayar.',
            'notes' => [
                'ok' => 'Adres belirtilmiş.',
                'mismatch' => 'og:url, canonical’dan farklı (:canonical). Beğeniler iki adres arasında bölünebilir.',
                'none' => 'og:url yok.',
            ],
        ],
        'M2' => [
            'title' => 'Sayfa türü belirtilmiş mi?',
            'text' => 'og:type',
            'fix' => 'og:type ekleyin: ana sayfa ve sıradan sayfalar için website, makaleler için article.',
            'notes' => [
                'ok' => 'Tür belirtilmiş.',
                'none' => 'og:type yok.',
            ],
        ],
        'M3' => [
            'title' => 'Site adı belirtilmiş mi?',
            'text' => 'og:site_name',
            'fix' => 'Site adıyla og:site_name ekleyin: mesajlaşma uygulamaları bunu kart başlığının üstünde gösterir.',
            'notes' => [
                'ok' => 'Site adı belirtilmiş.',
                'none' => 'og:site_name yok.',
            ],
        ],
        'M4' => [
            'title' => 'X büyük kart gösterecek mi?',
            'text' => 'twitter:card = summary_large_image',
            'fix' => 'X’in görselli büyük kart göstermesi için summary_large_image değeriyle twitter:card ekleyin.',
            'notes' => [
                'ok' => 'Büyük kart açık.',
                'small' => 'Değer summary: X küçük kart gösterir.',
                'unknown' => 'Alışılmadık bir twitter:card değeri.',
                'none' => 'twitter:card yok.',
            ],
        ],
    ],
];
