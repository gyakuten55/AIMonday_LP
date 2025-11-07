<!-- =======================================================
     ステージ本体（ここからコピペでOK）
     画像差し替え：下の .dec にある <img src="..."> を入れ替え
     ======================================================= -->
<section class="decor_block">
  <div class="stage">
    <div class="burst" aria-hidden="true"></div>

    <!-- ボタン群 -->
    <div class="btns">
      <a href="https://forms.gle/ph5B2TmDAd5kwgAD8" class="pill" data-aos="zoom-in-up" data-aos-delay="50">
        <span class="label">フォームの申し込みから参加する</span>
        <span class="plus">+</span>
      </a>
      <a href="https://lin.ee/R2UqhJA" class="pill" data-aos="zoom-in-up" data-aos-delay="150">
        <span class="label">LINEから参加申し込みする</span>
        <span class="plus">+</span>
      </a>

    </div>
	  
	  <!-- 背景の星たち（ボタン＆吹き出しには重ならない配置） -->
<div class="stars" aria-hidden="true">
  <img class="star s1" src="images/bg/hoshi.svg" alt="">
  <img class="star s2" src="images/bg/hoshi.svg" alt="">
  <img class="star s3" src="images/bg/hoshi.svg" alt="">
  <img class="star s4" src="images/bg/hoshi.svg" alt="">
  <img class="star s5" src="images/bg/hoshi.svg" alt"">
  <img class="star s6" src="images/bg/hoshi.svg" alt="">
  <img class="star s7" src="images/bg/hoshi.svg" alt="">
  <img class="star s8" src="images/bg/hoshi.svg" alt="">
  <img class="star s9" src="images/bg/hoshi.svg" alt="">
  <img class="star s10" src="images/bg/hoshi.svg" alt="">
</div>
	  
<div class="boom" data-aos="zoom-in" data-aos-delay="250">
  <img src="images/bg/boom1.svg" alt="boom">
</div>
    <!-- デコレーション：各パーツは個別にAOS制御可能 -->
    <!-- heart（画像が無ければ .stub を残してOK） -->
<div class="dec heart" data-aos="fade-down" data-aos-delay="200" data-aos-duration="900" style="--rot:3deg;">
  <div class="stub float-xl" style="aspect-ratio:1/1;">  <img src="images/icon/a.png" alt="a"></div>
</div>

    <!-- star1 -->
    <div class="dec star1 tilt-r"
         data-aos="fade-down-right" data-aos-delay="260" data-aos-duration="800">
      <div class="stub" style="aspect-ratio:1/1;"><img src="images/icon/c.png" alt="b"></div>
      <!-- <img src="images/star-yellow.png" alt=""> -->
    </div>

    <!-- star2 -->
    <div class="dec star2 tilt-l"
         data-aos="fade-down-left" data-aos-delay="320" data-aos-duration="800">
      <div class="stub" style="aspect-ratio:1/1;"><img src="images/icon/b.png" alt="c"></div>
      <!-- <img src="images/star-purple.png" alt=""> -->
    </div>

    <!-- PLAYME みたいなワードステッカー -->
    <div class="dec word1 float" style="--rot:-8deg;"
         data-aos="fade-up-right" data-aos-delay="380" data-aos-duration="900">
      <div class="stub" style="aspect-ratio: 5/2;"><img src="images/icon/d.png" alt="d"></div>
      <!-- <img src="images/sticker-playme.png" alt=""> -->
    </div>

    <!-- MEMEME みたいなシルバー文字 -->
<div class="dec word2" data-aos="fade-up-left" data-aos-delay="460" data-aos-duration="900">
  <div class="stub flip" style="aspect-ratio: 5/2;"><img src="images/icon/e.png" alt="e"></div>
</div>

  </div>
	

</section>

<script>
AOS.init({
  duration: 800,
  offset: 80,
  once: false
});
</script>