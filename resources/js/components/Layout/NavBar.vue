<template>
    <nav class="bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-200 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold"><i class="material-icons md-36">home</i></a>
            <ul class="flex space-x-4">
                <li><router-link to="/" class="hover:text-gray-800 dark:hover:text-gray-300"
                        active-class="dark:text-indigo-400 text-indigo-600">Home</router-link></li>
                <li v-if="logged"><router-link to="/todo" class="hover:text-gray-800 dark:hover:text-gray-300">Todo</router-link></li>
                <li>
                    <router-link v-if="logged" to="/logout" class="hover:text-gray-800 dark:hover:text-gray-300"
                        active-class="dark:text-indigo-400 text-indigo-600">Logout</router-link>
                    <router-link v-else to="/login" class="hover:text-gray-800 dark:hover:text-gray-300"
                        active-class="dark:text-indigo-400 text-indigo-600">Login</router-link>
                </li>
                <li><button @click=toggleDarkMode class="hover:text-gray-600 dark:hover:text-gray-300"><i
                            class="material-icons md-36">{{ isDarkMode ? "light_mode" : "dark_mode" }}</i></button></li>
            </ul>
        </div>
    </nav>
</template>

<script>

import { inject } from 'vue';


export default {
    name: 'NavBar',
    setup() {
        const isDarkMode = inject('isDarkMode');
        const toggleDarkMode = inject('toggleDarkMode');
        const logged = inject('logged');

        return {
            isDarkMode,
            toggleDarkMode,
            logged,
        };
    },
};
</script>