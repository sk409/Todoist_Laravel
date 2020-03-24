<template>
    <div class="d-flex">
        <div
            class="d-flex align-items-center justify-content-center checkbox round"
        >
            ✓
        </div>
        <div class="ml-3">
            <pre>{{ todo.content }}</pre>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        todo: {
            required: true,
            type: Object
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
