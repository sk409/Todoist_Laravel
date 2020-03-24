<template>
    <div>
        <div
            v-for="project in projects"
            :key="project.id"
            class="align-items-center d-flex menu-item py-1"
            @click="$emit('selected', project)"
        >
            <ColorSample :color="project.color.hex" :size="12"></ColorSample>
            <span class="ml-3">{{ project.name }}</span>
        </div>
    </div>
</template>

<script>
import ColorSample from "./ColorSample.vue";
export default {
    props: {
        projects: {
            default: () => [],
            type: Array
        }
    },
    components: {
        ColorSample
    }
};
</script>

<style scoped>
.menu-item:hover {
    background: white;
}
</style>
