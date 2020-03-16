<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Upload File</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Scan</th>
                            <th>Aksi</th>
                            <th>Nama File</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in datasubmit">
                            <td>{{ value.display}}</td>
                            <td>
                                <a class="btn btn-secondary" :href="data[value.name]" target="_blank"><i
                                    class="fe fe-download"></i>Download
                                </a>
                            </td>
                            <td>{{ data[value.name]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "detail_foto",
        data() {
            return {
                table: 'pendaftar_foto',
                datasubmit: [
                    {
                        name: 'pas_foto',
                        display: 'Pas Foto',
                        value: '',

                    }, {
                        name: 'scan_ijazah',
                        display: 'Scan Ijazah SD/MI',
                        value: '',

                    }, {
                        name: 'scan_skhun',
                        display: 'Scan SKHUN SD/MI',
                        value: '',

                    }, {
                        name: 'pas_foto_ayah',
                        display: 'Pas Foto Ayah',
                        value: '',

                    }, {
                        name: 'scan_ktp_ayah',
                        display: 'Scan KTP Ayah',
                        value: '',

                    }, {
                        name: 'pas_foto_ibu',
                        display: 'Pas Foto Ibu',
                        value: '',

                    }, {
                        name: 'scan_ktp_ibu',
                        display: 'Scan KTP Ibu',
                        value: '',

                    }, {
                        name: 'pas_foto_wali',
                        display: 'Pas Foto Wali',
                        value: '',

                    }, {
                        name: 'scan_ktp_wali',
                        display: 'Scan KTP Wali',
                        value: '',

                    }, {
                        name: 'scan_kk',
                        display: 'Scan Kartu Keluarga',
                        value: '',

                    }, {
                        name: 'scan_akta',
                        display: 'Scan Akta Kelahiran',
                        value: '',

                    },
                ],
                data: {}
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                axios.get('ajax/getDataByTable/' + this.table).then(res => {
                    this.data = res.data;
                }).catch((err) => {
                    console.log(err);
                });
            },
        }

    }
</script>

<style scoped>

</style>
