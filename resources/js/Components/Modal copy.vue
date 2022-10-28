<template>
    <div 
        class="modal fade fixed top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto show justify-center" 
        id="exampleModalCenteredScrollable" 
        style="display: block;"
    >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none"
            :class="maxWidth"
        >
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
            >
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                        {{ title }}
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button
                    >
                </div>
                <div class="modal-body relative p-4">
                   <slot name="body"></slot>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md"
                >
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

let props = defineProps({
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
        validator: (value) => ["xs", "sm", "md", "lg", "full"].indexOf(value) !== -1,
    },
});

let emit = defineEmits(['close'])

let open = ref(true);

onMounted(() => {
    const onEscape = (e) => {
        if (e.key === "Esc" || e.key === "Escape") {
            close();
        }
    };

    document.addEventListener("keydown", onEscape);
});

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
})

const close = () => {
    open.value = false;
    emit('close');
    document.removeEventListener("keydown", onEscape);
};
</script>