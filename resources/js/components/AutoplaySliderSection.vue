<template>
  <div class="autoplay-slider-container">
    <div class="autoplay-slider-title">
      <h1 class="text-center fw-bold">SEMPRE AL TUO FIANCO</h1>
    </div>
    <div class="bottom-dots d-flex justify-content-center pt-3">
      <span class="dot line-dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
    <swiper
      :spaceBetween="30"
      :slidesPerView="2"
      :centeredSlides="true"
      :autoplay="{
        delay: 2800,
        disableOnInteraction: false,
      }"
      :pagination="{
        clickable: true,
      }"
      :navigation="true"
      :modules="modules"
      class="mySwiper py-5"
    >
      <swiper-slide>
        <img
          style="width: 100%"
          src="https://images.pexels.com/photos/8165373/pexels-photo-8165373.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt=""
        /> </swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://media.istockphoto.com/photos/people-laughing-at-dinner-table-picture-id1181396290?b=1&k=20&m=1181396290&s=612x612&w=0&h=SSMFX-ZQXbbTsmU93ltSIh0ARI50TZd3hR0BV3r1MXM="
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/7218080/pexels-photo-7218080.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/5553613/pexels-photo-5553613.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/5157146/pexels-photo-5157146.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/7208692/pexels-photo-7208692.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/6238053/pexels-photo-6238053.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt="" /></swiper-slide
      ><swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/8547602/pexels-photo-8547602.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt=""
      /></swiper-slide>
      <swiper-slide
        ><img
          style="width: 100%"
          src="https://images.pexels.com/photos/7241457/pexels-photo-7241457.jpeg?auto=compress&cs=tinysrgb&w=600"
          alt=""
      /></swiper-slide>
    </swiper>
  </div>
</template>
<script>
// // Import Swiper Vue.js components
// import { Swiper, SwiperSlide } from 'swiper/vue'

// // Import Swiper styles
// import 'swiper/css'

// import 'swiper/css/pagination'
// import 'swiper/css/navigation'

// import './style.css'

// // import required modules
// import { Autoplay, Pagination, Navigation } from 'swiper'

// Core modules imports are same as usual
import { Navigation, Pagination, Autoplay } from 'swiper'
// Direct Swiper Vue2 component imports
import { SwiperCore, Swiper, SwiperSlide } from 'swiper-vue2'

// Styles must use direct files imports
import 'swiper/swiper-bundle.css' // Swiper 6 bundle

// Import modules to SwiperCore
SwiperCore.use([Navigation, Pagination, Autoplay])

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Autoplay, Pagination, Navigation],
    }
  },
}
</script>
