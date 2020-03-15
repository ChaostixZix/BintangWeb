<template>
    <div class="card">
        <div class="card-header">
            <p class="text-primary m-0 font-weight-bold">Keterangan Data Siswa</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Keterangan Siswa</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Nama Lengkap</strong></label><input
                                                type="text" class="form-control" placeholder="Nama Lengkap"
                                                v-model="datasubmit.nama_lengkap"/></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                for="first_name"><strong>Nik</strong><br/></label><input type="text"
                                                                                                         class="form-control"
                                                                                                         placeholder="Nik"
                                                                                                         v-model="datasubmit.nik"
                                                                                                         inputmode="numeric"/>
                                            </div>
                                            <div class="form-group"><label for="first_name"><strong>Tempat, Tanggal
                                                Lahir</strong><br/></label><input type="text" class="form-control"
                                                                                  placeholder="Ttl"
                                                                                  v-model="datasubmit.ttl"
                                                                                  /></div>
                                            <div class="form-group"><label for="first_name"><strong>Jenis
                                                Kelamin</strong></label><select class="custom-select"
                                                                                v-model="datasubmit.jenis_kelamin">
                                                <option value="l">Laki - Laki</option>
                                                <option value="l">Perempuan</option>
                                            </select></div>
                                            <div class="form-group"><label
                                                for="first_name"><strong>Agama</strong></label><select
                                                class="custom-select" v-model="datasubmit.agama">
                                                <option value="islam" selected>Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katholik">Katholik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                            </select></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label
                                        for="first_name"><strong>Kewarganegaraan</strong><br/></label><input type="text"
                                                                                                             class="form-control"
                                                                                                             placeholder="Kewarganegaraan"
                                                                                                             v-model="datasubmit.kewarganegaraan"
                                                                                                             inputmode="numeric"/>
                                    </div>
                                    <div class="form-group"><label for="first_name"><strong>Anak
                                        Ke</strong><br/></label><input type="text" class="form-control"
                                                                       placeholder="Anak Ke"
                                                                       v-model="datasubmit.anak_ke"
                                                                       inputmode="numeric"/></div>
                                    <div class="form-group"><label for="first_name"><strong>Jumlah Saudara</strong><br/></label><input
                                        type="text" class="form-control" placeholder="Jumlah Saudara"
                                        v-model="datasubmit.jumlah_saudara" inputmode="numeric"/></div>
                                    <div class="form-group"><label for="first_name"><strong>Status
                                        Ortu</strong><br/></label><select class="custom-select"
                                                                          v-model="datasubmit.status_ortu">
                                        <option value="yatim" selected>Yatim</option>
                                        <option value="piatu">Piatu</option>
                                        <option value="yatim-piatu">Yatim-Piatu</option>
                                        <option value="ada" selected>Ada</option>
                                    </select></div>
                                    <div
                                        class="form-group"><label for="first_name"><strong>Bahasa Sehari
                                        Hari</strong><br/></label><input type="text" class="form-control"
                                                                         placeholder="Bahasa Nativ"
                                                                         v-model="datasubmit.bahasa_nativ"
                                                                         inputmode="numeric"/></div>
                                    <div class="form-group"><label
                                        for="first_name"><strong>Hobi</strong><br/></label><input type="text"
                                                                                                  class="form-control"
                                                                                                  placeholder="Hobi"
                                                                                                  v-model="datasubmit.hobi"
                                                                                                  inputmode="numeric"/>
                                    </div>
                                    <div class="form-group"><label for="first_name"><strong>Cita -
                                        Cita</strong><br/></label><input type="text" class="form-control"
                                                                         placeholder="Cita-Cita"
                                                                         v-model="datasubmit.cita_cita"
                                                                         inputmode="numeric"/></div>
                                    <div class="form-group"><label for="first_name"><strong>No. Kartu
                                        Keluarga</strong><br/></label><input type="text" class="form-control"
                                                                             placeholder="No. Kartu Keluarga"
                                                                             v-model="datasubmit.no_kk"
                                                                             inputmode="numeric"/></div>
                                </div>
                            </div>

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
        name: "ket_data_siswa",
        data() {
            return {
                table: 'pendaftar',
                url: 'ajax/submitData/ket_data_siswa',
                datasubmit: {
                    nama_lengkap: '',
                    nik: '',
                    tempat_lahir: '', //tempat tanggal lahir
                    tanggal_lahir: '', //tempat tanggal lahir
                    jenis_kelamin: '',
                    agama: '',
                    kewarganegaraan: '',
                    anak_ke: '',
                    jumlah_saudara: '',
                    status_ortu: '', // yatim: '', piatu: '', yatim piatu
                    bahasa_nativ: '',
                    hobi: '',
                    cita_cita: '',
                    no_kk: '',

                }
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.datasubmit = {
                    nama_lengkap: '',
                    nik: '',
                    tempat_lahir: '', //tempat tanggal lahir
                    tanggal_lahir: '', //tempat tanggal lahir
                    jenis_kelamin: '',
                    agama: '',
                    kewarganegaraan: '',
                    anak_ke: '',
                    jumlah_saudara: '',
                    status_ortu: '', // yatim: '', piatu: '', yatim piatu
                    bahasa_nativ: '',
                    hobi: '',
                    cita_cita: '',
                    no_kk: '',

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
                        this.$swal({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data telah disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }).catch(error => {
                    console.log(error.response);
                    this.$swal({
                        position: 'top-end',
                        icon: 'danger',
                        title: 'Gagal',
                        showConfirmButton: false,
                        timer: 1500
                    })
                });
            }
        }

    }
</script>

<style scoped>

</style>
