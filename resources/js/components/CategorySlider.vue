<template>
  <div v-if="categories.length > 0">
    <Swiper
      :slidesPerView="6"
      :spaceBetween="5"
      :slidesPerGroup="3"
      :loop="false"
      :loopFillGroupWithBlank="true"
      :pagination="false"
      :navigation="true"
      :breakpoints="{
        '499': {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        '640': {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        '768': {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        '1024': {
          slidesPerView: 6,
          spaceBetween: 10,
        },
      }"
      class="mySwiper"
    >
      <SwiperSlide
        v-for="category in categories"
        :key="category.id"
      >
        <div
          class="card text-bg-dark"
          :class="{
            'card-selected': selectedCategories.includes(category.slug),
          }"
          @click="selectCategory(category)"
        >
          <div v-if="category.name === 'Italiano'">
            <img
              src="images/italic.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Internazionale'">
            <img
              src="images/international.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Cinese'">
            <img
              src="images/chinese.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Giapponese'">
            <img
              src="images/sushi.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Messicano'">
            <img
              src="images/mexican.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Indiano'">
            <img
              src="images/indian.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Pesce'">
            <img
              src="images/fish.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Carne'">
            <img
              src="images/meat.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div v-else-if="category.name === 'Pizza'">
            <img
              src="images/pizza2.jpeg"
              class="card-img"
              :alt="category.name"
            />
          </div>
          <div class="card-img-overlay">
            <h5 class="card-slider-title w-100 text-uppercase">
              {{ category.name }}
            </h5>
          </div>
        </div>
      </SwiperSlide>
      <div class="divisor mt-4 mx-auto"></div>
    </Swiper>
  </div>
</template>

<script>
// Core modules imports are same as usual
import { Navigation, Pagination } from 'swiper'
// Direct Swiper Vue2 component imports
import { SwiperCore, Swiper, SwiperSlide } from 'swiper-vue2'

// Styles must use direct files imports
import 'swiper/swiper-bundle.css' // Swiper 6 bundle

// Import modules to SwiperCore
SwiperCore.use([Navigation, Pagination])

export default {
  name: 'CategorySlider',
  components: {
    Swiper,
    SwiperSlide,
  },
  data() {
    return {
      categories: [],
      selectedCategories: [],
    }
  },
  created() {
    axios
      .get('/api/categories')
      .then(response => (this.categories = response.data))
      .catch(err => console.error(err))
  },
  methods: {
    selectCategory(category) {
      if (this.selectedCategories.includes(category.slug)) {
        this.selectedCategories = this.selectedCategories.filter(
          _category => _category != category.slug
        )
      } else {
        this.selectedCategories.push(category.slug)
      }

      this.$emit('select-category', this.selectedCategories)
    },
  },
}
</script>

<style lang="scss" scoped></style>
