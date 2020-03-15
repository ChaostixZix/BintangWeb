<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Daftar Ulang
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-1 mb-4">
                <div class="list-group list-group-transparent mb-0">
                    <router-link :to="{ name: 'ket_data_siswa' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>1. </i></span>Keterangan Data Siswa</router-link>
                    <router-link :to="{ name: 'ket_pendidikan' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>2. </i></span>Keterangan Pendidikan</router-link>
                    <router-link :to="{ name: 'ket_kesehatan' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>3. </i></span>Keterangan Kesehatan</router-link>
                    <router-link :to="{ name: 'ket_ayah' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>4. </i></span>Keterangan Ayah</router-link>
                    <router-link :to="{ name: 'ket_ibu' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>5. </i></span>Keterangan Ibu</router-link>
                    <router-link :to="{ name: 'ket_wali' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>6. </i></span>Keterangan Wali</router-link>
                    <router-link :to="{ name: 'ket_raport' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>7. </i></span>Keterangan Raport</router-link>
                    <router-link :to="{ name: 'ket_prestasi' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>8. </i></span>Keterangan Prestasi</router-link>
                    <router-link :to="{ name: 'ket_beasiswa' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>9. </i></span>Keterangan Beasiswa</router-link>
                    <router-link :to="{ name: 'ket_foto' }" class="list-group-item list-group-item-action"><span
                        class="icon mr-3"><i>10. </i></span>Upload File</router-link>
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
        name: "pendaftaran_nav"
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
