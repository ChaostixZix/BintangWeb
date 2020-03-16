<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Prestasi</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <button v-on:click="tambahPrestasi" class="btn btn-info ml-auto">+ Tambah Prestasi</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Bidang</th>
                            <th>Juara</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in datasubmit">
                            <td>
                                <select class="form-control"
                                        v-model="value.tingkat">
                                    <option>Desa</option>
                                    <option>Kabupaten</option>
                                    <option>Provinsi</option>
                                    <option>Nasional</option>
                                </select>
                            </td>
                            <td>
                                <input class="form-control"
                                       type="text"
                                       v-model="value.bidang">
                            </td>
                            <td>
                                <select class="form-control"
                                        v-model="value.juara">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
        name: "ket_prestasi",
        data() {
            return {
                table: 'pendaftar_prestasi',
                url: 'ajax/submitData/ket_prestasi',
                datasubmit: [],
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = [];
                axios.get('ajax/getDataPrestasi/').then(res => {
                    if(res.data !== "null")
                    {
                        this.datasubmit = res.data;
                    }
                }).catch((err) => {
                    console.log(err);
                });
            },
            tambahPrestasi(){
                this.datasubmit.push({
                    tingkat: '',
                    juara: '',
                    bidang: ''
                });
            },
            submit() {
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
