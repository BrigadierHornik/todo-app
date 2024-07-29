<template>
    <div class="container">
        <h1>Todo List</h1>
        <form @submit.prevent="addTodo">
            <input v-model="newTodo" placeholder="Add a new todo">
            <button type="submit">Add</button>
        </form>
        <ul>
            <li v-for="todo in todos" :key="todo.id">
                <input type="checkbox" v-model="todo.completed" @change="updateTodo(todo)">
                <span :class="{ completed: todo.completed }">{{ todo.title }}</span>
                <button @click="deleteTodo(todo)">Delete</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['initialTodos'],
    data() {
        return {
            todos: this.initialTodos,
            newTodo: ''
        }
    },
    methods: {
        addTodo() {
            if (this.newTodo.trim()) {
                axios.post('/todos', { title: this.newTodo })
                    .then(response => {
                        this.todos.push(response.data);
                        this.newTodo = '';
                    })
                    .catch(error => console.error(error));
            }
        },
        updateTodo(todo) {
            axios.put(`/todos/${todo.id}`, { completed: todo.completed })
                .catch(error => console.error(error));
        },
        deleteTodo(todo) {
            axios.delete(`/todos/${todo.id}`)
                .then(() => {
                    const index = this.todos.indexOf(todo);
                    this.todos.splice(index, 1);
                })
                .catch(error => console.error(error));
        }
    }
}
</script>

<style scoped>
.completed {
    text-decoration: line-through;
}
</style>