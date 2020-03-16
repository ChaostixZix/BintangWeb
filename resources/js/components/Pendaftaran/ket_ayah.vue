<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Ayah</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="first_name"><strong>Nama Lengkap</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.nama_lengkap_ayah"></div>
                            <div class="form-group"><label for="first_name"><strong>NIK</strong></label><input
                                class="form-control" type="number" placeholder="NIK" v-model="datasubmit.nik_ayah"
                                inputmode="numeric">
                            </div>
                            <div class="form-group"><label
                                for="first_name"><strong>Tempat Lahir</strong></label><input class="form-control"
                                                                                             type="text"
                                                                                             v-model="datasubmit.tempat_lahir_ayah">
                            </div>
                            <div class="form-group"><label for="first_name"><strong>Tanggal Lahir</strong></label><input
                                class="form-control" type="text"
                                v-model="datasubmit.tanggal_lahir_ayah"></div>
                            <div class="form-group"><label
                                for="first_name"><strong>Agama</strong></label><select
                                class="custom-select" v-model="datasubmit.agama_ayah">
                                <option value="islam" selected>Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                            </select></div>
                            <div class="form-group"><label for="first_name"><strong>Pendidikan Terakhir</strong></label><input class="form-control" type="number"
                                                             v-model="datasubmit.pendidikan_terakhir_ayah"></div>
                            <div class="form-group"><label for="first_name"><strong>Pekerjaan</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.pekerjaan_ayah"></div>
                            <div class="form-group"><label for="first_name"><strong>Penghasilan Per Bulan
                                US</strong></label><input class="form-control" type="text"
                                                          v-model="datasubmit.penghasilan_ayah"
                                                          inputmode="numeric_ayah"></div>
                            <div class="form-group"><label for="first_name"><strong>Alamat</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.alamat_ayah"></div>
                            <div class="form-group"><label for="first_name"><strong>No. HP</strong></label><input
                                class="form-control" type="number" v-model="datasubmit.no_hp_ayah"></div>
                            <div class="form-group"><label
                                for="first_name"><strong>Status</strong></label><select
                                class="custom-select" v-model="datasubmit.status_ayah">
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
        name: "ket_ayah",
        data() {
            return {
                table: 'pendaftar_ayah',
                url: 'ajax/submitData/ket_ayah',
                datasubmit: {
                    nama_lengkap_ayah: '',
                    nik_ayah: '',
                    tempat_lahir_ayah: '',
                    tanggal_lahir_ayah: '',
                    agama_ayah: '',
                    pendidikan_terakhir_ayah: '',
                    pekerjaan_ayah: '',
                    penghasilan_ayah: '',
                    alamat_ayah: '',
                    no_hp_ayah: '',
                    status_ayah: '',

                }
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = {
                    nama_lengkap_ayah: '',
                    nik_ayah: '',
                    tempat_lahir_ayah: '',
                    tanggal_lahir_ayah: '',
                    agama_ayah: '',
                    pendidikan_terakhir_ayah: '',
                    pekerjaan_ayah: '',
                    penghasilan_ayah: '',
                    alamat_ayah: '',
                    no_hp_ayah: '',
                    status_ayah: '',

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
