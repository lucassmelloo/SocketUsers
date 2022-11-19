<template lang="">
    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
      <h1 v-if="currentUser.name" class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">
        {{currentUser.name}}
      </h1>
      <h1 v-else class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">
        Register user
      </h1>
      <form class="items-center pb-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
          Name
        </label>
        <input v-model="currentUser.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="name" type="text" placeholder="Name">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
          E-mail
        </label>
        <input v-model="currentUser.email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="name" type="text" placeholder="E-mail">
      </form>
    </div>
    
</template>
<script>
  export default {
    props:{
        incomingUser: {}
    },

    data(){
      return{
        currentUser: {
          name:'',
          email:'',
          password:'',
          is_active:''
        }
      }
    },

    methods: {
          
      setUser(user){
        if(user){
          this.currentUser = user;
        }
      }

    },

    mounted(){

      this.setUser(this.incomingUser);

    }
  }
</script>
<style lang="">
    
</style>