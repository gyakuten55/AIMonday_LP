<footer class="footer">
  <p>© 2025 株式会社MetaHeroes</p>
</footer>
	
	<script>
  const API_KEY = "AIzaSyBGwrgpZuTbRD1qew4goEV9JnpGmmIp760";
  const CHANNEL_ID = "UCjYyHMclyTfvtNDN2MOv6yg";
  const MAX_RESULTS = 6;

  fetch(`https://www.googleapis.com/youtube/v3/search?key=${API_KEY}&channelId=${CHANNEL_ID}&part=snippet&order=date&maxResults=${MAX_RESULTS}`)
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById("youtube-videos");
      data.items.forEach(item => {
        if(item.id.kind === "youtube#video"){ 
          const videoId = item.id.videoId;
          const title = item.snippet.title;
          const thumbnail = item.snippet.thumbnails.high.url;
          const videoUrl = `https://www.youtube.com/watch?v=${videoId}`;
          
          const slide = `
            <div class="swiper-slide">
              <a href="${videoUrl}" target="_blank">
                <img src="${thumbnail}" alt="${title}">
                <p>${title}</p>
              </a>
            </div>
          `;
          container.innerHTML += slide;
        }
      });

      // Swiper初期化
      new Swiper(".youtube-swiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          768: { slidesPerView: 3 },
          480: { slidesPerView: 2 },
          0:   { slidesPerView: 1 }
        }
      });
    });
</script>



<!-- AOS JS（CDN） --> 
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  // AOS 初期化
  AOS.init({
    duration: 800,              // アニメーションの長さ
    easing: 'ease-out',         // イージング
    once: false,                // ← スクロールのたびに何回も発火する
    offset: 80,                 // 発火位置（画面下から80pxで発火）
    anchorPlacement: 'top-bottom',
    // 低スペックや省エネ設定では無効化
    disable: function () {
      return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }
  });

  // ページロード後に位置を再計測（ズレ防止）
  window.addEventListener('load', function () {
    AOS.refresh();
  });
</script>
	
<script>
  window.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".future-block").classList.add("loaded");
  });
</script>