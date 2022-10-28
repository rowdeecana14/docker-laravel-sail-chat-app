<script setup>
import { inject } from 'vue';
import Badge  from "@/Components/Badge.vue";
import Button  from "@/Components/Button.vue";
import IconButton  from "@/Components/IconButton.vue";


import { openModal } from "@/Helpers/ModalHelper.js"

const props = defineProps({
    users: Array,
});

let { clickOpenUserEditModal } = inject('userInjectFunctions');

</script>

<template>
	<div class="flex flex-col">
		<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
				<div class="overflow-x-auto">
					<table class="min-w-full">
						<thead class="border-b">
							<tr>
								<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
									#
								</th>
								<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
									Name
								</th>
								<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
									Email
								</th>
								<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
									Status
								</th>
								<th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(user, index) in users" :key="user.id" class="border-b">
								<td class="px-6 py-4 border-t" >
									{{ index + 1}}
								</td>
								<td class="px-6 py-4 border-t" >
									{{ user?.name || '' }}
								</td>
								<td class="px-6 py-4 border-t" >
									{{ user?.email || '' }}
								</td>
								<td class="px-6 py-4 border-t" >
									<Badge v-if="user?.status?.name === 'APPROVED'"
										:text="user?.status?.name || ''" 
										:type="'info'"
									/>
									<Badge v-else-if="user?.status?.name === 'PENDING'"
										:text="user?.status?.name || ''" 
										:type="'warning'"
									/>
									<Badge v-else-if="user?.status?.name === 'DEACTIVATED'"
										:text="user?.status?.name || ''" 
										:type="'dark'"
									/>
									<Badge v-else
										:text="user?.status?.name || ''" 
										:type="'danger'"
									/>
								</td>
								<td class="px-6 py-4 border-t" >
									<IconButton
										:variant="'warning'"
										@click="clickOpenUserEditModal(user)"
									>
										<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="download" class="w-3 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
											</path>
										</svg>
									</IconButton>
								</td>
							</tr>
							<tr v-if="users.length === 0">
								<td class="px-6 py-4 border-t" colspan="5">No users found.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
