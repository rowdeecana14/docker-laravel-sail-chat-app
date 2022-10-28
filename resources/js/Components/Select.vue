

<script setup>
let props = defineProps({
    data: {
        type: Array,
        default: []
    },
    selected: {
        type: Number || String,
        default: ''
    },
});

</script>

<template>
    <select style="100%" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
    > 
        <template v-for="(item, index) in data"  :key="index">
            <option :value="item.id" :selected="item.id === selected">{{ item.text }}</option> 
        </template>
    </select> 
</template>
