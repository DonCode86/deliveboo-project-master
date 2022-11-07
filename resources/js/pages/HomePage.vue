<template>
  <div>
    <Jumbotron />

    <div class="container">
      <CategorySlider @select-category="categoriesSelected($event)" />

      <div
        class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-3 mb-5"
        v-if="restaurants.length > 0"
      >
        <div
          class="col-12 col-sm-6 col-md-4 col-lg-3"
          v-for="restaurant in restaurants"
          :key="restaurant.id"
        >
          <RestaurantCard
            class="restaurant-card"
            :restaurant="restaurant"
          />
        </div>
      </div>
    </div>

    <BurgerSection />
    <AutoplaySliderSection />
    <HowSection />
    <GetstartedSection />
    <FooterGuest />
  </div>
</template>

<script>
import GetstartedSection from '../components/GetstartedSection.vue'
import BurgerSection from '../components/BurgerSection.vue'
import HowSection from '../components/HowSection.vue'
import Jumbotron from '../components/Jumbotron.vue'
import CategorySlider from '../components/CategorySlider.vue'
import FooterGuest from '../components/FooterGuest.vue'
import RestaurantCard from '../components/RestaurantCard.vue'
import AutoplaySliderSection from '../components/AutoplaySliderSection.vue'

export default {
  components: {
    CategorySlider,
    RestaurantCard,
    AutoplaySliderSection,
    FooterGuest,
    BurgerSection,
    Jumbotron,
    HowSection,
    GetstartedSection,
  },
  name: 'HomePage',

  data() {
    return {
      restaurants: [],
      categories: [],
    }
  },
  created() {
    axios
      .get('/api/restaurants?include=categories')
      .then(response => (this.restaurants = response.data))
      .catch(err => console.error(err))
  },
  watch: {
    categories(newCategories, oldCategories) {
      const filterParams = newCategories.join(',')

      axios
        .get(
          `/api/restaurants?include=categories&filter[categories.slug]=${filterParams}`
        )
        .then(response => (this.restaurants = response.data))
        .catch(err => console.error(err))
    },
  },
  methods: {
    categoriesSelected(categories) {
      this.categories = categories
    },
  },
}
</script>

<style lang="scss" scoped></style>
