<template lang="">
    <div>
        <div class="py-12 lg:px-20">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-3">
                    <div v-if="$page.props.flash.message" class="p-3">
                        <div class="flex bg-white flex-row shadow-md border border-gray-100 rounded-lg overflow-hidden ">
                            <div class="flex w-3 bg-gradient-to-t from-green-500 to-green-400"></div>
                            <div class="flex-1 p-3">
                                <p class="text-gray-400 text-xs md:text-sm font-light">{{$page.props.flash.message}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white border-gray-200">
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
    
}
</script>
<style lang="">
    
</style>