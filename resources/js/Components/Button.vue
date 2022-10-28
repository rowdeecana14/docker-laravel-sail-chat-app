<script setup>
import { computed } from 'vue'

let props = defineProps({
    variant: {
        type: String,
        default: "primary"
    },
    classes: {
        type: String,
        default: "rounded"
    },
    size: {
        type: String,
        default: "medium"
    },
    isDisabled: {
        type: Boolean,
        default: false
    }
});

let variants = {
            // inline-block rounded-full bg-blue-600 text-white leading-normal uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-9 h-9
    primary: "inline-block bg-blue-600 text-white font-medium text-xs leading-tight uppercase shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out",
    secondary: "inline-block bg-purple-600 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out",
    info: "inline-block bg-blue-400 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out",
    success: "inline-block bg-green-500 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out",
    danger: "inline-block bg-red-600 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out",
    warning: "inline-block bg-yellow-500 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out",
    light: "inline-block bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase  shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out",
    dark: "inline-block bg-gray-800 text-white font-medium text-xs leading-tight uppercase  shadow-md hover:bg-gray-900 hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out",
};

let sizes = {
    small: "px-4 py-1.5",
    medium: "px-6 py-2.5",
    large: "px-7 py-3"
};

const buttonVariant = computed(() => {
    return props.variant in variants ? variants[props.variant] : "";
});

const buttonDisabled = computed(() => {
    return props.isDisabled ?  "pointer-events-none opacity-60" : "";
});

const buttonClasses = computed(() => {
    return props.classes;
});

const buttonSize = computed(() => {
    return props.size in sizes ? sizes[props.size] : "";
});
</script>
<template>
    <button :class=" [buttonSize, buttonClasses, buttonVariant, buttonDisabled ]" :disabled="isDisabled">
        <slot />
    </button>
</template>
