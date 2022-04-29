<template>
    <AppLayout title="User">
        <template #header>
            <div class="flex flex-col">
            <div>
                <h2 class="text-3xl font-bold underline">
                    User
                </h2>
            <br>
            </div>
            <div>
                <table class="shadow-lg bg-white border-separate">
                <thead>
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Name</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Email</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Role</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="border px-8 py-4">{{user.name}}</td>
                        <td class="border px-8 py-4">{{user.email}}</td>
                        <td class="border px-8 py-4">{{user.role}}</td>
                        <td class="border px-8 py-4">{{user.created_at}}</td>
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
      users: Object,
    },
}
</script>
<style scoped>
table {
     width: 100%;
 }
</style>