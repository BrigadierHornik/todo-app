<template>
    <PageLayout>
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden md:max-w-2xl m-4">
            <div class="md:flex">
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Todo App</div>
                    <h1 class="block mt-1 text-lg leading-tight font-medium text-black dark:text-white">Welcome to Your
                        Todo List</h1>
                    <p class="mt-2 text-gray-500 dark:text-gray-300">Manage your tasks efficiently with our simple and
                        intuitive todo app.</p>
                    <ul class="mt-4 text-gray-600 dark:text-gray-400">
                        <li>✅ Create new todos</li>
                        <li>📝 Add descriptions to your tasks</li>
                        <li>🏷️ Categorize with tags</li>
                        <li>🗓️ Set due dates</li>
                        <li>✔️ Mark tasks as completed</li>
                        <li>🔍 Filter and search your todos</li>
                    </ul>
                    <button v-if="logged"
                        class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition duration-300 ease-in-out">
                        <router-link to="/todo">Get Started</router-link>
                    </button>
                    <button v-else
                        class="mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition duration-300 ease-in-out">
                        <router-link to="/todo">Get Started</router-link>
                    </button>
                </div>
            </div>
        </div>
    </PageLayout>
</template>

<script>
import { inject } from 'vue';
import PageLayout from '../Layouts/PageLayout.vue';

export default {
    components: {
        PageLayout,
    },
    setup() {
        const logged = inject('logged');

        return {
            logged,
        };
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