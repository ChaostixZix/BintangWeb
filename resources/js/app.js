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

Vue.use(VueRouter,VueAxios,Axios);
Vue.use(VueSweetalert2);


// membuat router
const routes = [
    {
        name: 'dashboard',
        path: '/dashboad',
        component: dashboard
    },{
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


