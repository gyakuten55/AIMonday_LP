<?php
// CSRFトークン（未発行なら作成）
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// エスケープ用
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// お問い合わせ内容（選択肢）
$options = [
  'AI MONDAY参加申込',
  'AI MONDAY参加について',
  '法人・団体での参加について',
  'スポンサー・協賛について',
  'メディア取材について',
  '登壇・講師としての参加について',
  'other', // ← valueはシンプルに"other"
];
?>
<form id="contact" method="post" action="/btn2/form.php" novalidate>

<div class="wrap">
  <h1>お問い合わせ</h1>
  <p>AI MONDAYに関するお問い合わせはこちらのフォームからお送りください。</p>

  <form method="post" action="/btn2/form.php" novalidate>

    <!-- CSRFトークン -->
    <input type="hidden" name="csrf" value="<?=h($_SESSION['csrf'])?>">

    <!-- スパム対策（botが入れる用） -->
    <div style="display:none;">
      <input type="text" name="website">
    </div>

    <!-- 社名 -->
    <label>社名（任意）</label>
    <input type="text" name="company" placeholder="例）株式会社MetaHeroes">

    <!-- 役職 -->
    <label>役職（任意）</label>
    <input type="text" name="position" placeholder="例）マーケティング担当">

    <!-- お名前 -->
    <label>お名前（必須）</label>
    <input type="text" name="name" required placeholder="例）山田 太郎">

    <!-- お問い合わせ内容 -->
    <label>お問い合わせ内容（必須）</label>
    <select name="topic" id="topic" required>
      <option value="">選択してください</option>
      <option value="AI MONDAY参加申込">AI MONDAY参加申込</option>
      <option value="AI MONDAY参加について">AI MONDAY参加について</option>
      <option value="法人・団体での参加について">法人・団体での参加について</option>
      <option value="スポンサー・協賛について">スポンサー・協賛について</option>
      <option value="メディア取材について">メディア取材について</option>
      <option value="登壇・講師としての参加について">登壇・講師としての参加について</option>
      <option value="other">その他（自由記入）</option>
    </select>

    <!-- 自由記入欄（最初は非表示） -->
    <div id="freeArea" >
      <label>自由記入（任意）</label>
      <textarea name="message" placeholder="ご用件や詳細をご記入ください。"></textarea>
    </div>

    <div class="actions">
      <button type="submit">送信する</button>
    </div>

  </form>
</div>


