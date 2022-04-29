<script>
   import AppLayout from '@/Layouts/AppLayout.vue';
   import { Link } from '@inertiajs/inertia-vue3'
   export default {
    components: {
        AppLayout,
        Link
       },
       props: {
         receivedItems: Object,
       },
   }
</script>
<style scoped>
   table {
   width: 100%;
   }
</style>
<template>
   <AppLayout title="Received Item">
      <template #header>
         <div class="flex flex-col">
            <div>
               <div class="flex justify-between">
                  <div>
                     <h2 class="text-3xl font-bold underline">
                        Receied Items
                     </h2>
                  </div>
                  <div class="order-last">
                    <Link href="/received/create">
                      <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Receive More Items</button>
                     </Link>
                  </div>
               </div>
               <br>
            </div>
            <div>
               <table class="shadow-lg bg-white border-separate">
                  <thead>
                     <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Supplier</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Item</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Qty</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Price</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Amount</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Received At</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="data in receivedItems.data" :key="data.id">
                        <td class="border px-8 py-4">{{data.supplier}}</td>
                        <td class="border px-8 py-4">{{data.item}}</td>
                        <td class="border px-8 py-4">{{data.in_qty}}</td>
                        <td class="border px-8 py-4">{{data.price}}</td>
                        <td class="border px-8 py-4">{{data.amount}}</td>
                        <td class="border px-8 py-4">{{data.received_at}}</td>
                        <td class="border px-8 py-4">{{data.status}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </template>
   </AppLayout>
</template>
