<template>
  <PageLayout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
      <div class="max-w-md w-full space-y-8 relative">
        <!-- Error display -->
        <div v-if="displayError"
          class="absolute top-0 left-0 right-0 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded dark:bg-red-900 dark:border-red-700 dark:text-red-100 flex items-start justify-between"
          role="alert">
          <ul class="flex-1">
            <li v-for="(error, index) in errors[0]" :key="index">
              <span class="block sm:inline">{{ error[0] }}</span>
            </li>
          </ul>
          <button @click="displayError = false" class="flex items-center justify-center text-red-700 dark:text-red-100 h-8 w-8 p-4 ml-4">
            <i class="material-icons md-36">
                close
            </i>
          </button>
        </div>

        <div class="relative pt-12">
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">
            Sign in to your account
          </h2>

          <form @submit.prevent="login" class="mt-8 space-y-6">
            <div class="rounded-md shadow-sm -space-y-px">
              <div>
                <label for="email" class="sr-only">Email address</label>
                <input v-model="email" id="email" name="email" type="text" autocomplete="email" required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 dark:text-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Email address">
              </div>
              <div>
                <label for="password" class="sr-only">Password</label>
                <input v-model="password" id="password" name="password" type="password" autocomplete="current-password"
                  required
                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 dark:text-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Password">
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="text-sm">
                <a href="#"
                  class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                  Forgot your password?
                </a>
              </div>
            </div>

            <div>
              <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900">
                Sign in
              </button>
            </div>
          </form>
          <button @click=getUser()>TEst</button>
        </div>
      </div>
    </div>
  </PageLayout>
</template>

<script>
import axios from 'axios';
import PageLayout from '../Layouts/PageLayout.vue';

export default {
  components: {
    PageLayout
  },
  data() {
    return {
      email: '',
      password: '',
      errors: [],
      displayError: false
    };
  },
  computed: {
    errorMessages() {
      return this.errors.length ? this.errors : [];
    },
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          email: this.email,
          password: this.password
        });

        // Handle successful login
        console.log('Login successful:', response.data);
        // Redirect to another page or store the token
        //this.$router.push('/');
      } catch (error) {
        // Handle error
        console.error('Login failed:', error.response.data.error);
        this.errors = error.response.data.errors || [error.response.data.error];
        this.displayError = true;
        console.log(this.errors);


      }
    },
    async getUser() {
      try {
        const response = await axios.get('/api/user');
        console.log('User:', response.data);
      } catch (error) {
        console.error('Failed to get user:', error.response.data.error);
    }
  }
}
};

</script>

<style scoped></style>