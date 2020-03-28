<template>
  <div>
    <div v-show="!todoSectionStoreForm" @click="todoSectionStoreForm = true">
      <div class="align-items-center d-flex add-section">
        <span class="divider flex-fill primary"></span>
        <span class="mx-2 primary-text">セクションを追加</span>
        <span class="divider flex-fill primary"></span>
      </div>
    </div>
    <div v-show="todoSectionStoreForm" class="mt-3">
      <TodoSectionStoreForm :project-id="projectId" @created="created"></TodoSectionStoreForm>
    </div>
  </div>
</template>

<script>
import TodoSectionStoreForm from "./TodoSectionStoreForm.vue";
export default {
  props: {
    projectId: {
      required: true,
      validator: v => typeof v === "number" || v === null
    }
  },
  components: {
    TodoSectionStoreForm
  },
  data() {
    return {
      todoSectionStoreForm: false
    };
  },
  methods: {
    created(section) {
      this.todoSectionStoreForm = false;
      this.$emit("created", section);
    }
  }
};
</script>

<style scoped>
.add-section {
  opacity: 0;
  transition: 0.25s;
}

.add-section:hover {
  opacity: 1;
}

.divider {
  height: 1px;
}
</style>
