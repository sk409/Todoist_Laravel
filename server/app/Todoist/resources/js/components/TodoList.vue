<template>
  <div>
    <div v-for="todo in todos" :key="todo.id" class="mb-3">
      <TodoListItem :todo="todo"></TodoListItem>
      <div class="divider w-100"></div>
    </div>
    <div class="border-bottom cursor-pointer mb-3" @click="fetchCompletedTodos">+6件の完了したタスク</div>
    <TodoAdd :project-id="projectId" :section-id="sectionId" @created="createdTodo"></TodoAdd>
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
    sectionId: {
      default: null,
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
    },
    fetchCompletedTodos() {
      const data = {
        projectId: this.projectId
      };
      if (this.sectionId) {
        data.sectionId = this.sectionId;
      }
      ajax.get("/todos/forHomeCompleted", data).then(response => {
        console.log(response);
      });
    }
  }
};
</script>

<style scoped>
.divider {
  background: rgb(240, 240, 240);
  height: 1px;
}
</style>
