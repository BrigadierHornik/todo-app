<script setup>
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps({
  posts: {
    type: Array,
    default: () => [],
  },
});

const headers = ["title", "content", "actions"];
const form = useForm({});

const deletePost = (id) => {
  form.delete(`posts/${id}`);
};

</script>

<template>
  <AuthenticatedLayout>
  <div class="container mx-auto p-4 text-slate-300">
    <h1 class="text-2xl font-bold mb-4">My Inertia CRUD</h1>
    <Link href="posts/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create new Post</Link>
    <table class="min-w-full bg-gray-700 border border-gray-300 mt-4">
      <thead class="bg-gray-200">
        <tr>
          <th v-for="header in headers" :key="header" class="py-2 px-4 border-b border-gray-300 bg-slate-600">
            {{ header }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-600 border">
          <td class="py-2 px-4 border-gray-300">{{ post.title }}</td>
          <td class="py-2 px-4 border-gray-300">{{ post.content }}</td>
          <td class="py-2 px-4 border-gray-300 flex space-x-2">
            <button @click="deletePost(post.id)" class="bg-red-900 px-4 py-2 rounded hover:bg-red-700">Delete</button>
            <Link :href="`posts/${post.id}/edit`" class="bg-green-900 px-4 py-2 rounded hover:bg-green-700">Edit</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </AuthenticatedLayout>
</template>
