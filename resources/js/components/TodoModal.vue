<template>
  <PopupMessage 
    :is-visible="showPopup"
    :title="title"
    :message="message"
    @close="showPopup = false"
  />
  <div v-if="isOpen" class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-800 dark:bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
    <div class="bg-white dark:bg-gray-700 p-5 rounded-lg shadow-xl w-full max-w-md">
      <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">{{ editMode ? 'Edit Todo' : 'Create New Todo' }}</h2>
      <form @submit.prevent="handleSubmit">
        <input 
          v-model="todoData.title" 
          type="text" 
          placeholder="Todo title" 
          class="w-full p-2 mb-4 border rounded bg-white dark:bg-gray-600 text-gray-800 dark:text-gray-200 border-gray-300 dark:border-gray-500"
        >
        <textarea 
          v-model="todoData.description" 
          placeholder="Todo description" 
          class="w-full p-2 mb-4 border rounded bg-white dark:bg-gray-600 text-gray-800 dark:text-gray-200 border-gray-300 dark:border-gray-500"
        ></textarea>
        <input 
          v-model="todoData.deadline" 
          type="date" 
          class="w-full p-2 mb-4 border rounded bg-white dark:bg-gray-600 text-gray-800 dark:text-gray-200 border-gray-300 dark:border-gray-500"
        >
        <div class="flex justify-end">
          <button 
            type="submit" 
            class="px-4 py-2 bg-blue-500 dark:bg-blue-600 text-white rounded hover:bg-blue-600 dark:hover:bg-blue-700 mr-2"
          >
            {{ editMode ? 'Update' : 'Create' }}
          </button>
          <button 
            type="button" 
            @click="closeModal" 
            class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded mr-2 hover:bg-gray-300 dark:hover:bg-gray-500"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import PopupMessage from './PopUp.vue';

export default {
  props: {
    isOpen: Boolean,
    todo: Object
  },
  components: {
    PopupMessage,
  },
  emits: ['close', 'todo-created', 'todo-updated'],
  data() {
    return {
      todoData: {
        title: '',
        description: '',
        deadline: '',
        completed: false,
      },
      showPopup: false,
      title: 'Notification',
      message: '',
    };
  },
  computed: {
    editMode() {
      return !!this.todo;
    }
  },
  watch: {
    todo: {
      immediate: true,
      handler(newVal) {
        if (newVal) {
          this.todoData = { ...newVal };
        } else {
          this.todoData = { title: '', description: '', deadline: '', completed: false };
        }
      }
    }
  },
  methods: {
    async handleSubmit() {
      if (this.editMode) {
        await this.updateTodo();
      } else {
        await this.createTodo();
      }
      this.closeModal();
    },
    async createTodo() {
      try {
        const response = await axios.post('/api/todos', this.todoData);
        this.message = "Todo created successfully!";
        this.showPopup = true;
        this.$emit('todo-created', response.data);
      } catch (error) {
        this.handleError(error);
      }
    },
    async updateTodo() {
      try {
        const response = await axios.put(`/api/todos/${this.todoData.id}`, this.todoData);
        this.message = "Todo updated successfully!";
        this.showPopup = true;
        this.$emit('todo-updated', response.data);
      } catch (error) {
        this.handleError(error);
      }
    },
    handleError(error) {
      if (error.response) {
        this.message = error.response.data.message;
        this.showPopup = true;
      } else {
        console.error('Error:', error);
      }
    },
    closeModal() {
      this.$emit('close');
      this.todoData = { title: '', description: '', deadline: '', completed: false };
    }
  }
};
</script>
