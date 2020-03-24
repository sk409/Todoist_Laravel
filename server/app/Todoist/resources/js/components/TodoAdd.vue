<template>
    <div>
        <div v-show="!todoStoreForm" @click="todoStoreForm = true">
            <div class="add-button align-items-center d-flex">
                <span class="add-icon material-icons primary-text round"
                    >add</span
                >
                <span class="add-text ml-2">タスクを追加</span>
            </div>
        </div>
        <TodoStoreForm
            v-show="todoStoreForm"
            :project-id="projectId"
            @cancel="todoStoreForm = false"
            @create="todoStoreForm = false"
            @created="createdTodo"
        ></TodoStoreForm>
    </div>
</template>

<script>
import TodoStoreForm from "./TodoStoreForm.vue";
export default {
    props: {
        projectId: {
            required: true,
            validator: v => typeof v === "number" || v === null
        }
    },
    components: {
        TodoStoreForm
    },
    data() {
        return {
            todoStoreForm: false
        };
    },
    methods: {
        createdTodo(todo) {
            this.$emit("created", todo);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";

.add-button:hover .add-icon {
    background: $primary;
    color: white;
}

.add-button:hover .add-text {
    color: $primary;
}
</style>
