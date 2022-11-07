window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
window.Vue = require('vue')

import App from './App.vue'
import router from './router'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component> -> <ExampleComponent></ExampleComponent>
 */

// const files = require.context('./', true, /\.vue$/i)
// files
//   .keys()
//   .map(key =>
//     Vue.component(key.split('/').pop().split('.')[0], files(key).default)
//   )

const app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
})
