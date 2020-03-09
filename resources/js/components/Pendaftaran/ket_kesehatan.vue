<template>
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Keterangan Kesehatan</p>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="username"><strong>Golongan Darah</strong></label><input
                            type="text" class="form-control" v-model="datasubmit.golongan_darah" placeholder="Golongan Darah"/></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="first_name"><strong>Riwayat Penyakit</strong></label><input
                            type="text" class="form-control" v-model="datasubmit.riwayat_penyakit" placeholder="Riwayat Penyakit"/>
                        </div>
                        <div class="form-group"><label for="first_name"><strong>Kelainan Jasmani</strong></label><input
                            type="text" class="form-control" placeholder="Kelainan Jasmani" v-model="datasubmit.kelainan_jasmani"/>
                        </div>
                        <div class="form-group"><label for="first_name"><strong>Tinggi Badan</strong></label><input
                            type="text" class="form-control" v-model="datasubmit.tinggi_badan" placeholder="Tinggi Badan"
                            inputmode="numeric"/></div>
                        <div class="form-group"><label for="first_name"><strong>Berat Badan</strong><br/></label><input
                            type="text" class="form-control" v-model="datasubmit.berat_badan" inputmode="numeric"
                            placeholder="Berat Badan"/></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Send data</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ket_kesehatan",
        data() {
            return {
                table: 'pendaftar_kesehatan',
                url: 'ajax/submitData/ket_kesehatan',
                datasubmit: {
                    golongan_darah: '',
                    riwayat_penyakit: '',
                    kelainan_jasmani: '',
                    tinggi_badan: '',
                    berat_badan: '',

                }
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = {
                    golongan_darah: '',
                    riwayat_penyakit: '',
                    kelainan_jasmani: '',
                    tinggi_badan: '',
                    berat_badan: '',

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
