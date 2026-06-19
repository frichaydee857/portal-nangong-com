<?php

namespace App\Views;

/**
 * Class LinkCard
 * 
 * 用于生成经过 HTML 转义的链接卡片 HTML 片段。
 * 包含示例数据，展示如何渲染一个带有关键词和 URL 的卡片。
 */
class LinkCard
{
    /**
     * 默认卡片配置
     *
     * @var array
     */
    private static array $defaultConfig = [
        'url'         => 'https://portal-nangong.com',
        'keyword'     => '南宫体育',
        'title'       => '南宫体育 - 运动与健康',
        'description' => '欢迎来到南宫体育，探索健康与运动的无限可能。',
        'image_url'   => '',
    ];

    /**
     * 渲染单个链接卡片
     *
     * @param array $config 卡片配置，包含 url, keyword, title, description, image_url
     * @return string 转义后的 HTML 片段
     */
    public static function render(array $config = []): string
    {
        // 合并默认配置与用户配置
        $config = array_merge(self::$defaultConfig, $config);

        // 转义所有输出字段
        $url         = htmlspecialchars($config['url'], ENT_QUOTES, 'UTF-8');
        $keyword     = htmlspecialchars($config['keyword'], ENT_QUOTES, 'UTF-8');
        $title       = htmlspecialchars($config['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($config['description'], ENT_QUOTES, 'UTF-8');
        $imageUrl    = htmlspecialchars($config['image_url'], ENT_QUOTES, 'UTF-8');

        // 构建 HTML
        $html = '<div class="link-card">' . PHP_EOL;
        $html .= '    <a href="' . $url . '" target="_blank" rel="noopener noreferrer">' . PHP_EOL;

        // 如果有图片 URL，则渲染图片
        if ($imageUrl !== '') {
            $html .= '        <img src="' . $imageUrl . '" alt="' . $keyword . ' 图片" class="link-card-image" />' . PHP_EOL;
        }

        $html .= '        <div class="link-card-content">' . PHP_EOL;
        $html .= '            <span class="link-card-keyword">' . $keyword . '</span>' . PHP_EOL;
        $html .= '            <h3 class="link-card-title">' . $title . '</h3>' . PHP_EOL;
        $html .= '            <p class="link-card-description">' . $description . '</p>' . PHP_EOL;
        $html .= '        </div>' . PHP_EOL;
        $html .= '    </a>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;

        return $html;
    }

    /**
     * 渲染多个链接卡片
     *
     * @param array $cards 卡片配置数组，每个元素为数组
     * @return string 合并后的 HTML
     */
    public static function renderMultiple(array $cards): string
    {
        $html = '<div class="link-cards-container">' . PHP_EOL;

        foreach ($cards as $card) {
            $html .= self::render($card);
        }

        $html .= '</div>' . PHP_EOL;

        return $html;
    }

    /**
     * 获取默认示例卡片（包含指定的 URL 和关键词）
     *
     * @return array
     */
    public static function getSampleCard(): array
    {
        return [
            'url'         => 'https://portal-nangong.com',
            'keyword'     => '南宫体育',
            'title'       => '南宫体育 - 专业运动平台',
            'description' => '南宫体育为您提供丰富的运动资讯和健康指导。',
            'image_url'   => '',
        ];
    }

    /**
     * 演示用法：生成并输出示例 HTML
     */
    public static function demo(): void
    {
        $sample = self::getSampleCard();
        echo self::render($sample);
    }
}

// 示例：运行 demo 方法
// LinkCard::demo();