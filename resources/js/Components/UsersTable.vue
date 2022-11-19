<template lang="">
    <div>
        <table class="w-full border border-collapse table-auto">
            <thead>
                <tr class="text-base font-bold text-left bg-gray-50">
                    <th class="px-4 py-3 border-b-2 border-blue-500" v-for="column in columns">{{column}}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-left  hover:bg-gray-300" v-for="object in objectList" :key="object.id">
                    <td class="px-4 py-3">{{object.id}}</td>
                    <td>
                        <span
                            v-bind:class="'relative inline-block px-3 py-1 font-semibold ' + formatCamps(object.is_active).textColor + ' leading-tight'">
                            <span aria-hidden
                                v-bind:class="'absolute ' + formatCamps(object.is_active).bgColor + ' opacity-50 rounded-full'"></span>
                            <span class="relative">{{formatCamps(object.is_active).title}}</span>
                        </span>
                    </td>
                    <td class="px-4 py-3"><div class="font-semibold text-left">{{object.name}}</div></td>
                    <td class="px-4 py-3">{{object.email}}</td>
                    <td class="px-4 py-3">{{object.created_at}}</td>
                    <td class="px-4 py-3 inline-block align-middle">
                        <ul clas="text-center align-middle">
                            <button @click="callUserPage(object.id)" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                                Edit
                            </button>
                            <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center m-auto">
                                Goals
                            </button>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    props: {
        columns: {},
        objectList: {}
    },

    methods: {
        async inactiveUser(userId){
            try{
                result = await axios.post('/user/inactivate/' + userId);
            }catch(err){
                console.error(err.response.data); 
            }
        },

        formatCamps(status){
            if(status){
                return {
                    title: 'Active',
                    textColor: 'text-green-900',
                    bgColor: 'inset-0 bg-green-200'
                }
            }else{
                return {
                    title: 'Inactive',
                    textColor: 'text-red-900',
                    bgColor: 'inset-0 bg-red-200'
                }
            }
        },

        callUserPage(user){
            this.$emit('callUserPage', user);
        }
        
    },
}
</script>
<style lang="">
    
</style>