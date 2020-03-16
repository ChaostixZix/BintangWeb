<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Ibu</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="first_name"><strong>Nama Lengkap</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.nama_lengkap_ibu"></div>
                            <div class="form-group"><label for="first_name"><strong>NIK</strong></label><input
                                class="form-control" type="number" placeholder="NIK" v-model="datasubmit.nik_ibu"
                                inputmode="numeric">
                            </div>
                            <div class="form-group"><label
                                for="first_name"><strong>Tempat Lahir</strong></label><input class="form-control"
                                                                                             type="text"
                                                                                             v-model="datasubmit.tempat_lahir_ibu">
                            </div>
                            <div class="form-group"><label for="first_name"><strong>Tanggal Lahir</strong></label><input
                                class="form-control" type="text"
                                v-model="datasubmit.tanggal_lahir_ibu"></div>
                            <div class="form-group"><label
                                for="first_name"><strong>Agama</strong></label><select
                                class="custom-select" v-model="datasubmit.agama_ibu">
                                <option value="islam" selected>Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                            </select></div>
                            <div class="form-group"><label for="first_name"><strong>Pendidikan Terakhir</strong></label><input class="form-control" type="number"
                                                                                                                               v-model="datasubmit.pendidikan_terakhir_ibu"></div>
                            <div class="form-group"><label for="first_name"><strong>Pekerjaan</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.pekerjaan_ibu"></div>
                            <div class="form-group"><label for="first_name"><strong>Penghasilan Per Bulan
                                US</strong></label><input class="form-control" type="text"
                                                          v-model="datasubmit.penghasilan_ibu"
                                                          inputmode="numeric"></div>
                            <div class="form-group"><label for="first_name"><strong>Alamat</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.alamat_ibu"></div>
                            <div class="form-group"><label for="first_name"><strong>No. HP</strong></label><input
                                class="form-control" type="number" v-model="datasubmit.no_hp_ibu"></div>
                            <div class="form-group"><label
                                for="first_name"><strong>Status</strong></label><select
                                class="custom-select" v-model="datasubmit.status_ibu">
                                <option value="islam" selected>Ada</option>
                                <option value="kristen">Meninggal</option>
                            </select></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                <button v-on:click="submit" class="btn btn-primary ml-auto">Send data</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ket_ibu",
        data() {
            return {
                table: 'pendaftar_ibu',
                url: 'ajax/submitData/ket_ibu',
                datasubmit: {
                    nama_lengkap_ibu: '',
                    nik_ibu: '',
                    tempat_lahir_ibu: '',
                    tanggal_lahir_ibu: '',
                    agama_ibu: '',
                    pendidikan_terakhir_ibu: '',
                    pekerjaan_ibu: '',
                    penghasilan_ibu: '',
                    alamat_ibu: '',
                    no_hp_ibu: '',
                    status_ibu: '',

                }
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = {
                    nama_lengkap_ibu: '',
                    nik_ibu: '',
                    tempat_lahir_ibu: '',
                    tanggal_lahir_ibu: '',
                    agama_ibu: '',
                    pendidikan_terakhir_ibu: '',
                    pekerjaan_ibu: '',
                    penghasilan_ibu: '',
                    alamat_ibu: '',
                    no_hp_ibu: '',
                    status_ibu: '',

                };
                axios.get('ajax/getDataByTable/' + this.table).then(res => {
                    this.datasubmit = res.data;
                }).catch((err) => {
                    console.log(err);
                });
            }, submit() {
                axios.get(this.url, {params: this.datasubmit}).then(response => {
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
                        })
                    }
                });
            }
        }

    }
</script>

<style scoped>

</style>
