<template>
    <div v-if="project" class="p-4 white">
        <div class="font-large font-weight-bold">{{ project.name }}</div>
        <div>
            <TodoList
                :project-id="project.id"
                :todos="project.todos"
                @created:todo="createdTodo"
            ></TodoList>
        </div>
        <div>
            <TodoSectionAdd :project-id="project.id"></TodoSectionAdd>
        </div>
    </div>
</template>

<script scoped>
import TodoList from "./TodoList.vue";
import TodoSectionAdd from "./TodoSectionAdd.vue";
export default {
    props: {
        project: {
            default: null,
            validator: v => typeof v === "object" || v === null
        }
    },
    components: {
        TodoList,
        TodoSectionAdd
    },
    methods: {
        createdTodo(todo) {
            this.$emit("created:todo", todo);
        }
    }
};
</script>
