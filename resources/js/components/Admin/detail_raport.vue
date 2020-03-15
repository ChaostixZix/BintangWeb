<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Raport <span v-if="semester !== 0">Semester {{semester}}</span></p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group"><label
                        for="first_name"><strong>Semester</strong></label><select
                        class="custom-select" v-on:change="changeSemester" v-model="semester">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                    </select></div>
                    <table v-for="s in semesters" v-if="semester === s" class="table">
                        <thead>
                        <tr>
                            <th>Pelajaran</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(value, index) in datasubmit">
                            <td>{{ value.display}}</td>
                            <td>
                                {{value.value}}
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
        name: "detail_raport",
        data() {
            return {
                table: 'pendaftar_raport',
                semester: 0,
                semesters : ["1","2","3","4","5"],
                datasubmit: [
                    {
                        name: 'hadits',
                        display: 'Al QUran Hadits',
                        value: '',
                    }, {
                        name: 'akidah',
                        display: 'Akidah Aklhak',
                        value: '',
                    }, {
                        name: 'fiqih',
                        display: 'Fiqih',
                        value: '',
                    }, {
                        name: 'sejarah',
                        display: 'Sejarah Kebudayaan Islam',
                        value: '',
                    }, {
                        name: 'pkn',
                        display: 'PPKN',
                        value: '',
                    }, {
                        name: 'bindo',
                        display: 'Bahasa Indonesia',
                        value: '',
                    }, {
                        name: 'barab',
                        display: 'Bahasa Arab',
                        value: '',
                    }, {
                        name: 'binggris',
                        display: 'Bahasa Inggris',
                        value: '',
                    }, {
                        name: 'matematika',
                        display: 'Matematika',
                        value: '',
                    }, {
                        name: 'ipa',
                        display: 'IPA',
                        value: '',
                    }, {
                        name: 'ips',
                        display: 'IPS',
                        value: '',
                    }, {
                        name: 'sbk',
                        display: 'SBK',
                        value: '',
                    }, {
                        name: 'pjok',
                        display: 'Pendidikan Jasmani dan Kesehatan',
                        value: '',
                    }, {
                        name: 'prakarya',
                        display: 'Prakarya',
                        value: '',
                    }, {
                        name: 'tahfiz',
                        display: 'Tahfiz',
                        value: '',
                    },
                ],
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            changeSemester()
            {
                axios.get('ajax/getDataRaportByNisn/'+ this.$route.params.nisn + '/' + this.semester).then(res => {
                    if(res.data === "null")
                    {
                        this.datasubmit = [
                            {
                                name: 'hadits',
                                display: 'Al QUran Hadits',
                                value: '',
                            }, {
                                name: 'akidah',
                                display: 'Akidah Aklhak',
                                value: '',
                            }, {
                                name: 'fiqih',
                                display: 'Fiqih',
                                value: '',
                            }, {
                                name: 'sejarah',
                                display: 'Sejarah Kebudayaan Islam',
                                value: '',
                            }, {
                                name: 'pkn',
                                display: 'PPKN',
                                value: '',
                            }, {
                                name: 'bindo',
                                display: 'Bahasa Indonesia',
                                value: '',
                            }, {
                                name: 'barab',
                                display: 'Bahasa Arab',
                                value: '',
                            }, {
                                name: 'binggris',
                                display: 'Bahasa Inggris',
                                value: '',
                            }, {
                                name: 'matematika',
                                display: 'Matematika',
                                value: '',
                            }, {
                                name: 'ipa',
                                display: 'IPA',
                                value: '',
                            }, {
                                name: 'ips',
                                display: 'IPS',
                                value: '',
                            }, {
                                name: 'sbk',
                                display: 'SBK',
                                value: '',
                            }, {
                                name: 'pjok',
                                display: 'Pendidikan Jasmani dan Kesehatan',
                                value: '',
                            }, {
                                name: 'prakarya',
                                display: 'Prakarya',
                                value: '',
                            }, {
                                name: 'tahfiz',
                                display: 'Tahfiz',
                                value: '',
                            },
                        ];
                    }else{
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
