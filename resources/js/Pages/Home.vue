<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersTableVue from '@/Components/UsersTable.vue';
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
        <FilterTable 
            @atualizeUserList="atualizeUserList" 
            @callUserPage="callUserPage">
            <UsersTableVue 
                @callUserPage="callUserPage" 
                :columns="columns" 
                :objectList="users">
            </UsersTableVue>
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
            this.$inertia.visit(route('user-page', user), {method:'get'})
        }
        
    },

    mounted() {

        this.atualizeUserList(this.userList);

    },
}
</script>
<style lang="">
    
</style>