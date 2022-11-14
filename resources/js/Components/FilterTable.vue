<template lang="">
    <div >
        <div>
            <div class="py-12">
                <div class="lg:px-20">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="py-3">
                            <form class="flex items-center pb-3">   
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full mx-2">
                                    <input v-model="filterName" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" placeholder="Name" required>
                                </div>
                                <div class="relative w-full mx-2">
                                    <input v-model="filterEmail" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" placeholder="E-mail" required>
                                </div>
                                <select v-model="filterStatus" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 mx-2">
                                    <option value="">No one</option>
                                    <option value= 1 >Active</option>
                                    <option value= 0 >Inactive</option>
                                </select>
                                <button @click="searchUsers" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2">
                                    Search
                                </button>
                            </form>
                            <slot/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
    data(){
        return {
            filterName: '',
            filterEmail: '',
            filterStatus: ''
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
            });
        }
        
    },
}
</script>
<style lang="">
    
</style>