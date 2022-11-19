<template lang="">
    <div class="w-full md:w-full p-3 mb-6 md:mb-0">
      <div class="flex items-center space-x-">
        <h1 v-if="currentUser.name" class="block uppercase tracking-wide text-gray-700 text-2xl font-bold mb-2">
          {{currentUser.name}}
        </h1>
        <h1 v-else class="block uppercase tracking-wide text-gray-700 text-2xl font-bold my-1">
          Register user
        </h1>
        <div class="flex-1"/>
        <button type="button" @click="callIndex" class="flex items-center text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded text-sm px-5 py-2.5 text-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
          Back
        </button>
      </div>
      <form class="items-center pb-3 pt-3">
        <div class="px-1">

          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            Name
          </label>
          <input v-model="currentUser.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="name" type="text" placeholder="Name">
        </div>
        <div class="w-full md:w-full px-1 ">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            E-mail
          </label>
          <input v-model="currentUser.email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="email" type="text" placeholder="E-mail">
        </div>
        <div class="flex flex-wrap">
        
          <div class="w-full md:w-2/5 px-1">
            <label class="block w-1/2 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
              Password
            </label>
            <input v-model="currentUser.password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="password" type="password" placeholder="Password">
          </div>
          <div class="w-full md:w-2/5 px-1">
            <label class="block w-1/2 uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
              Confirm Password
            </label>
            <input v-model="confirmPassword" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white mb-3" id="confirmPassword" type="password" placeholder="Password">

          </div>
          <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    State
                </label>
                <div class="relative">
                    <select v-model="currentUser.is_active" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value= 1 >Active</option>
                        <option value= 0 >Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <button @click="saveUser" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded text-sm px-5 py-2.5 text-center mr-2">
          <strong>Save</strong>
        </button>
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
          is_active: Boolean
        },
        confirmPassword:''
      }
    },

    methods: {
          
      setUser(user){
        if(!_.isEmpty(user)){
          console.log(user)
          this.currentUser = user;
        }
      },

      callIndex(user){
        this.$inertia.visit(route('users'), {method:'get'})
      },

      async saveUser(){
        if(this.currentUser.password === this.confirmPassword){
          console.log(this.currentUser);
          await axios.post('/user/store', this.currentUser).then(
            (response)=>{
              console.log(response.data);
              this.$inertia.visit(route('user-page', response.data.id), {method:'get'})
            }
          );
        }else{

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