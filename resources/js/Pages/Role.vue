<template>
    <AppLayout title="Role">
        <template #header>
            <div class="flex flex-col">
            <div>
                <h2 class="text-3xl font-bold underline">
                    Role
                </h2>
            <br>
            </div>
            <div>
                <table class="shadow-lg bg-white border-separate">
                <thead>
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Role Name</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Description</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="role in roles" :key="role.id">
                        <td class="border px-8 py-4">{{role.display_name}}</td>
                        <td class="border px-8 py-4">{{role.description}}</td>
                        <td class="border px-8 py-4">{{role.created_at}}</td>
                    </tr>
                </tbody>
            </table>
            </div>
            </div>
        </template>
    </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
 components: {
     AppLayout
    },
    props: {
      roles: Object,
    },
}
</script>
<style scoped>
table {
     width: 100%;
 }
</style>