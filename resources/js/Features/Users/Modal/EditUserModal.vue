<script setup>
import { ref, nextTick, inject  } from '@vue/runtime-core';
import Modal  from '@/Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import Select from '@/Components/Select.vue';

const props = defineProps({
    statuses: Array,
});

let modalRef = ref(null);
let isModalOpen = ref(false);

let user = inject('userInject');

const openModal = async() => {
    isModalOpen.value = true;
    await nextTick()
    modalRef.value.openModal();
};
const closeModal = async () => {
    modalRef.value.closeModal();
    await nextTick()
    isModalOpen.value = false;
};

defineExpose({
    openModal,
    closeModal
})

</script>
<template>
   <Modal ref="modalRef" v-if="isModalOpen">
        <template v-slot:header>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex align-center">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" class="w-5 mx-auto mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                    </path>
                </svg>
                Edit User
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" 
                @click="closeModal"
            >
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
        </template>
        <template v-slot:body>
           <div class="mb-1 xl:w-full">
                <InputLabel for="name" :value="'Name'" />
                <TextInput id="name" type="text" class="mt-1 block w-full" :value="user?.name || ''" required  />
                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>
            <div class="mb-1 xl:w-full">
                <InputLabel for="email" :value="'Email'" />
                <TextInput id="email" type="email" class="mt-1 block w-full" :value="user?.email || ''" required  />
            </div>
            <div class="mb-1 xl:w-full">
                <InputLabel for="status" :value="'Status'" />
                <Select id="status"
                    :data="statuses"
                    :selected="user?.status_id || ''"
                >
                </Select>
            </div>
        </template>
        <template v-slot:footer>
            <button @click="closeModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
            <button @click="closeModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
        </template>
   </Modal>
</template>
