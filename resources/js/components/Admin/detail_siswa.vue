<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Database Siswa</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in data">
                            <td>
                                {{index }}
                            </td>
                            <td>
                                {{value}}
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
        name: "detail_siswa",
        data() {
            return {
                data: [],
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = [];
                axios.get('ajax/getAllDataByNisn/' + this.$route.params.nisn ).then(res => {
                    if(res.data !== "null")
                    {
                        this.data = res.data;
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
