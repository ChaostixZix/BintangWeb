<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Pendidikan</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="username"><strong>Kelas
                                Sebelumnya</strong></label><input class="form-control" type="text"
                                                                  v-model="datasubmit.kelas_sebelumnya"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><label for="first_name"><strong>Sekolah Asal</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.sekolah_asal"></div>
                            <div class="form-group"><label for="first_name"><strong>Npsn</strong></label><input
                                class="form-control" type="text" placeholder="Npsn" v-model="datasubmit.npsn"
                                inputmode="numeric">
                            </div>
                            <div class="form-group"><label
                                for="first_name"><strong>Kabupaten/Kota</strong></label><input class="form-control"
                                                                                               type="text"
                                                                                               v-model="datasubmit.kabupaten_kota">
                            </div>
                            <div class="form-group"><label for="first_name"><strong>No. Seri
                                Ijazah</strong></label><input class="form-control" type="text"
                                                              v-model="datasubmit.no_seri_ijazah"
                                                              inputmode="numeric"></div>
                            <div class="form-group"><label for="first_name"><strong>Tanggal
                                Ijazah</strong></label><input class="form-control" type="text"
                                                              v-model="datasubmit.tanggal_ijazah"
                                                              inputmode="numeric"></div>
                            <div class="form-group"><label for="first_name"><strong>No. Seri
                                SKHUN</strong></label><input class="form-control" type="text"
                                                             v-model="datasubmit.no_seri_skhun"
                                                             inputmode="numeric"></div>
                            <div class="form-group"><label for="first_name"><strong>Tanggal SKHUN</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.tanggal_skhun"></div>
                            <div class="form-group"><label for="first_name"><strong>No. Peserta
                                US</strong></label><input class="form-control" type="text"
                                                          v-model="datasubmit.no_peserta_us"
                                                          inputmode="numeric"></div>
                            <div class="form-group"><label for="first_name"><strong>Lama Belajar</strong></label><input
                                class="form-control" type="text" v-model="datasubmit.lama_belajar"></div>
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
        name: "ket_pendidikan",
        data() {
            return {
                table: 'pendaftar_pendidikan',
                url: 'ajax/submitData/ket_pendidikan',
                datasubmit: {
                    kelas_sebelumnya: '',
                    sekolah_asal: '',
                    npsn: '',
                    kabupaten_kota: '',
                    no_seri_ijazah: '',
                    tanggal_ijazah: '',
                    no_seri_skhun: '',
                    tanggal_skhun: '',
                    no_peserta_us: '',
                    lama_belajar: '',

                }
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = {
                    kelas_sebelumnya: '',
                    sekolah_asal: '',
                    npsn: '',
                    kabupaten_kota: '',
                    no_seri_ijazah: '',
                    tanggal_ijazah: '',
                    no_seri_skhun: '',
                    tanggal_skhun: '',
                    no_peserta_us: '',
                    lama_belajar: '',

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
