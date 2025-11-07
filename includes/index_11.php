<section class="news">
  <h2 class="news-title">News <span>お知らせ</span></h2>

  <div class="news-card">
    <div class="news-columns">
      <!-- メディア掲載 -->
      <div class="news-column">
        <h3 class="news-heading">メディア掲載</h3>
        <ul class="news-list">
          <li class="news-item">
            <span class="news-date">2025.09.05</span>
            <span class="news-text">ハイクラス人材向け情報メディア「コンサルGO」にて、「おすすめのブランドコンサルティング会社」として弊社が掲載されました。</span>
          </li>
          <li class="news-item">
            <span class="news-date">2025.07.23</span>
            <span class="news-text">関西テレビ「ココすご!企業図鑑」にて、弊社が認定・掲載されました。</span>
          </li>
          <li class="news-item">
            <span class="news-date">2025.05.02</span>
            <span class="news-text">日本最大級の日本酒オンラインコミュニティを運営する「酒小町」にて、弊社ショールーム型オフィス『THE SHOWROOM』が取材されました。</span>
          </li>
        </ul>
      </div>

      <!-- プレスリリース（AI MONDAY関連） -->
      <div class="news-column">
        <h3 class="news-heading">プレスリリース</h3>
        <ul class="news-list">
          <?php
          // AI MONDAY関連の記事を自動取得
          require_once __DIR__ . '/fetch_ai_monday_news.php';
          $ai_monday_news = fetch_ai_monday_news();

          if (!empty($ai_monday_news)) {
              foreach ($ai_monday_news as $news) {
                  echo '<li class="news-item">';
                  echo '<span class="news-date">' . h($news['date']) . '</span>';
                  echo '<span class="news-text">';
                  echo '<a href="' . h($news['link']) . '" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;">';
                  echo h($news['title']);
                  echo '</a>';
                  echo '</span>';
                  echo '</li>';
              }
          } else {
              // フォールバック: 記事が取得できない場合
              echo '<li class="news-item">';
              echo '<span class="news-date">-</span>';
              echo '<span class="news-text">記事を取得中です。しばらくお待ちください。</span>';
              echo '</li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>
