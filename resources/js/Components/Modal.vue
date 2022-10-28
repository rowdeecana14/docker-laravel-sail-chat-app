<script setup>
import 'flowbite/dist/flowbite.js'
import { ref, onMounted } from 'vue';

let modal = ref(null)

onMounted(() => {
    // set the modal menu element
    const targetEl = document.getElementById('defaultModal');

    // options with default values
    const options = {
        placement: 'center',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        onHide: () => {
            console.log('modal is hidden');
        },
        onShow: () => {
            console.log('modal is shown');
        },
        onToggle: () => {
            console.log('modal has been toggled');
        }
    };

    modal = new Modal(targetEl, options);
});

const toggleModal= () => {
    modal.toggle();
}
const openModal = () => {
    toggleModal();
};
const closeModal = () => {
    toggleModal();
};

defineExpose({
    openModal,
    closeModal
})

</script>
<template>
    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <slot name="header"></slot>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <slot name="body"></slot>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>
