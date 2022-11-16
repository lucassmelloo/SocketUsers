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
        <FilterTable @atualizeUserList="atualizeUserList">
            <UsersTableVue :columns="columns" :objectList="users"></UsersTableVue>
        </FilterTable>
    </AuthenticatedLayout>
</template>

<script>
export default {

    components: { FilterTable },

    props: {
        userList: {}
    },

    data() {
        return {
            users: {},
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

    methods: {

        atualizeUserList(users){
            this.users = users;
        },

        callUserPage(user){
            
        }
        
    },

    mounted() {

        this.atualizeUserList(this.userList);

    },
}
</script>
<style lang="">
    
</style>