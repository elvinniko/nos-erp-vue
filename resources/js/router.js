import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const routes = [
    //route master
    {
        path: '/dtKlasifikasi',
        component: require('./components/master/DataKlasifikasi.vue').default
    }, {
        path: '/dtGudang',
        component: require('./components/master/DataGudang.vue').default
    }, {
        path: '/dtItem',
        component: require('./components/master/DataItem.vue').default
    }, {
        path: '/dtMataUang',
        component: require('./components/master/DataMataUang.vue').default
    }, {
        path: '/dtPelanggan',
        component: require('./components/master/DataPelanggan.vue').default
    }, {
        path: '/dtSatuan',
        component: require('./components/master/DataSatuan.vue').default
    }, {
        path: '/dtSupplier',
        component: require('./components/master/DataSupplier.vue').default
    },

    //route pemesanan pembelian
    {
        path: '/pesanPembelian',
        component: require('./components/pembelian/pemesananPembelian/pemesananPembelian.vue').default
    }, {
        path: '/konfirmasiPembelian',
        component: require('./components/pembelian/pemesananPembelian/konfirmasiPembelian.vue').default
    }, {
        path: '/diterimaPembelian',
        component: require('./components/pembelian/pemesananPembelian/diterimaPembelian.vue').default
    }, {
        path: '/batalPembelian',
        component: require('./components/pembelian/pemesananPembelian/batalPembelian.vue').default
    },

    //route penerimaan barang
    {
        path: '/penerimaanBarang',
        component: require('./components/pembelian/penerimaanBarang/penerimaanBarang.vue').default
    }, {
        path: '/konfirmasiPenerimaan',
        component: require('./components/pembelian/penerimaanBarang/konfirmasipenerimaanBarang.vue').default
    }, {
        path: '/returnPenerimaan',
        component: require('./components/pembelian/penerimaanBarang/returnPenerimaanBarang.vue').default
    }, {
        path: '/konfirmasiReturnPenerimaan',
        component: require('./components/pembelian/penerimaanBarang/konfirmasiReturnPenerimaanBarang.vue').default
    },

    //route pemesanan penjualan 
    {
        path: '/pesanPenjualan',
        component: require('./components/penjualan/pemesananPenjualan/pemesananPenjualan.vue').default
    }, {
        path: '/konfirmasiPenjualan',
        component: require('./components/penjualan/pemesananPenjualan/konfirmasiPenjualan.vue').default
    }, {
        path: '/dikirimPenjualan',
        component: require('./components/penjualan/pemesananPenjualan/dikirimPenjualan.vue').default
    }, {
        path: '/batalPenjualan',
        component: require('./components/penjualan/pemesananPenjualan/batalPenjualan.vue').default
    },

    //route surat jalan
    {
        path: '/suratJalan',
        component: require('./components/penjualan/suratJalan/suratJalan.vue').default
    }, {
        path: '/konfirmasiSuratJalan',
        component: require('./components/penjualan/suratJalan/konfirmasiSuratJalan.vue').default
    }, {
        path: '/returnSuratJalan',
        component: require('./components/penjualan/suratJalan/returnSuratJalan.vue').default
    }, {
        path: '/konfirmasiReturnSuratJalan',
        component: require('./components/penjualan/suratJalan/konfirmasiReturnSuratJalan.vue').default
    },

    //route penjualan langsung
    {
        path: '/penjualanLangsung',
        component: require('./components/penjualan/penjualanLangsung/penjualanLangsung.vue').default
    }, {
        path: '/returnPenjualanLangsung',
        component: require('./components/penjualan/penjualanLangsung/returnPenjualanLangsung.vue').default
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
