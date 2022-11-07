<template>
  <div>
    <button
      class="btn btn-primary position-fixed end-0 translate-middle-y me-3 cart-button-menu btn-cart"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#cart"
      aria-controls="cart"
      @click="updateCart"
    >
      <!-- <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0xRXI75O1J1h6aSV-s4Eemxw9daaIM7NmMA&usqp=CAU"
        alt=""
        style="width: 60px"
      /> -->
      <i
        class="fa-solid fa-cart-shopping"
        style="font-size: 1.125rem"
      ></i>
    </button>

    <div
      class="offcanvas offcanvas-end"
      data-bs-scroll="true"
      tabindex="-1"
      id="cart"
      aria-labelledby="cartLabel"
    >
      <div class="offcanvas-header">
        <h5
          class="offcanvas-title fw-bold"
          id="cartLabel"
        >
          IL TUO ORDINE
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="divisor mx-3"></div>
      <div class="offcanvas-body">
        <div class="row g-3">
          <div
            class="col-12"
            v-if="Object.values(cart).length > 0"
          >
            <h4
              class="w-100"
              v-if="Object.values(cart).length > 0"
            >
              {{ Object.values(cart)[0].restaurant.name }}
            </h4>

            <p
              class="w-100"
              style="font-size: 0.875rem"
            >
              * Ricorda di acquistare da un ristorante alla volta!
            </p>
          </div>
          <h4
            class="col-12"
            v-else
          >
            Il carrello è vuoto...
            <img
              class="w-100 pt-5"
              src="https://marketplace.foodotawp.com/wp-content/themes/foodota/libs/images/emptycart.png"
              alt=""
            />
          </h4>

          <div
            class="col-12"
            v-if="Object.values(cart).length > 0"
            style="max-height: 40rem; overflow-y: auto"
          >
            <div
              class="card mb-2"
              v-for="order in Object.values(cart)"
              :key="order.product.id"
            >
              <div class="card-body">
                <span>{{ order.product.name }}</span>
                <span class="fw-bold">x{{ order.product.quantity }}</span>
              </div>
              <div class="card-footer">
                <span class="fw-bold">Costo:</span>
                <span>{{ currency.format(order.product.total) }}</span>
              </div>
            </div>
          </div>

          <div
            class="col-12"
            v-if="Object.values(cart).length > 0"
          >
            <div class="card">
              <div class="card-body">
                <span class="fw-bold">Totale:</span>
                <span>{{ currency.format(total) }}</span>
              </div>
            </div>
          </div>

          <div
            class="col-12"
            v-if="Object.values(cart).length > 0"
          >
            <a
              class="btn btn-success btn-checkout w-100 fs-5"
              href="/checkout"
              >Vai al pagamento</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import cart from '../shared/cart'

export default {
  name: 'AppCart',
  data() {
    return {
      cart,
      currency: new Intl.NumberFormat('it-IT', {
        style: 'currency',
        currency: 'EUR',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      }),
    }
  },
  computed: {
    total() {
      return Object.values(this.cart).reduce(
        (sum, { product }) => sum + product.total,
        0
      )
    },
  },
  mounted() {
    this.updateCart()
  },
  methods: {
    updateCart() {
      if (localStorage.getItem('cart')) {
        try {
          this.cart = JSON.parse(localStorage.getItem('cart'))
        } catch (ex) {
          console.log('[AppCart] Exception', ex)
          localStorage.removeItem('cart')
        }
      }
    },
  },
}
</script>
