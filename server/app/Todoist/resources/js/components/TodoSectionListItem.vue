<template>
  <div>
    <CollapseView @open="fetchTodo">
      <template #header>
        <div>
          <span class="font-weight-bold">{{ section.name }}</span>
        </div>
      </template>
      <template #content>
        <div v-if="fetched">
          <TodoList
            :project-id="projectId"
            :section-id="section.id"
            :todos="section.todos"
            class="mt-3"
            @created:todo="createdTodo"
          ></TodoList>
          <TodoSectionAdd :project-id="projectId" @created="createdSection"></TodoSectionAdd>
        </div>
      </template>
    </CollapseView>
  </div>
</template>

<script>
import ajax from "../ajax.js";
import CollapseView from "./CollapseView.vue";
import TodoAdd from "./TodoAdd.vue";
import TodoList from "./TodoList.vue";
import TodoSectionAdd from "./TodoSectionAdd.vue";
export default {
  props: {
    projectId: {
      required: true,
      validator: v => typeof v === "number" || v === null
    },
    section: {
      required: true,
      type: Object
    }
  },
  components: {
    CollapseView,
    TodoAdd,
    TodoList,
    TodoSectionAdd
  },
  data() {
    return {
      fetched: false,
      opened: false
    };
  },
  methods: {
    createdSection(section) {
      this.$emit("created:section", section);
    },
    createdTodo(todo) {
      this.$emit("created:todo", todo);
    },
    fetchTodo() {
      if (this.opened) {
        return;
      }
      this.opened = true;
      const data = {
        id: this.section.id
      };
      ajax.get("/todoSections/forHomeOne", data).then(response => {
        this.fetched = true;
        this.$emit("update:section", response.data);
      });
    }
  }
};
</script>
