<script setup>
import { Link, useForm, Head } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps({
  todos: {
    type: Array,
    default: () => [],
  },
  daysOfWeek: {
    type: Array,
    default: () => [],
  },
});

const headers = ["title", "content", "actions"];
const form = useForm({});

const deletetodo = (id) => {
  form.delete(`todos/${id}`);
};

</script>

<template>
  <div class="min-h-screen bg-gray-100 p-4">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold text-center mb-8 text-indigo-600">Weekly Todo Planner</h1>
      
      <!-- Date Navigation -->
      <div class="flex justify-between items-center mb-6">
        <button class="text-indigo-600 hover:text-indigo-800">&lt; Previous Week</button>
        <h2 class="text-xl font-semibold">July 24 - July 30, 2024</h2>
        <button class="text-indigo-600 hover:text-indigo-800">Next Week &gt;</button>
      </div>

      <!-- Weekly Grid -->
      <div class="grid grid-cols-7 gap-4">
        <!-- Repeat this block for each day of the week -->
        <div v-for="(dayOfWeek, index) in daysOfWeek" :key="index"   class="bg-white rounded-lg shadow p-4">
          <h3 class="font-semibold text-lg mb-2">{{dayOfWeek.label}}</h3>
          <p class="text-sm text-gray-500 mb-4">July 24</p>
          
          <!-- Add Todo Form -->
          <form class="mb-4">
            <div class="flex">
              <input 
                type="text" 
                placeholder="Add todo..." 
                class="flex-grow px-2 py-1 text-sm border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              >
              <button 
                type="submit" 
                class="px-2 py-1 bg-indigo-600 text-white text-sm rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
              >
                Add
              </button>
            </div>
          </form>
          
          <!-- Todo List -->
          <ul class="space-y-2">
            <li class="flex items-center justify-between text-sm">
              <div class="flex items-center">
                <input 
                  type="checkbox" 
                  class="mr-2 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                >
                <span>Buy groceries</span>
              </div>
              <button class="text-red-600 hover:text-red-800 focus:outline-none">&times;</button>
            </li>
            <li class="flex items-center justify-between text-sm">
              <div class="flex items-center">
                <input 
                  type="checkbox" 
                  class="mr-2 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                >
                <span>Call mom</span>
              </div>
              <button class="text-red-600 hover:text-red-800 focus:outline-none">&times;</button>
            </li>
          </ul>
        </div>
        <!-- End of day block -->

        <!-- Placeholder for other days -->
        <div class="bg-white rounded-lg shadow p-4">
          <h3 class="font-semibold text-lg mb-2">Tuesday</h3>
          <p class="text-sm text-gray-500 mb-4">July 25</p>
          <!-- Add form and todo list here -->
        </div>
        <!-- Repeat for Wednesday, Thursday, Friday, Saturday, Sunday -->
      </div>
    </div>
  </div>
</template>
