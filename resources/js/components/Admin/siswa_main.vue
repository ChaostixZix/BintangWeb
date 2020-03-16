<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Data Siswa {{ $route.params.nisn }}
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-1 mb-4">
                <div class="list-group list-group-transparent mb-0">
                    <router-link :to="{ name: 'detail_siswa', params: { nisn: $route.params.nisn } }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i class="fe fe-tablet"></i></span>Database Siswa</router-link>
                    <router-link :to="{ name: 'detail_raport', params: { nisn: $route.params.nisn } }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i class="fe fe-book-open"></i></span>Raport Siswa</router-link>
                    <router-link :to="{ name: 'detail_prestasi', params: { nisn: $route.params.nisn } }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i class="fe fe-star"></i></span>Prestasi Siswa</router-link>
                    <router-link :to="{ name: 'detail_beasiswa', params: { nisn: $route.params.nisn } }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i class="fe fe-dollar-sign"></i></span>Beasiswa Siswa</router-link>
                    <router-link :to="{ name: 'detail_foto', params: { nisn: $route.params.nisn } }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i class="fe fe-paperclip"></i></span>Foto Siswa</router-link>
                </div>
            </div>
            <div class="col-lg-9">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "siswa_main"
    }
</script>

<style scoped>
    .router-link-active {
        background:
            rgba(70, 127, 207, 0.06);
        font-weight: 600;
    }
    .router-link-active {
        z-index: 2;
        color:
            #467fcf;
        background-color: #f8fafd;
        border-color: rgba(0, 40, 100, 0.12);
    }
</style>
