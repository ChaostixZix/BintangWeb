<template>
    <section>
        <div class="tableFilters">
            <input class="input" type="text" v-model="tableData.search" placeholder="Search Table"
                   @change="getTable()">
        </div>
        <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
            <tbody>
            <tr v-for="p in siswa">
                <td>{{ p.nisn }}</td>
                <td>{{ p.nama_lengkap }}</td>
                <td>
                    <button v-if="p.selesai === 1" class="btn btn-success" disabled>Selesai</button>
                    <button v-if="p.selesai === 0" class="btn btn-secondary" disabled>Verifikasi</button>
                </td>
                <td>
                    <button v-if="p.selesai === 0" v-on:click="selesai(p.nisn)" class="btn btn-info">
                        <i class="fe fe-check"> </i>Selesai
                    </button>
                    <a :href="'dataExport/' + p.nisn" class="btn btn-secondary">
                        <i class="fe fe-download"></i> Data
                    </a>
                    <a :href="'raportExport/' + p.nisn" class="btn btn-secondary">
                        <i class="fe fe-download"></i> Raport
                    </a>
                    <router-link :to="{ name: 'detail_siswa', params: { nisn: p.nisn } }" class="btn btn-primary">
                        Detail
                    </router-link>
                </td>
            </tr>
            </tbody>
        </datatable>
        <div class="col-12">
            <pagination :pagination="pagination"
                        @prev="getTable(pagination.prevPageUrl)"
                        @next="getTable(pagination.nextPageUrl)">
            </pagination>
        </div>
    </section>
</template>

<script>
    import table from "./table";
    import pagination from "./pagination";

    export default {
        name: "keluargatable",
        props: ['isKepalaExist'],
        components: {datatable: table, pagination: pagination},
        data() {
            let sortOrders = {};
            let columns = [
                {label: 'NISN', name: 'nisn'},
                {label: 'Nama Lengkap', name: 'nama_lengkap'},
                {label: 'Status'},
                {label: 'Aksi'},
            ];
            columns.forEach((column) => {
                sortOrders[column.name] = -1;
            });
            return {
                siswa: [],
                columns: columns,
                sortKey: 'id',
                sortOrders: sortOrders,
                perPage: ['10', '20', '30'],
                tableData: {
                    draw: 0,
                    length: 10,
                    search: '',
                    column: 0,
                    dir: 'desc',
                },
                pagination: {
                    lastPage: '',
                    currentPage: '',
                    total: '',
                    lastPageUrl: '',
                    nextPageUrl: '',
                    prevPageUrl: '',
                    from: '',
                    to: ''
                },
            }
        },
        created() {
            this.getTable();
        },
        methods: {
            selesai(nisn)
            {
                axios.get('ajax/selesai/' + nisn).then(response => {
                    this.success = response.data.status;
                    if (this.success === true) {
                        this.$swal({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Selesai',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.getTable();
                    }
                });
            },
            getTable(url = 'ajax/getAllSiswa') {
                this.tableData.draw++;
                axios.get(url, {params: this.tableData})
                    .then(response => {
                        let data = response.data;

                        this.siswa = data.data.data;
                        console.log(data.data.next_page_url);
                        this.configPagination(data.data);

                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },
            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.lastPageUrl = data.last_page_url;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
            },
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, 'name', key);
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
                this.getTable();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },
        }
    }
</script>
