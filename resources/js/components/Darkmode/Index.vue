<template>
    <button
      @click="toggleDarkMode"
      class="px-4 py-2 rounded-md transition-colors duration-200 ease-in-out focus:outline-none"
      :class="isDarkMode ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-800'"
    >
      {{ isDarkMode ? 'Light Mode' : 'Dark Mode' }}
    </button>
  </template>
  
  <script>

  </script>