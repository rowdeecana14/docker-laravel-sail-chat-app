<template>
    <div class="fixed w-full h-full top-0 left-0 flex items-center justify-center z-10" v-show="isOpen === true">
        <div class="absolute w-full h-full bg-gray-900 opacity-50" @click="onClose"></div>
        <div class="absolute max-h-full max-w-full max-w-7xl" >
            <div class="container bg-white overflow-hidden md:rounded">
                <div class="px-4 py-4 leading-none flex justify-between items-center font-medium text-sm bg-gray-100 border-b select-none">
                    <h2 class="text-xl font-medium leading-normal text-gray-800" :class="color">
                        <div class="flex items-center flex-row">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-alpha-up" class="w-7 h-6 mr-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                            </svg>
                            {{ title }} 
                        </div>
                    </h2>
                    <div @click="onClose" class="text-2xl hover:text-gray-600 cursor-pointer">
                        &#215;
                    </div>
                </div>

                <div class="max-h-full px-4 py-4">
                    <slot name="body"></slot>
                </div>
                <div class="px-3 py-3 font-medium text-sm bg-gray-100 border-t">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from 'vue';

let props = defineProps({
    isOpen: {
        type: Boolean,
        default: false
    },
    type: {
        type: String,
        default: "info",
    },
    title: {
        type: String,
        default: "",
    },
    header: {
        type: String,
        required: false,
        default: "",
    },
    width: {
        type: String,
        default: "full",
        // validator: (value) => ["xs", "sm", "md", "lg", "full"].indexOf(value) !== -1,
    },
    onClose: Function
});

let emit = defineEmits(['close'])

onMounted(() => {
    document.addEventListener("keydown", onEscape);
});

const onEscape = (e) => {
    if (e.key === "Esc" || e.key === "Escape") {
        close();
    }
};

const maxWidth = computed(() => {
   switch (props.width) {
        case "xs":
            return "max-w-lg";
        case "sm":
            return "max-w-xl";
        case "md":
            return "max-w-2xl";
        case "lg":
            return "max-w-3xl";
        case "full":
            return "max-w-full";
    }
});
const color = computed(() => {
    switch (props.type) {
        case "info":
            return  `text-gray-600`;
        case "warning":
            return `text-yellow-600`;
        case "success":
            return `text-teal-600`;
        case "danger":
            return `text-red-600`;
    }
});
</script>