<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="swiper mySwiper" style="width: 70%; height: 550px;">
  <div class="swiper-wrapper">
    @foreach($images as $index => $image)
    <div class="swiper-slide"><img class="d-block w-100" src="{{ asset($image->name) }}" alt="Slide {{ $index }}"></div>
    @endforeach
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
  });
</script>