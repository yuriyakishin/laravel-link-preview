<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => '页面地址',
        'button' => '检查',
        'hint' => '免费 · 无需注册 · 每小时最多 :count 次',
    ],
    'loading' => [
        'page' => '正在扫描页面',
        'image' => '正在检查预览图片',
        'checks' => '正在生成社交网络卡片',
    ],
    'verdicts' => [
        'ready' => '链接看起来很好',
        'almost' => '链接看起来基本不错',
        'partly' => '链接预览需要改进',
        'not_ready' => '链接预览尚未设置',
    ],
    'previews' => [
        'title' => '链接会是什么样子',
        'note' => '仅供参考：每个社交网络和聊天应用裁剪文字和图片的方式都略有不同。',
        'no_title' => '无标题',
    ],
    'refresh' => [
        'title' => '修改后如何刷新预览',
        'text' => '社交网络会把链接卡片缓存好几天。修改标签后，请让它们重新读取页面。',
        'facebook' => '粘贴地址并点击“Scrape Again”：',
        'linkedin' => '粘贴地址，卡片就会更新：',
        'telegram' => '把链接发给机器人，它会刷新预览：',
        'others' => '没有专门的工具；卡片会在几天内自动更新。想立即看到新卡片，可以在地址后加一个参数，例如 ?v=2。',
    ],
    'groups' => [
        'T' => [
            'title' => '卡片上会写什么',
            'text' => '链接的标题和描述',
        ],
        'I' => [
            'title' => '会显示什么图片',
            'text' => 'og:image 图片：是否存在、能否打开、尺寸是否合适',
        ],
        'M' => [
            'title' => '技术标签',
            'text' => '社交网络用来生成卡片的标签',
        ],
    ],
    'checks' => [
        'T1' => [
            'title' => '卡片有标题吗？',
            'text' => 'og:title，10–70 个字符',
            'fix' => '添加 og:title：一个让人想点开的简短标题。它可以和 <title> 不同，因为社交网络不需要搜索关键词。',
            'notes' => [
                'ok' => '有标题，:length 个字符。',
                'short' => '标题太短：:length 个字符，几乎说明不了页面内容。',
                'long' => '标题偏长：:length 个字符。大多数网络会在 60–70 个字符左右截断。',
                'fallback' => '没有 og:title，所以网络会使用页面的 <title>。',
                'none' => '既没有 og:title 也没有 <title>：卡片将没有标题。',
            ],
        ],
        'T2' => [
            'title' => '卡片有描述吗？',
            'text' => 'og:description，50–200 个字符',
            'fix' => '添加 og:description：用一两句话说明用户能在页面上找到什么。',
            'notes' => [
                'ok' => '有描述，:length 个字符。',
                'short' => '描述太短：:length 个字符。补充页面的用处。',
                'long' => '描述偏长：:length 个字符。网络只会显示开头部分。',
                'fallback' => '没有 og:description，所以网络会使用 meta description。',
                'none' => '既没有 og:description 也没有 meta description：卡片将没有描述。',
            ],
        ],
        'I1' => [
            'title' => '有预览图片吗？',
            'text' => '带完整地址的 og:image',
            'fix' => '添加 og:image，填写以 https:// 开头的图片完整地址。最佳尺寸为 1200×630 像素，JPG 或 PNG。',
            'notes' => [
                'ok' => '已指定图片。',
                'relative' => '图片地址不完整。没有 https:// 和域名，有些网络无法打开。',
                'twitter_only' => '只有 twitter:image。Facebook、Telegram 等读取的是 og:image。',
                'none' => '没有图片：链接会只显示文字，或者网络随便选一张图片。',
            ],
        ],
        'I2' => [
            'title' => '图片能打开吗？',
            'text' => '状态 200，格式为 JPG、PNG、WebP 或 GIF',
            'fix' => '确认图片无需登录即可在该地址打开，且格式为 JPG、PNG、WebP 或 GIF。',
            'notes' => [
                'ok' => '图片可以打开，格式 :type。',
                'status' => '服务器返回了代码 :status，而不是图片。',
                'not_image' => '该地址不是图片。',
                'svg' => '图片是 SVG 格式：社交网络不显示这种格式。',
                'too_large' => '文件太大，超过 8 MB。',
                'unreachable' => '无法下载图片。',
                'no_image' => '没有可检查的图片。',
            ],
        ],
        'I3' => [
            'title' => '图片够大吗？',
            'text' => '至少 1200×630 像素',
            'fix' => '把图片做成 1200×630 像素。更小的图片会被显示为侧边的小缩略图。',
            'notes' => [
                'ok' => '尺寸 :width×:height。',
                'medium' => '尺寸 :width×:height：会显示大卡片，但在高清屏幕上会模糊。',
                'small' => '尺寸 :width×:height：网络会显示小缩略图，而不是大卡片。',
                'no_image' => '无法读取图片。',
            ],
        ],
        'I4' => [
            'title' => '图片会被裁剪吗？',
            'text' => '比例约 1.91:1',
            'fix' => '把图片做成 1.91:1，例如 1200×630。重要内容尽量放在中间。',
            'notes' => [
                'ok' => '比例 :ratio:1。',
                'cropped' => '比例 :ratio:1：大卡片会裁掉图片的边缘。',
                'no_image' => '无法读取图片。',
            ],
        ],
        'I5' => [
            'title' => '图片加载快吗？',
            'text' => '不超过 1 MB',
            'fix' => '把图片压缩到 1 MB 以下，最好 300 KB 以下：以 80–85% 的质量保存为 JPG 或 WebP。',
            'notes' => [
                'ok' => '文件大小 :size KB。',
                'heavy' => '文件大小 :size KB：聊天应用加载缓慢或直接跳过。',
                'no_image' => '无法读取图片。',
            ],
        ],
        'I6' => [
            'title' => '图片有文字说明吗？',
            'text' => 'og:image:alt',
            'fix' => '添加描述图片内容的 og:image:alt：屏幕阅读器会读出它。',
            'notes' => [
                'ok' => '图片有说明。',
                'none' => '图片没有说明。',
                'no_image' => '没有可检查的图片。',
            ],
        ],
        'M1' => [
            'title' => '卡片指向正确的地址吗？',
            'text' => 'og:url 与 canonical 一致',
            'fix' => '在 og:url 中填写页面的主地址，与 canonical 相同。社交网络按这个地址统计点赞和分享。',
            'notes' => [
                'ok' => '已指定地址。',
                'mismatch' => 'og:url 与 canonical（:canonical）不同。点赞可能会分散到两个地址。',
                'none' => '没有 og:url。',
            ],
        ],
        'M2' => [
            'title' => '指定了页面类型吗？',
            'text' => 'og:type',
            'fix' => '添加 og:type：首页和普通页面用 website，文章用 article。',
            'notes' => [
                'ok' => '已指定类型。',
                'none' => '没有 og:type。',
            ],
        ],
        'M3' => [
            'title' => '指定了网站名称吗？',
            'text' => 'og:site_name',
            'fix' => '添加带网站名称的 og:site_name：聊天应用会把它显示在卡片标题上方。',
            'notes' => [
                'ok' => '已指定网站名称。',
                'none' => '没有 og:site_name。',
            ],
        ],
        'M4' => [
            'title' => 'X 会显示大卡片吗？',
            'text' => 'twitter:card = summary_large_image',
            'fix' => '添加值为 summary_large_image 的 twitter:card，让 X 显示带图片的大卡片。',
            'notes' => [
                'ok' => '已启用大卡片。',
                'small' => '值为 summary：X 会显示小卡片。',
                'unknown' => 'twitter:card 的值不常见。',
                'none' => '没有 twitter:card。',
            ],
        ],
    ],
];
