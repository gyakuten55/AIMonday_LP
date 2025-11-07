<?php
ob_start();          // ★追加
session_start();     // ★追加
?>
<!doctype html>
<html lang="ja">
<?php include("includes/meta_head.php"); ?>
<body>
<!-- 固定ヘッダー（ロゴ差し替えOK） -->
<?php include("includes/header.php"); ?>
<main class="app" id="app" role="main" aria-label="アプリ本体">
<?php 
include("includes/index_top.php");///メインTOP
include("includes/index_01.php");////次のブロック(これからの世代は、“AIと共に育つ”世代になる。)
include("includes/cta.php");////ボタン群
include("includes/index_02.php");///（イベント）
include("includes/index_03.php");////(インタビュー)
include("includes/index_04.php");////（参加するメリット）
include("includes/index_05.php");////（ハイライト）
///NEW
include("includes/index_06.php");////（USER）
include("includes/index_07.php");////(ボタン)
include("includes/index_08.php");////3
include("includes/index_09.php");////4
include("includes/index_10.php");////5
include("includes/index_13.php");////8 (h()関数定義 - index_11.phpより先に読み込む)
include("includes/index_11.php");////6
include("includes/index_14.php");////9	
include("includes/footer.php");////フッター
	
?>
	
</main>
</body>
</html>
