<template>
  <div>
    <router-view></router-view>

    <AppCart />
  </div>
</template>

<script>
import AppCart from './components/AppCart.vue'

export default {
  components: { AppCart },
  name: 'App',
}
</script>
