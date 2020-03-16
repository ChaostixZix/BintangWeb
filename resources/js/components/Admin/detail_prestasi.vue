<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Prestasi</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
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
                                {{value.tingkat}}
                            </td>
                            <td>
                                {{value.bidang}}
                            </td>
                            <td>
                                {{value.juara}}
                            </td>
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
        name: "detail_prestasi",
        data() {
            return {
                table: 'pendaftar_prestasi',
                datasubmit: [],
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = [];
                axios.get('ajax/getDataPrestasiByNisn/' + this.$route.params.nisn).then(res => {
                    if(res.data !== "null")
                    {
                        this.datasubmit = res.data;
                    }
                }).catch((err) => {
                    console.log(err);
                });
            }
        }

    }
</script>

<style scoped>

</style>
