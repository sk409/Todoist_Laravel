<template>
  <div class="d-flex">
    <div class="d-flex align-items-center justify-content-center checkbox round" @click="complete">✓</div>
    <div ref="content" class="ml-3 word-break-all">{{ todo.content }}</div>
  </div>
</template>

<script>
import ajax from "../ajax.js";
export default {
  props: {
    todo: {
      required: true,
      type: Object
    }
  },
  methods: {
    complete() {
      const padding = n => (n < 10 ? `0${n}` : n);
      const date = new Date();
      const y = date.getFullYear();
      const m = padding(date.getMonth() + 1);
      const d = padding(date.getDate());
      const h = padding(date.getHours());
      const mi = padding(date.getMinutes());
      const s = padding(date.getSeconds());
      const data = {
        completedAt: `${y}-${m}-${d} ${h}:${mi}:${s}`
      };
      ajax.put(`/todos/${this.todo.id}`, data);
    }
  }
};
</script>

<style>
.checkbox {
  border: 2px solid #a6a6a6;
  color: transparent;
  height: 18px;
  width: 18px;
}

.checkbox:hover {
  background: #e6e6e6;
  color: #a6a6a6;
}
</style>
