<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UsersTableVue from '@/Components/UsersTable.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Home" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User List
            </h2>
        </template>
        <UsersTableVue :userList="userList"></UsersTableVue>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props:{
        userList:[]
    },

    data(){

    }
}
</script>
<style lang="">
    
</style>