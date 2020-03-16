<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Upload File</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div v-if="nama_file !== 0" class="card">
                        <div class="card-header">
                            <span v-if="display_file !== 0"> {{ display_file}}</span>
                        </div>
                        <div class="card-body">
                            <input type="file" @change="imageChanged">
                            <button v-on:click="submit" class="btn btn-primary ml-auto"><i class="fe fe-save"></i> Save</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Scan</th>
                            <th>Upload</th>
                            <th>Nama File</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in datasubmit">
                            <td>{{ value.display}}</td>
                            <td>
                                <button v-on:click="click(value.name, value.display)" class="btn btn-info"><i
                                    class="fe fe-upload"></i>Upload
                                </button>
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
        name: "ket_raport",
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nama_file: 0,
                file: null,
                display_file: 0,
                table: 'pendaftar_foto',
                url: 'ajax/submitData/ket_foto',
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
            click(name, display) {
                this.nama_file = name;
                this.display_file = display;
            },
            imageChanged(e) {
                this.file = e.target.files[0];
            },
            submit() {
                const fd = new FormData();
                fd.append('name', this.nama_file);
                fd.append('display', this.display_file);
                fd.append('file', this.file);
                fd.append('_token', this.csrf);
                axios.post(this.url, fd).then(response => {
                    this.success = response.data.status;
                    console.log(this.success);
                    if (this.success === true) {
                        //success
                        this.$swal({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data telah disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.load();
                    }
                });
            }
        }

    }
</script>

<style scoped>

</style>
