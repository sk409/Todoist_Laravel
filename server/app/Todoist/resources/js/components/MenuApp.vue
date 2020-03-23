<template>
    <div class="menu-app">
        <div
            v-for="menuItem in menuItems"
            :key="menuItem.title"
            class="menu-item"
            v-text="menuItem.title"
        ></div>
        <div class="align-items-center border-bottom d-flex menu-item">
            <span class="material-icons">
                chevron_right
            </span>
            <span class="font-weight-bold ml-1">プロジェクト</span>
            <span
                class="button material-icons ml-auto mr-1"
                @click="dialogProject = true"
                >add</span
            >
        </div>
        <DialogView v-model="dialogProject">
            <ProjectForm class="white"></ProjectForm>
        </DialogView>
    </div>
</template>

<script>
import DialogView from "./DialogView.vue";
import ProjectForm from "./ProjectForm.vue";
export default {
    components: {
        DialogView,
        ProjectForm
    },
    data() {
        return {
            dialogProject: false,
            menuItems: [
                {
                    title: "インボックス"
                },
                {
                    title: "今日"
                },
                {
                    title: "次の7日間"
                }
            ]
        };
    }
};
</script>

<style scoped>
.menu-item {
    padding: 0.5rem;
}

.menu-item:hover {
    background: white;
}

.project-form {
    width: 50%;
}
</style>
