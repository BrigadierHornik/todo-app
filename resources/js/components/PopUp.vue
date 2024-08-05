<template>
    <transition
      enter-active-class="transition ease-out duration-300"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <div v-if="isVisible" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75" @click="close"></div>
        <div class="relative bg-white dark:bg-gray-800 rounded-lg p-8 max-w-md mx-auto shadow-xl">
          <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ title }}</h2>
          <p class="text-gray-700 dark:text-gray-300">{{ message }}</p>
          <button 
            @click="close" 
            class="mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700"
          >
            Close
          </button>
        </div>
      </div>
    </transition>
  </template>
  
  <script>
  export default {
    props: {
      title: {
        type: String,
        default: 'Notification'
      },
      message: {
        type: String,
        required: true
      },
      isVisible: {
        type: Boolean,
        required: true
      }
    },
    methods: {
      close() {
        this.$emit('close');
      }
    }
  }
  </script>