<template>
  <div class="card product-card product-card-restaurant-guest">
    <img
      v-if="product.image"
      :src="`../storage/${product.image}`"
      class="card-img-top"
      :alt="product.name"
      style="object-fit: cover; height: 8rem"
    />
    <img
      v-else
      src="http://via.placeholder.com/800x600"
      class="card-img-top"
      :alt="product.name"
      style="object-fit: cover; height: 8rem"
    />
    <div class="card-body card-body-no-padding">
      <h5 class="card-title">{{ product.name }}</h5>
      <div class="card-text text-center py-1">
        <span class="fw-bold">Prezzo:</span>
        {{ currency.format(product.price) }}
      </div>
      <div
        class="btn-quantity btn-group"
        role="group"
      >
        <button
          type="button"
          class="btn btn-danger"
          @click="removeProduct"
        >
          -
        </button>
        <input
          type="number"
          name="quantity"
          id="quantity"
          value="0"
          step="1"
          min="0"
          class="w-100 text-center"
          v-model="quantity"
        />
        <button
          type="button"
          class="btn btn-success"
          @click="addProduct"
        >
          +
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import cart from '../shared/cart'

export default {
  name: 'ProductCard',
  props: {
    restaurant: {
      type: Object,
      required: true,
    },
    product: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      cart,
      key: `${this.restaurant.id}_${this.product.id}`,
      quantity: 0,
      currency: new Intl.NumberFormat('it-IT', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      }),
    }
  },
  mounted() {
    if (localStorage.getItem('cart')) {
      try {
        this.cart = JSON.parse(localStorage.getItem('cart'))
        this.quantity = this.cart[this.key]?.product.quantity ?? 0
      } catch (ex) {
        console.log(`[ProductCard] ${this.product.name} Exception`, ex)
        localStorage.removeItem('cart')
      }
    }
  },
  methods: {
    addProduct() {
      if (this.quantity >= 0) {
        this.quantity++
      }

      this.updateProduct()
      this.updateCart()
    },

    updateProduct() {
      const firstEntry = Object.values(this.cart)[0]
      if (firstEntry && firstEntry.restaurant.id !== this.restaurant.id) {
        this.quantity = 0
        return
      }

      this.cart[this.key] = {
        restaurant: this.restaurant,
        product: {
          ...this.product,
          quantity: this.quantity,
          total: this.product.price * this.quantity,
        },
      }
    },

    removeProduct() {
      if (this.quantity > 0) {
        this.quantity--
      }

      this.updateProduct()

      if (this.quantity <= 0) {
        delete this.cart[this.key]
      }

      this.updateCart()
    },

    updateCart() {
      const parsed = JSON.stringify(this.cart)
      localStorage.setItem('cart', parsed)
    },
  },
}
</script>
