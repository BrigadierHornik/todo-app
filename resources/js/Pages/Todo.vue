<template>
  <PageLayout>
    <div class="container mx-auto px-4 py-8">
      <h1 class="text-3xl font-bold mb-6">Todo App</h1>
      <!-- Add Todo Form -->
      <div>
        <button @click="openModal" class="px-4 py-2 bg-blue-500 text-white rounded">
          Add Todo
        </button>
        <TodoModal :isOpen="isModalOpen" @close="closeModal" @todo-created="handleTodoCreated" />
      </div>

      <div v-for="(group, date) in groupedTodos" :key="date" class="mb-6">
        <h2 class="text-xl font-semibold mb-4">{{ date }}</h2>
        <ul class="space-y-3">
          <li v-for="todo in group" :key="todo.id" class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow dark:shadow-gray-700">
            <div class="flex items-center">
              <input type="checkbox" :checked="todo.completed" @change="toggleTodo(todo)"
                class="mr-4 h-5 w-5 text-blue-600 dark:text-blue-400 bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-400">
              <div class="flex-grow">
                <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100"
                  :class="{ 'line-through text-gray-500 dark:text-gray-400': todo.completed }">
                  {{ todo.title }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300" :class="{ 'line-through': todo.completed }">
                  {{ todo.description }}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                  Deadline: {{ todo.deadline }}
                </p>
              </div>
              <button @click="openEditModal(todo)"
                class="ml-4 text-yellow-500 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300">
                Edit
              </button>
              <button @click="removeTodo(todo)"
                class="ml-4 text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300">
                Delete
              </button>
            </div>
          </li>
        </ul>
      </div>

      <!-- Edit Todo Modal -->
      <TodoModal :isOpen="isEditModalOpen" :todo="currentTodo" @close="closeEditModal" @todo-updated="handleTodoUpdated" />
    </div>
  </PageLayout>
</template>

<script>
import { ref, computed } from 'vue'
import PageLayout from '@/Layouts/PageLayout.vue'
import TodoModal from '@/components/TodoModal.vue'
import axios from 'axios'

export default {
  components: {
    PageLayout,
    TodoModal
  },
  data() {
    return {
      isModalOpen: false,
      isEditModalOpen: false,
      currentTodo: null,
      todos: [],
    };
  },
  computed: {
    groupedTodos() {
      return this.groupByDate(this.sortedTodos());
    }
  },
  methods: {
    openModal() {
      this.isModalOpen = true;
    },
    closeModal() {
      this.isModalOpen = false;
    },
    openEditModal(todo) {
      this.currentTodo = { ...todo };
      this.isEditModalOpen = true;
    },
    closeEditModal() {
      this.isEditModalOpen = false;
      this.currentTodo = null;
    },
    handleTodoCreated(newTodo) {
      this.todos.push(newTodo);
    },
    async handleTodoUpdated(updatedTodo) {
      const index = this.todos.findIndex(todo => todo.id === updatedTodo.id);
      if (index !== -1) {
        this.todos.splice(index, 1, updatedTodo);
      }
    },
    async fetchTodos() {
      try {
        const response = await axios.get('/api/todos');
        this.todos = response.data;
      } catch (error) {
        console.error('Error fetching todos:', error);
      }
    },
    sortedTodos() {
      return [...this.todos].sort((a, b) => new Date(a.deadline) - new Date(b.deadline));
    },
    groupByDate(todos) {
      return todos.reduce((groups, todo) => {
        const date = this.formatDate(todo.deadline);
        if (!groups[date]) {
          groups[date] = [];
        }
        groups[date].push(todo);
        return groups;
      }, {});
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      const day = String(date.getDate()).padStart(2, '0');
      const month = String(date.getMonth() + 1).padStart(2, '0');
      const year = date.getFullYear();
      return `${month}-${day}-${year}`;
    },
    toggleTodo(todo) {
      todo.completed = !todo.completed;
      this.updateTodo(todo);
    },
    async updateTodo(todo) {
      try {
        await axios.put(`/api/todos/${todo.id}`, todo);
      } catch (error) {
        console.error('Error updating todo:', error);
      }
    },
    async removeTodo(todo) {
      try {
        await axios.delete(`/api/todos/${todo.id}`);
        this.todos = this.todos.filter(t => t.id !== todo.id);
      } catch (error) {
        console.error('Error deleting todo:', error);
      }
    }
  },
  mounted() {
    this.fetchTodos();
  }
}
</script>
