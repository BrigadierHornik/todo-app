<template>
    <PageLayout>
        <div v-if="message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ message }}</span>
      <button @click="clearMessage" class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <span class="text-green-500">X</span>
      </button>
    </div>
</PageLayout>
</template>

<script>
import PageLayout from '../Layouts/PageLayout.vue';

export default {
    components: {
        PageLayout,
    },
    data() {
        return {
            message: null,
        };
    },
    methods: {
        clearMessage() {
            this.message = null;
        },
    },
};
</script>