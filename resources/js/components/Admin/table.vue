<template>
    <table class="table table-striped dataex-html5-selectors">
        <thead>
        <tr>
            <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)"
                :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
            >
                {{column.label}}
            </th>
        </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
    export default {
        props: ['columns', 'sortKey', 'sortOrders']
    }
</script>
