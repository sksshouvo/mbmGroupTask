<script>
   import AppLayout from '@/Layouts/AppLayout.vue';
   import { Link } from '@inertiajs/inertia-vue3'
   export default {
    components: {
        AppLayout,
        Link
       },
       props: {
         items: Object,
       },
   }
</script>
<style scoped>
   table {
   width: 100%;
   }
</style>
<template>
   <AppLayout title="Item">
      <template #header>
         <div class="flex flex-col">
            <div>
               <div class="flex justify-between">
                  <div>
                     <h2 class="text-3xl font-bold underline">
                        Item
                     </h2>
                  </div>
                  <div class="order-last">
                    <Link href="/item/create">
                      <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Add Items</button>
                     </Link>
                  </div>
               </div>
               <br>
            </div>
            <div>
               <table class="shadow-lg bg-white border-separate">
                  <thead>
                     <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Name</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Description</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Status</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Stock</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Created At</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="item in items" :key="item.id">
                        <td class="border px-8 py-4">{{item.name}}</td>
                        <td class="border px-8 py-4">{{item.description}}</td>
                        <td class="border px-8 py-4">{{item.status}}</td>
                        <td class="border px-8 py-4">{{item.stock}}</td>
                        <td class="border px-8 py-4">{{item.created_at}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </template>
   </AppLayout>
</template>
