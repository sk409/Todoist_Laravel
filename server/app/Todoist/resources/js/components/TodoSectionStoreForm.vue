<template>
  <div ref="todoForm">
    <div class="border p-2">
      <div contenteditable class="name-input" @input="inputName"></div>
    </div>
    <div class="mt-2">
      <button class="button primary" @click="create">セクションを追加</button>
      <button class="button" @click="$emit('cancel')">キャンセル</button>
    </div>
  </div>
</template>

<script>
import ajax from "../ajax.js";
export default {
  props: {
    projectId: {
      required: true,
      validator: v => typeof v === "number" || v === null
    }
  },
  data() {
    return {
      name: ""
    };
  },
  methods: {
    create() {
      const data = {
        name: this.name,
        projectId: this.projectId
      };
      ajax.post("/todoSections", data).then(response => {
        this.$emit("created", response.data);
      });
    },
    inputName(e) {
      e.target.style.width = e.target.clientWidth + "px";
      this.name = e.target.textContent;
    }
  }
};
</script>

<style scoped>
.name-input {
  outline: none;
}
</style>
