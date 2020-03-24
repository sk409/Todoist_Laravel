<template>
    <div>
        <div v-for="todo in todos" :key="todo.id">
            <TodoListItem :todo="todo"></TodoListItem>
        </div>
        <TodoAdd :project-id="projectId" @created="createdTodo"></TodoAdd>
    </div>
</template>

<script>
import TodoAdd from "./TodoAdd.vue";
import TodoListItem from "./TodoListItem.vue";
export default {
    props: {
        projectId: {
            required: true,
            validator: v => typeof v === "number" || v === null
        },
        todos: {
            default: () => [],
            type: Array
        }
    },
    components: {
        TodoAdd,
        TodoListItem
    },
    methods: {
        createdTodo(todo) {
            this.$emit("created:todo", todo);
        }
    }
};
</script>
