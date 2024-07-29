<script setup>
import { onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout.vue";

const props = defineProps({
  post: {
    type: Object,
    default: null,
  },
  isUpdating: {
    type: Boolean,
    default: false,
  },
});

const form = useForm({
  title: "",
  content: "",
});

const submit = () => (props.isUpdating ? updatePost() : addPost());
const addPost = () => form.post("/posts");
const updatePost = () => form.put(`/posts/${props.post.id}`);
onMounted(() => {
  form.title = props.post.title;
  form.content = props.post.content;
});
</script>

<template>
  <AuthenticatedLayout>
  <div class="container mx-auto p-4 max-w-md">
    <form @submit.prevent="submit" class="bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">
        <label for="title" class="block text-slate-300 text-sm font-bold mb-2">Title</label>
        <input type="text" id="title" v-model="form.title" class="bg-slate-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
      </div>
      <div class="mb-6">
        <label for="body" class="block text-slate-300 text-sm font-bold mb-2">Body</label>
        <input type="text" id="body" v-model="form.content" class="bg-slate-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Submit
        </button>
      </div>
    </form>
  </div>
</AuthenticatedLayout>
</template>

  <style lang="scss" scoped></style>