<template>
    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
        <ul class="pagination">
            <li class="paginate_button page-item previous" id="DataTables_Table_1_previous">
                <a v-if="pagination.prevPageUrl" @click="$emit('prev');"
                   aria-controls="DataTables_Table_1"
                   data-dt-idx="0"
                   tabindex="0"
                   class="page-link">Previous</a>
                <a v-else :disabled="true"
                   aria-controls="DataTables_Table_1"
                   data-dt-idx="0"
                   tabindex="0"
                   class="page-link">Previous</a>
            </li>
            <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_1" data-dt-idx="1"
                                                            tabindex="0" class="page-link">{{ pagination.currentPage }}</a></li>
            <li class="paginate_button page-item next" id="DataTables_Table_1_previous">
                <a v-if="pagination.nextPageUrl" @click="$emit('next');"
                   aria-controls="DataTables_Table_1"
                   data-dt-idx="0"
                   tabindex="0"
                   class="page-link">Next</a>
                <a v-else :disabled="true"
                   aria-controls="DataTables_Table_1"
                   data-dt-idx="0"
                   tabindex="0"
                   class="page-link">Next</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "pagination",
        props: ['pagination', 'client', 'filtered']
    }
</script>

<style scoped>

</style>
