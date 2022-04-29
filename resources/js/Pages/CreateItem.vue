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
              name: null,
              description: null,
              Status: null,
            })

            function submit() {
              Inertia.post('/item', form)
            }

            return { form, submit }
          },
          props: {
            errors: Object,
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
                 Create Item
              </h2>
           </div>
           <div class="">
             <form @submit.prevent="submit" class="w-full max-w-lg" autocomplete="off">
                <div class="flex flex-wrap  mb-6">
                   <div class="w-full ">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                      Item Name
                      </label>
                      <input v-model="form.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Write Name Here">
                      <p class="text-gray-600 text-xs italic">Example: Pen, Football</p>
                      <div v-if="errors.name"><p class="text-red-600">{{ errors.name }}</p></div>
                   </div>
                </div>
                <br>
                <div class="flex flex-wrap  mb-6">
                   <div class="w-full ">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                      Item Description
                      </label>
                      <input v-model="form.description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Write Description Here">
                      <p class="text-gray-600 text-xs italic">Example: Use it when cold</p>
                      <div v-if="errors.description"><p class="text-red-600">{{ errors.description }}</p></div>


                   </div>
                </div>
                <div class="flex flex-wrap  mb-6">

                   <div class="w-full ">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                      Status
                      </label>
                      <div class="relative">
                         <select v-model="form.status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-status" placeholder="Select One">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                         </select>
                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                               <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                         </div>
                      </div>
                      <div v-if="errors.status"><p class="text-red-600">{{ errors.status }}</p></div>

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
