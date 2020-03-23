<template>
    <div class="color-sample" :style="style"></div>
</template>

<script>
export default {
    props: {
        color: {
            default: "000000",
            type: String
        },
        size: {
            default: 16,
            type: Number | String
        }
    },
    computed: {
        style() {
            const color =
                this.color.startsWith("rgb") || this.color.startsWith("#")
                    ? this.color
                    : "#" + this.color;
            const size =
                typeof this.size === "number" ? this.size + "px" : this.size;
            return {
                background: color,
                height: size,
                width: size
            };
        }
    }
};
</script>

<style>
.color-sample {
    border-radius: 50%;
    display: inline-block;
}
</style>
