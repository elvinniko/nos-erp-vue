
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
import BootstrapVue from 'bootstrap-vue'
import { Form, HasError, AlertError } from 'vform'
import VueRouter from 'vue-router'
import moment from 'moment'
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'

//vue bootstrap
Vue.use(BootstrapVue)

//vue form
window.Form = Form //deklarasi form untuk dapat digunakan global
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//vue pagination
Vue.component('pagination', require('laravel-vue-pagination'))

//vue custom event
window.Custom = new Vue()

//vue filter
Vue.filter('uppercase', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
})
Vue.filter('capslock', function(text){
    return text.toUpperCase()
})
Vue.filter('date', function(text){
    return moment(text).format('MMMM Do YYYY, h:mm:ss a')
})

//vue progressbar
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}
Vue.use(VueProgressBar, options)

// vue router
Vue.use(VueRouter)
let routes = [

    //route master
    { path: '/dtKlasifikasi', component: require('./components/master/DataKlasifikasi.vue').default },
    { path: '/dtGudang', component: require('./components/master/DataGudang.vue').default },
    { path: '/dtItem', component: require('./components/master/DataItem.vue').default },
    { path: '/dtMataUang', component: require('./components/master/DataMataUang.vue').default },
    { path: '/dtPelanggan', component: require('./components/master/DataPelanggan.vue').default },
    { path: '/dtSatuan', component: require('./components/master/DataSatuan.vue').default },
    { path: '/dtSupplier', component: require('./components/master/DataSupplier.vue').default },

    //route pemesanan pembelian
    { path: '/pesanPembelian', component: require('./components/pembelian/pemesananPembelian/pemesananPembelian.vue').default },
    { path: '/konfirmasiPembelian', component: require('./components/pembelian/pemesananPembelian/konfirmasiPembelian.vue').default },
    { path: '/diterimaPembelian', component: require('./components/pembelian/pemesananPembelian/diterimaPembelian.vue').default },
    { path: '/batalPembelian', component: require('./components/pembelian/pemesananPembelian/batalPembelian.vue').default },

    //route penerimaan barang
    { path: '/penerimaanBarang', component: require('./components/pembelian/penerimaanBarang/penerimaanBarang.vue').default },
    { path: '/konfirmasiPenerimaan', component: require('./components/pembelian/penerimaanBarang/konfirmasipenerimaanBarang.vue').default },
    { path: '/returnPenerimaan', component: require('./components/pembelian/penerimaanBarang/returnPenerimaanBarang.vue').default },
    { path: '/konfirmasiReturnPenerimaan', component: require('./components/pembelian/penerimaanBarang/konfirmasiReturnPenerimaanBarang.vue').default },

    //route pemesanan penjualan 
    { path: '/pesanPenjualan', component: require('./components/penjualan/pemesananPenjualan/pemesananPenjualan.vue').default },
    { path: '/konfirmasiPenjualan', component: require('./components/penjualan/pemesananPenjualan/konfirmasiPenjualan.vue').default },
    { path: '/dikirimPenjualan', component: require('./components/penjualan/pemesananPenjualan/dikirimPenjualan.vue').default },
    { path: '/batalPenjualan', component: require('./components/penjualan/pemesananPenjualan/batalPenjualan.vue').default },

    //route surat jalan
    { path: '/suratJalan', component: require('./components/penjualan/suratJalan/suratJalan.vue').default },
    { path: '/konfirmasiSuratJalan', component: require('./components/penjualan/suratJalan/konfirmasiSuratJalan.vue').default },
    { path: '/returnSuratJalan', component: require('./components/penjualan/suratJalan/returnSuratJalan.vue').default },
    { path: '/konfirmasiReturnSuratJalan', component: require('./components/penjualan/suratJalan/konfirmasiReturnSuratJalan.vue').default },

    //route penjualan langsung
    { path: '/penjualanLangsung', component: require('./components/penjualan/penjualanLangsung/penjualanLangsung.vue').default },
    { path: '/returnPenjualanLangsung', component: require('./components/penjualan/penjualanLangsung/returnPenjualanLangsung.vue').default },
]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

//sweetalert popup
window.Swal = Swal
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});