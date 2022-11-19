<script setup>
import PrincipalContainer from '@/Components/PrincipalContainer.vue';
</script>


<template lang="">
   <PrincipalContainer>
        <form class="flex items-center pb-3" action>   
            <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                    Name
                </label>
                <input v-model="filterName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white" id="name" type="text" placeholder="Name">
            </div>
            <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email">
                    E-mail
                </label>
                <input v-model="filterEmail" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white" id="email" type="text" placeholder="E-mail">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    State
                </label>
                <div class="relative">
                    <select v-model="filterStatus" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="">No one</option>
                        <option value= 1 >Active</option>
                        <option value= 0 >Inactive</option>
                    </select>
                </div>
            </div>
            <div class="w-1/2 mt-6">
                <button @click="searchUsers" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2">
                    Search
                </button>
                <button @click="callUserPage" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                    <strong>New</strong>
                </button>
            </div>
        </form>
        <slot/>
    </PrincipalContainer>
</template>

<script>
import axios from 'axios';

export default {
    
    data(){
        return {
            filterName: '',
            filterEmail: '',
            filterStatus: '',
            userList: {}
        }
    },
    
    methods: {
        
        async searchUsers(){

            await axios.get('/users/filter',{
                params: {
                    name: this.filterName,
                    email: this.filterEmail,
                    is_active: this.filterStatus 
                }
            }).then(
                (response)=>{
                    this.userList = response.data;
                }
            );
            
            this.$emit('atualizeUserList', this.userList);
            
        },

        callUserPage(){
            this.$emit('callUserPage');
        }
    },
}
</script>
<style lang="">
    
</style>