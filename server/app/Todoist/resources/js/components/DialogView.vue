<template>
    <transition>
        <div
            v-if="value"
            class="align-items-center d-flex dialog-view justify-content-center"
            @click="click"
        >
            <slot></slot>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        value: {
            default: false,
            type: Boolean
        }
    },
    methods: {
        click(e) {
            if (e.target !== this.$el) {
                return;
            }
            this.$emit("input", false);
        }
    }
};
</script>

<style scoped>
.dialog-view {
    background: rgba(0, 0, 0, 0.5);
    height: 100vh;
    left: 0;
    position: absolute;
    top: 0;
    width: 100vw;
}

.v-enter,
.v-leave-to {
    opacity: 0;
}

.v-enter-to,
.v-leave {
    opacity: 1;
}

.v-enter-active,
.v-leave-active {
    transition: all 0.5s;
}
</style>
