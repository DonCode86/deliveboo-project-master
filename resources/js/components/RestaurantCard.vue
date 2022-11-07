<template>
  <div class="card">
    <img
      v-if="restaurant.image"
      :src="`storage/${restaurant.image}`"
      class="card-img-top"
      :alt="restaurant.name"
      style="object-fit: cover; height: 8rem"
    />
    <img
      v-else
      src="http://via.placeholder.com/800x600"
      class="card-img-top"
      :alt="restaurant.name"
      style="object-fit: cover; height: 8rem"
    />
    <div class="card-body card-body-restaurant-card">
      <h5 class="card-title fw-bold">{{ restaurant.name }}</h5>
    </div>
    <p class="card-text text-center py-1">
      {{ categories }}
    </p>
    <router-link
      class="stretched-link"
      :to="{ name: 'restaurant', params: { slug: restaurant.slug } }"
    ></router-link>
  </div>
</template>

<script>
export default {
  name: 'RestaurantCard',
  props: {
    restaurant: {
      type: Object,
      required: true,
    },
  },
  computed: {
    categories() {
      return this.restaurant.categories
        .map(category => category.name)
        .join(' - ')
    },
  },
}
</script>
