<template>
  <div class="border color-picker white" :style="style">
    <div
      v-for="color in colors"
      :key="color.id"
      class="align-items-center color-item cursor-pointer d-flex p-2"
      @click="clickColorItem(color)"
    >
      <ColorSample :color="color.hex"></ColorSample>
      <span class="ml-2">{{ color.name }}</span>
    </div>
  </div>
</template>

<script>
import ajax from "../ajax.js";
import ColorSample from "./ColorSample.vue";
export default {
  props: {
    height: {
      default: 128,
      type: Number | String
    }
  },
  components: {
    ColorSample
  },
  data() {
    return {
      colors: []
    };
  },
  computed: {
    style() {
      const height =
        typeof this.height === "number" ? this.height + "px" : this.height;
      return {
        height
      };
    }
  },
  created() {
    ajax.get("/colors").then(response => {
      this.colors = response.data;
    });
  },
  methods: {
    clickColorItem(color) {
      this.$emit("input", color);
    }
  }
};
</script>

<style scoped>
.color-item:hover {
  background: #f0f0f0;
}

.color-picker {
  border-radius: 8px;
  overflow-y: scroll;
}
</style>
