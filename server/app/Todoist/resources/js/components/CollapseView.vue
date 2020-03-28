<template>
  <div>
    <div class="align-items-center d-flex menu-item">
      <span :class="collapserClass" class="material-icons" @click="toggle">chevron_right</span>
      <div class="border-bottom flex-fill">
        <slot name="header"></slot>
      </div>
    </div>
    <div v-show="open">
      <slot name="content"></slot>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      collapserClass: [],
      open: false
    };
  },
  methods: {
    toggle() {
      this.open = !this.open;
      if (this.open) {
        this.collapserClass = "open-animation";
        this.$emit("open");
      } else {
        this.collapserClass = "close-animation";
        this.$emit("close");
      }
    }
  }
};
</script>

<style scoped>
.close-animation {
  animation: close 0.25s;
  animation-fill-mode: forwards;
}

.open-animation {
  animation: open 0.25s;
  animation-fill-mode: forwards;
}

@keyframes close {
  0% {
    transform: rotate(90deg);
  }
  100% {
    transform: rotate(0deg);
  }
}

@keyframes open {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(90deg);
  }
}
</style>
