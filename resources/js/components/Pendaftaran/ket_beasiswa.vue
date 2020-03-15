<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Prestasi</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <button v-on:click="tambahBeasiswa" class="btn btn-info ml-auto">+ Tambah Beasiswa</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in datasubmit">
                            <td>
                                <input class="form-control"
                                       type="number"
                                       v-model="value.tahun">
                            </td>
                            <td>
                                <input class="form-control"
                                       type="text"
                                       v-model="value.jenis">
                            </td>
                            <td>
                                <input class="form-control"
                                       type="number"
                                       v-model="value.jumlah">
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
        name: "ket_beasiswa",
        data() {
            return {
                table: 'pendaftar_beasiswa',
                url: 'ajax/submitData/ket_beasiswa',
                datasubmit: [],
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = [];
                axios.get('ajax/getDataBeasiswa/').then(res => {
                    if(res.data !== "null")
                    {
                        this.datasubmit = res.data;
                    }
                }).catch((err) => {
                    console.log(err);
                });
            },
            tambahBeasiswa(){
                this.datasubmit.push({
                    tahun: '',
                    jenis: '',
                    jumlah: ''
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
