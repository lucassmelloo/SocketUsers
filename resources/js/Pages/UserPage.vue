<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrincipalContainerVue from '@/Components/PrincipalContainer.vue';
import UserForm from '@/Components/UserForm.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template lang="">
    <Head title="User"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>
        <PrincipalContainerVue>
            <UserForm :incomingUser="incomingUser"></UserForm>
        </PrincipalContainerVue>
    </AuthenticatedLayout>
</template>
<script>
export default {
    props:{
        incomingUser: {
            name:'',
            email:'',
            is_active:''
        }
    },
}
</script>
<style lang="">
    
</style>