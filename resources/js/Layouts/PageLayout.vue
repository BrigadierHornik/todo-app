<template>
  <router-view />
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
      <!-- Navbar -->
      <NavBar />
  
      <!-- Main Content -->
      <main class="container mx-auto flex-grow p-4">
        <slot />
        <router-view />
      </main>
  
      <!-- Footer -->
      <footer class="bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 p-4 mt-8">
        <div class="container mx-auto text-center">
          <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
      </footer>
    </div>
  </template>

  
  <script>
  import NavBar from '../components/Layout/NavBar.vue';
  export default {
    name: 'App',
    components: {
      NavBar
    }
  }
  </script>
  