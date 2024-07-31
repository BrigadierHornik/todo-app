<template>
    <router-view></router-view>
  </template>
  
  <script>
  

  import { ref, provide, onMounted, watch } from 'vue';

export default {
    name: 'App',
  setup() {
    const isDarkMode = ref(false);

    const toggleDarkMode = () => {
      isDarkMode.value = !isDarkMode.value;
      document.cookie = `darkMode=${isDarkMode.value}; path=/; max-age=31536000`;
    };

    const checkDarkModeCookie = () => {
      const cookies = document.cookie.split(';');
      const darkModeCookie = cookies.find(cookie => cookie.trim().startsWith('darkMode='));
      if (darkModeCookie) {
        isDarkMode.value = darkModeCookie.split('=')[1] === 'true';
      }
    };

    onMounted(() => {
      checkDarkModeCookie();
    });

    watch(isDarkMode, (newValue) => {
      if (newValue) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    });

    const logged = document.querySelector('meta[name="logged-in"]').content;

    // Provide isDarkMode and toggleDarkMode to child components
    provide('isDarkMode', isDarkMode);
    provide('toggleDarkMode', toggleDarkMode);
    provide('logged', logged);

    return {
      isDarkMode,
      logged,
    };
  },
};
</script>