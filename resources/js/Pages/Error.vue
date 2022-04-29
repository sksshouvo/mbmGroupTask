<template>
    <AppLayout title="Error">
        <template #header>
           <h2 class="text-red-600">Error: {{error}}</h2>
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
      error: String,
    },
}
</script>
<style scoped>
table {
     width: 100%;
 }
</style>