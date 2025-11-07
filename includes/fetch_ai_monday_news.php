<?php
/**
 * PR TIMESからAI MONDAY関連の記事を取得
 * キャッシュ時間: 1時間
 */

function fetch_ai_monday_news() {
    $rss_url = 'https://prtimes.jp/companyrdf.php?company_id=94539';
    $cache_file = __DIR__ . '/../cache/ai_monday_news.json';
    $cache_time = 3600; // 1時間（秒）

    // キャッシュが有効かチェック
    if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_time) {
        $cached_data = file_get_contents($cache_file);
        return json_decode($cached_data, true);
    }

    $ai_monday_items = [];

    try {
        // RSSフィードを取得
        $context = stream_context_create([
            'http' => [
                'timeout' => 10,
                'user_agent' => 'Mozilla/5.0 (compatible; AI MONDAY Website)'
            ]
        ]);

        $xml_content = @file_get_contents($rss_url, false, $context);

        if ($xml_content === false) {
            throw new Exception('RSSフィードの取得に失敗しました');
        }

        // XMLをパース
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xml_content);

        if ($xml === false) {
            throw new Exception('XMLのパースに失敗しました');
        }

        // 名前空間の登録
        $xml->registerXPathNamespace('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        $xml->registerXPathNamespace('dc', 'http://purl.org/dc/elements/1.1/');

        // itemを取得
        $items = $xml->item ?? $xml->xpath('//item');

        if (!empty($items)) {
            foreach ($items as $item) {
                $title = (string)$item->title;

                // 「AI MONDAY」を含む記事のみフィルタリング
                if (stripos($title, 'AI MONDAY') !== false ||
                    stripos($title, 'AIMONDAY') !== false) {

                    $date_str = (string)($item->date ?? $item->children('http://purl.org/dc/elements/1.1/')->date);
                    $link = (string)$item->link;

                    // 日付をフォーマット
                    if (!empty($date_str)) {
                        $date_obj = new DateTime($date_str);
                        $formatted_date = $date_obj->format('Y.m.d');
                    } else {
                        $formatted_date = '日付不明';
                    }

                    $ai_monday_items[] = [
                        'date' => $formatted_date,
                        'title' => $title,
                        'link' => $link
                    ];

                    // 最新3件のみ取得
                    if (count($ai_monday_items) >= 3) {
                        break;
                    }
                }
            }
        }

        // キャッシュに保存
        if (!empty($ai_monday_items)) {
            file_put_contents($cache_file, json_encode($ai_monday_items, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        }

    } catch (Exception $e) {
        // エラー時は古いキャッシュがあればそれを使用
        if (file_exists($cache_file)) {
            $cached_data = file_get_contents($cache_file);
            return json_decode($cached_data, true);
        }

        // キャッシュもない場合は空配列
        return [];
    }

    return $ai_monday_items;
}
