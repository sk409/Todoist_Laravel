<template>
  <div>
    <div v-for="(section, index) in sections" :key="section.id">
      <TodoSectionListItem
        :project-id="projectId"
        :section="section"
        class="mb-5"
        @created:section="createdSection"
        @created:todo="createdTodo($event, index)"
        @update:section="updateSection($event, index)"
      ></TodoSectionListItem>
    </div>
  </div>
</template>

<script>
import TodoSectionListItem from "./TodoSectionListItem.vue";
export default {
  props: {
    projectId: {
      required: true,
      validator: v => typeof v === "number" || v === null
    },
    sections: {
      default: () => [],
      type: Array
    }
  },
  components: {
    TodoSectionListItem
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
