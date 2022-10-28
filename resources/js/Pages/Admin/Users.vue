<script setup>
import { ref, watch, provide } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import debounce from "lodash/debounce";

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import EditUserModal  from '@/Features/Users/Modal/EditUserModal.vue';
import IndexUser  from "@/Features/Users/IndexUser.vue";
import useUser from "@/Composables/UserComposable";

const props = defineProps({
    users: Object,
    filters: Object,
    statuses: Array
});

let search = ref(props.filters.search);
let editUserModalRef = ref(null);
let user = ref(null);

provide('userInjectFunctions', {
    clickOpenUserEditModal: (data)=> {
        user.value = data;
        editUserModalRef.value.openModal();
    },
});

provide('userInject', user);

watch(search, debounce(function (value) {
    Inertia.get(route('admin.users.index'), { search: value }, { preserveState: true, replace: true });
}, 300));
</script>
<template>
    <Head>
        <title>User Lists</title>
        <meta type="description" content="This is a user page description" head-key="users">
    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Lists
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg" />
                <IndexUser :users="users.data" />
                <Pagination class="mt-6" :links="users.links" />
                <EditUserModal ref="editUserModalRef" :statuses="statuses"  />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
