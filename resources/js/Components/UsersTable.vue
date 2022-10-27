<template lang="">
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="min-w-full leading normal ">
                            <thead>
                                <tr class="text-left">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-left border-b-2" v-for="user in userList" :key="user.id">
                                    <td class="p-1.5">{{user.id}}</td>
                                    <td><div class="font-semibold text-left">{{user.name}}</div></td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.created_at}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        userList: []
    }
}
</script>
<style lang="">
    
</style>