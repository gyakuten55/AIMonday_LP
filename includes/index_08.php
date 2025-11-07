<section class="faq-wrap" id="faq" aria-label="よくあるご質問">
  <h2 class="faq-heading">FAQ</h2>

  <div class="faq-item">
    <button class="faq-q" aria-expanded="false" aria-controls="faq-a1" id="faq-q1">
      Q. 初心者でも参加できますか？
      <span class="faq-icon" aria-hidden="true"></span>
    </button>
    <div class="faq-a" id="faq-a1" role="region" aria-labelledby="faq-q1">
      A. はい、<span class="u-anim" style="--d:0.0s">初心者の方でも安心</span>してご参加いただけます。
   基礎から実践まで学べる内容です。
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-q" aria-expanded="false" aria-controls="faq-a2" id="faq-q2">
      Q. 参加費はかかりますか？
      <span class="faq-icon" aria-hidden="true"></span>
    </button>
    <div class="faq-a" id="faq-a2" role="region" aria-labelledby="faq-q2">
      A.基本参加は <span class="u-anim" style="--d:0.0s">無料</span>です。
      一部特別プログラムのみ有料となる場合があります。
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-q" aria-expanded="false" aria-controls="faq-a3" id="faq-q3">
      Q. 法人での参加は可能ですか？
      <span class="faq-icon" aria-hidden="true"></span>
    </button>
    <div class="faq-a" id="faq-a3" role="region" aria-labelledby="faq-q3">
      A. はい、法人単位での参加や
     複数名での参加も可能ですが、
     <span class="u-anim" style="--d:0.1s"> お一人ずつのお申し込みが必要です。</span>10名以上ご参加の場合は別途ご案内いたしますので
    お問い合わせフォームよりご連絡ください。
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-q" aria-expanded="false" aria-controls="faq-a4" id="faq-q4">
      Q. 録画アーカイブは見られますか？
      <span class="faq-icon" aria-hidden="true"></span>
    </button>
    <div class="faq-a" id="faq-a4" role="region" aria-labelledby="faq-q4">
      A. はい、<span class="u-anim" style="--d:0.0s">コミュニティメンバー登録</span>いただいた方は
      <span class="u-anim" style="--d:0.1s">後日アーカイブを視聴</span>できます。
      また、<span class="u-anim" style="--d:0.2s">SNSにてダイジェスト動画</span>を配信しております。
    </div>
  </div>

</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
      const btn = item.querySelector('.faq-q');
      const panel = item.querySelector('.faq-a');

      // 初期のmax-height（閉状態）
      panel.style.maxHeight = '0px';

      btn.addEventListener('click', () => {
        const expanded = btn.getAttribute('aria-expanded') === 'true';

        // トグル
        btn.setAttribute('aria-expanded', String(!expanded));

        if (!expanded) {
          // 開く
          panel.classList.add('is-open');
          panel.style.maxHeight = panel.scrollHeight + 'px';
        } else {
          // 閉じる
          panel.style.maxHeight = panel.scrollHeight + 'px'; // 一度現在高をセット
          requestAnimationFrame(() => {
            panel.style.maxHeight = '0px';
            panel.classList.remove('is-open');
          });
        }
      });

      // ウィンドウリサイズで開いている項目の高さ再計算
      window.addEventListener('resize', () => {
        if (btn.getAttribute('aria-expanded') === 'true') {
          panel.style.maxHeight = panel.scrollHeight + 'px';
        }
      });
    });
  });
</script>

