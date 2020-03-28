<template>
  <div v-if="project" class="p-4 white">
    <div class="font-large font-weight-bold">{{ project.name }}</div>
    <TodoList
      :project-id="project.id"
      :todos="project.todos"
      class="mt-3"
      @created:todo="createdTodo"
    ></TodoList>
    <TodoSectionAdd :project-id="project.id" class="my-3" @created="createdSection"></TodoSectionAdd>
    <div>
      <TodoSectionList
        :project-id="project.id"
        :sections="project.sections"
        @created:todo="createdTodo"
        @created:section="createdSection"
        @update:section="updateSection"
      ></TodoSectionList>
    </div>
  </div>
</template>

<script scoped>
import TodoList from "./TodoList.vue";
import TodoSectionAdd from "./TodoSectionAdd.vue";
import TodoSectionList from "./TodoSectionList.vue";
export default {
  props: {
    project: {
      default: null,
      validator: v => typeof v === "object" || v === null
    }
  },
  components: {
    TodoList,
    TodoSectionAdd,
    TodoSectionList
  },
  methods: {
    createdSection(section) {
      this.$emit("created:section", section);
    },
    createdTodo(todo, index) {
      this.$emit("created:todo", todo, index);
    },
    updateSection(section, index) {
      this.$emit("update:section", section, index);
    }
  }
};
</script>
