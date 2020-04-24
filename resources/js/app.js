import dashboard from "./components/dashboard";
import VueSweetalert2 from "vue-sweetalert2";

require('./bootstrap');
import 'sweetalert2/dist/sweetalert2.min.css';

window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import pendaftaran_main from "./components/Pendaftaran/pendaftaran_main";
import ket_data_siswa from "./components/Pendaftaran/ket_data_siswa";
import ket_pendidikan from "./components/Pendaftaran/ket_pendidikan";
import ket_kesehatan from "./components/Pendaftaran/ket_kesehatan";
import ket_ayah from "./components/Pendaftaran/ket_ayah";
import ket_ibu from "./components/Pendaftaran/ket_ibu";
import ket_wali from "./components/Pendaftaran/ket_wali";
import ket_raport from "./components/Pendaftaran/ket_raport";
import ket_prestasi from "./components/Pendaftaran/ket_prestasi";
import ket_beasiswa from "./components/Pendaftaran/ket_beasiswa";
import siswa_table from "./components/Admin/siswa_table";
import detail_siswa from "./components/Admin/detail_siswa";
import detail_raport from "./components/Admin/detail_raport";
import siswa_main from "./components/Admin/siswa_main";
import detail_prestasi from "./components/Admin/detail_prestasi";
import detail_beasiswa from "./components/Admin/detail_beasiswa";
import ket_foto from "./components/Pendaftaran/ket_foto";
import detail_foto from "./components/Admin/detail_foto";

Vue.use(VueRouter, VueAxios, Axios);
Vue.use(VueSweetalert2);


// membuat router
const routes = [
    {
        name: 'dashboard',
        path: '/dashboad',
        component: dashboard
    }, {
        name: 'daftar',
        path: '/daftar',
        component: pendaftaran_main,
        children: [
            {
                name: 'ket_data_siswa',
                path: 'datasiswa',
                component: ket_data_siswa,
            }, {
                name: 'ket_pendidikan',
                path: 'pendidikan',
                component: ket_pendidikan,
            }, {
                name: 'ket_kesehatan',
                path: 'kesehatan',
                component: ket_kesehatan,
            }, {
                name: 'ket_ayah',
                path: 'ayah',
                component: ket_ayah,
            }, {
                name: 'ket_ibu',
                path: 'ibu',
                component: ket_ibu,
            }, {
                name: 'ket_wali',
                path: 'wali',
                component: ket_wali,
            }, {
                name: 'ket_raport',
                path: 'raport',
                component: ket_raport,
            }, {
                name: 'ket_prestasi',
                path: 'prestasi',
                component: ket_prestasi,
            }, {
                name: 'ket_beasiswa',
                path: 'beasiswa',
                component: ket_beasiswa,
            }, {
                name: 'ket_foto',
                path: 'foto',
                component: ket_foto,
            }

        ]
    }, {
        name: 'data_siswa',
        path: '/data_siswa',
        component: siswa_table
    }, {
        name: 'siswa',
        path: '/siswa/:nisn',
        component: siswa_main,
        children: [
            {
                name: 'detail_raport',
                path: 'raport/',
                component: detail_raport,
            },{
                name: 'detail_siswa',
                path: 'detail_siswa/',
                component: detail_siswa,
            },{
                name: 'detail_prestasi',
                path: 'detail_prestasi/',
                component: detail_prestasi,
            },{
                name: 'detail_beasiswa',
                path: 'detail_beasiswa/',
                component: detail_beasiswa,
            },{
                name: 'detail_foto',
                path: 'detail_foto/',
                component: detail_foto,
            }
        ]
    }
];

const router = new VueRouter(
    {
        routes: routes
    });

const app = new Vue({
    router
}).$mount('#app');


