<script setup>
defineProps({
    text: {
        type: String,
        default: "Active"
    },
    type: {
        type: String,
        default: "info"
    }
});
</script>

<template>
    <span v-if="type === 'info'"
        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-400 text-white rounded-full"
    >{{ text }}</span>
    <span v-else-if="type === 'warning'"
        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded-full"
    >{{ text }}</span>
    <span v-else-if="type === 'danger'"
        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600  text-white rounded-full"
    >{{ text }}</span>
    <span v-else-if="type === 'dark'"
        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-800 text-white rounded-full"
    >{{ text }}</span>
   <span v-else
        class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-800 text-white rounded-full"
    >{{ text }}</span>
</template>
