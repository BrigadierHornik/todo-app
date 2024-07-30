<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
      <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800 dark:text-gray-200 mb-4">404</h1>
        <p class="text-2xl text-gray-600 dark:text-gray-400 mb-8">Page Not Found</p>
        <router-link
          to="/"
          class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-300 dark:bg-blue-700 dark:hover:bg-blue-800"
        >
          Go Home
        </router-link>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'NotFound'
  }
  </script>