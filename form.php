<?php
declare(strict_types=1);
mb_internal_encoding('UTF-8');
session_start();

// ===== 設定 =====
const TO_EMAIL   = 'kobayashi.nami@meta-heroes.io';
const FROM_EMAIL = 'no-reply@meta-heroes.io';
const SITE_NAME  = 'AI MONDAY お問い合わせ';

function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$errors = [];
$done = false;

// 簡易スパム対策
$hp = $_POST['website'] ?? '';
if ($hp !== '') { http_response_code(200); exit; }

// CSRFチェック
if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
  $errors[] = '不正なリクエストです。ページを再読み込みしてください。';
}

$company  = trim((string)($_POST['company'] ?? ''));
$position = trim((string)($_POST['position'] ?? ''));
$name     = trim((string)($_POST['name'] ?? ''));
$topic    = trim((string)($_POST['topic'] ?? ''));
$message  = trim((string)($_POST['message'] ?? ''));

if ($name === '') $errors[] = 'お名前は必須です。';
if ($topic === '') $errors[] = 'お問い合わせ内容を選択してください。';
if ($topic === 'その他（自由記入）' && $message === '') $errors[] = '自由記入欄を入力してください。';

if (!$errors) {
  $body = "【お問い合わせが届きました】\n"
        . "サイト: " . SITE_NAME . "\n"
        . "日時: " . date('Y-m-d H:i:s') . "\n"
        . "------------------------------\n"
        . "社名: " . ($company ?: '(未入力)') . "\n"
        . "役職: " . ($position ?: '(未入力)') . "\n"
        . "お名前: " . $name . "\n"
        . "お問い合わせ内容: " . $topic . "\n"
        . "------------------------------\n"
        . "自由記入:\n" . ($message ?: '(未入力)');

  $subject = '【自動通知】' . SITE_NAME . '：' . $topic;
  $headers = [
    'From: ' . FROM_EMAIL,
    'Reply-To: ' . FROM_EMAIL,
    'Content-Type: text/plain; charset=UTF-8'
  ];

  $ok = @mb_send_mail(TO_EMAIL, $subject, $body, implode("\r\n", $headers));
  if ($ok) $done = true; else $errors[] = '送信に失敗しました。';
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title><?=h(SITE_NAME)?></title>
<style>
  body{font-family:'Noto Sans JP',sans-serif;background:#0b0f19;color:#fff;text-align:center;padding:80px;}
  .msg{background:#111726;display:inline-block;padding:40px 60px;border-radius:16px;}
  a{color:#6ea8fe;}
</style>
</head>
<body>
<div class="msg">
<?php if($done): ?>
  <h2>送信が完了しました</h2>
  <p>担当者よりご連絡いたします。ありがとうございます。</p>
<?php else: ?>
  <h2>エラーが発生しました</h2>
  <?php foreach($errors as $e){ echo '<p>'.h($e).'</p>'; } ?>
  <p><a href="/btn2/includes/index_13.php">戻る</a></p>
<?php endif; ?>
</div>
</body>
</html>
