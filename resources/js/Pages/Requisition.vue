<script>
   import AppLayout from '@/Layouts/AppLayout.vue';
   import { Link } from '@inertiajs/inertia-vue3'
   export default {
    components: {
        AppLayout,
        Link
       },
       props: {
         issuedItems: Object,
       },
   }
</script>
<style scoped>
   table {
   width: 100%;
   }
</style>
<template>
   <AppLayout title="Item Requisition">
      <template #header>
         <div class="flex flex-col">
            <div>
               <div class="flex justify-between">
                  <div>
                     <h2 class="text-3xl font-bold underline">
                        Requisition Issued Items
                     </h2>
                  </div>
                  <div class="order-last">
                    <Link href="/requisition/create">
                      <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Items Requisition</button>
                     </Link>
                  </div>
               </div>
               <br>
            </div>
            <div>
               <table class="shadow-lg bg-white border-separate">
                  <thead>
                     <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Item</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Qty</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Price</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Amount</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Requisition At</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="data in issuedItems.data" :key="data.id">
                        <td class="border px-8 py-4">{{data.item}}</td>
                        <td class="border px-8 py-4">{{data.out_qty}}</td>
                        <td class="border px-8 py-4">{{data.price}}</td>
                        <td class="border px-8 py-4">{{data.out_qty * data.price}}</td>
                        <td class="border px-8 py-4">{{data.received_at}}</td>
                        <td class="border px-8 py-4">
                          <select >
                            <option value="draft" >Draft</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                          </select>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </template>
   </AppLayout>
</template>
