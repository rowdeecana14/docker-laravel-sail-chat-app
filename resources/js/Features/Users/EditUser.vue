<script setup>
    import { inject, nextTick, onMounted, ref } from 'vue';
    import Modal  from '@/Components/Modal.vue';

    let { setShowEditModal, show_edit_modal } = inject('userInject');
</script>
<template>
	<Modal :isOpen="show_edit_modal" title="EDIT USER" width="md" type="info" :onClose="()=> setShowEditModal(false)" >
        <template v-slot:body>
            <p class="text-gray-800">
                Are you sure you want you delete your account? This action cannot be undone.
            </p>
        </template>

        <template v-slot:footer>
            <div class="text-right">
                <button type="button"
                    class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                    @click="setShowEditModal(false)" 
                >
                    Close
                </button>
                <button type="button"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Save changes
                </button>
            </div>
        </template>
    </Modal>
</template>
