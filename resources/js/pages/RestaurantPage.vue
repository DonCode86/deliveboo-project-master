<template>
  <div v-if="restaurant">
    <div class="mb-3 text-white">
      <div class="card">
        <div class="row g-0 hero-restaurant-products align-items-center">
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="products-hero-title fw-bold">
                {{ restaurant.name }}
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <h1 class="text-center fw-bold">I NOSTRI PIATTI</h1>
      <div class="bottom-dots d-flex justify-content-center pt-1 pb-4">
        <span class="dot line-dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <div
        class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-3"
      >
        <div
          class="col-12"
          v-for="product in products"
          :key="product.id"
        >
          <ProductCard
            class=""
            :restaurant="restaurant"
            :product="product"
          />
        </div>
      </div>
    </div>
    <FooterGuest />
  </div>
</template>

<script>
import ProductCard from '../components/ProductCard.vue'
import FooterGuest from '../components/FooterGuest.vue'

export default {
  components: { ProductCard, FooterGuest },
  name: 'RestaurantPage',
  data() {
    return {
      restaurant: null,
      products: null,
    }
  },
  created() {
    axios
      .get(`/api/restaurants/${this.$route.params.slug}?include=categories`)
      .then(response => (this.restaurant = response.data))
      .catch(err => console.error(err))

    axios
      .get(
        `/api/restaurants/${this.$route.params.slug}/products?filter[is_available]=1`
      )
      .then(response => (this.products = response.data))
      .catch(err => console.error(err))
  },
  computed: {
    categories() {
      if (!this.restaurant) return

      return this.restaurant.categories
        .map(category => category.name)
        .join(' - ')
    },
  },
}
</script>

<style lang="scss" scoped></style>
