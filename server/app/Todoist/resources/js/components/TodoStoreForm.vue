<template>
    <div ref="todoForm">
        <div class="border p-2">
            <div contenteditable class="todo-input" @input="inputContent"></div>
        </div>
        <div class="mt-2">
            <button class="button primary" @click="create">タスクを追加</button>
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
            content: ""
        };
    },
    methods: {
        create() {
            const data = {
                content: this.content,
                projectId: this.projectId
            };
            this.$emit("create");
            ajax.post("/todos", data).then(response => {
                this.$emit("created", response.data);
            });
        },
        inputContent(e) {
            e.target.style.width = e.target.clientWidth + "px";
            this.content = e.target.textContent;
        }
    }
};
</script>

<style>
.todo-input {
    outline: none;
}
</style>
