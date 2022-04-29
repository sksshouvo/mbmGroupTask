<script>
   import AppLayout from '@/Layouts/AppLayout.vue';
   import { Link } from '@inertiajs/inertia-vue3'
   import { reactive } from 'vue'
   import { Inertia } from '@inertiajs/inertia'
      export default {
       components: {
           AppLayout
          },
          setup () {
            const form = reactive({
              item: null,
              supplier: null,
              qty: null,
              price: null,
            })

            function submit() {
              Inertia.post('/received', form)
            }

            return { form, submit }
          },
          props: {
            items: Object,
            suppliers: Object,
            errors: Object,
          },
          data () {
            return {
              amount : 0
            }
          },
          methods: {
            calculate () {
                this.amount = this.form.qty * this.form.price
                console.log(this.amount);
            }
          }
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
            <div class="mb-5">
               <h2 class="text-3xl font-bold underline">
                  Receive More Item
               </h2>
            </div>
            <div class="">
               <form @submit.prevent="submit" class="w-full max-w-lg" autocomplete="off">

                  <div class="flex flex-wrap  mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" id="grid-item">
                    Item
                    </label>
                    <select v-model="form.item" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                      <option value="">-Select One-</option>
                      <option v-for="item in items" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                    <div v-if="errors.item">
                       <p class="text-red-600">{{ errors.item }}</p>
                    </div>
                  </div>
                  <br>
                  <div class="flex flex-wrap  mb-6">
                     <div class="w-full ">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" id="grid-supplier">
                        Suppliers
                        </label>
                        <select v-model="form.supplier" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-supplier" placeholder="Select One">
                            <option value="">-Select One-</option>
                           <option v-for="supplier in suppliers" :value="supplier.id" :key="supplier.id">{{ supplier.name }}</option>
                        </select>
                        <div v-if="errors.supplier">
                           <p class="text-red-600">{{ errors.supplier }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                     <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-qty">
                        Qty
                        </label>
                        <input v-model="form.qty" @keyup="calculate" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-qty" type="number" placeholder="Write Qty Here">
                        <p class="text-gray-600 text-xs italic">Example: 20</p>
                        <div v-if="errors.qty">
                           <p class="text-red-600">{{ errors.qty }}</p>
                        </div>
                     </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-price">
                       Price
                       </label>
                       <input v-model="form.price" @keyup="calculate" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-qty" type="number" placeholder="Write Price Here">
                       <p class="text-gray-600 text-xs italic">Example: 45.20</p>
                       <div v-if="errors.price">
                          <p class="text-red-600">{{ errors.price }}</p>
                       </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-amount">
                       Amount: {{this.amount}}
                       </label>
                    </div>
                  </div>
                  <div class="flex flex-wrap  mb-6">

                     <div class="w-full">
                       <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save Item
                      </button>
                     </div>
                  </div>
            </form>
         </div>
         </div>
      </template>
   </AppLayout>
</template>
