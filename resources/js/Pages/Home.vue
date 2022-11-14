<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersTableVue from '@/Components/UsersTable.vue';
import { Head } from '@inertiajs/inertia-vue3';
import FilterTable from '@/Components/FilterTable.vue';
</script>

<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User List
            </h2>
        </template>
        <FilterTable>
            <UsersTableVue :columns="columns" :objectList="userList"></UsersTableVue>
        </FilterTable>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: {
        userList: {}
    },
    data() {
        return {
            columns: [
                "ID",
                "Status",
                "Name",
                "Email",
                "Created at",
                "Actions"
            ]
        };
    },
    components: { FilterTable }
}
</script>
<style lang="">
    
</style>