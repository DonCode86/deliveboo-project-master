import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomePage from './pages/HomePage'
import RestaurantPage from './pages/RestaurantPage'

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage,
    },
    {
      path: '/restaurants/:slug',
      name: 'restaurant',
      component: RestaurantPage,
    },
  ],
})

export default router
