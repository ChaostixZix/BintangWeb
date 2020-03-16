<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Daftar Ulang
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-1 mb-4">
                <router-link :to="{ name: 'ket_data_siswa' }" class="btn btn-block btn-primary mb-6">
                    <i class="fe fe-edit mr-2"></i>Daftar Ulang
                </router-link>
                <div class="list-group list-group-transparent mb-0">
                    <a class="list-group-item list-group-item-action active"><span
                        class="icon mr-3"><i class="fe fe-flag"></i></span>Introduction</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <h2 class="mt-0 mb-4">Selamat Datang Di Daftar Ulang Thawalib</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lacinia lectus
                                vitae nisi tincidunt posuere. Morbi condimentum dictum vestibulum. Maecenas a odio
                                id enim semper commodo. Sed id magna elit. . </p>
                            <h3 id="setup-environment">Pendaftaran Ulang</h3>
                            <p>Untuk peserta yang sudah diterima, harap melakukan daftar ulang dengan mengikuti step
                                berikut:</p>
                            <ol>
                                <li>Seluruh data di isi dengan teliti, lengkap dan benar.</li>
                                <li>Scan data yang dibutuhkan dalam pendaftaran ulang..
                                    <p><strong>Untuk yang tidak memiliki scan data boleh menggunakan aplikasi
                                        scanner di Android/Ios
                                    </strong> (Tidak boleh memfoto data)
                                    </p></li>
                                <li>Untuk upload foto harap menggunakan Pas Foto. Tidak boleh menggunakan foto
                                    biasa.
                                </li>
                                <li>Data yang disubmit dan di finalisasi tidak bisa diganti.Mengisilah dengan hati
                                    hati.
                                </li>
                                <li>Setelah data lengkap dan benar silahkan cetak kartu pendaftaran ulang dan
                                    serahkan ke Tata Usaha.
                                </li>


                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "dashboard"
    }
</script>

<style scoped>

</style>
