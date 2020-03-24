<template>
    <div class="menu-app">
        <div
            v-for="menuItem in menuItems"
            :key="menuItem.title"
            class="menu-item"
            v-text="menuItem.title"
        ></div>
        <div>
            <div
                class="align-items-center border-bottom d-flex menu-item"
                @click="toggleProjectList"
            >
                <span :class="projectMenuIconClass" class="material-icons">
                    chevron_right
                </span>
                <span class="font-weight-bold ml-1">プロジェクト</span>
                <span
                    class="button material-icons ml-auto mr-1"
                    @click.stop="dialogProject = true"
                    >add</span
                >
            </div>
            <ProjectList
                v-show="openProject"
                :projects="projects"
                class="mt-2"
                @selected="selectedProject"
            ></ProjectList>
        </div>
        <DialogView v-model="dialogProject">
            <ProjectStoreForm
                :default-color="defaultColor"
                class="white"
                @cancel="dialogProject = false"
                @created="createdProject"
            ></ProjectStoreForm>
        </DialogView>
    </div>
</template>

<script>
import DialogView from "./DialogView.vue";
import ProjectStoreForm from "./ProjectStoreForm.vue";
import ProjectList from "./ProjectList.vue";
export default {
    props: {
        defaultColor: {
            default: null,
            validator: v => typeof v === "object" || v === null
        }
    },
    components: {
        DialogView,
        ProjectStoreForm,
        ProjectList
    },
    data() {
        return {
            createdProject() {
                location.href = location.href;
            },
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
            ],
            openProject: false,
            projectMenuIconClass: [],
            projects: []
        };
    },
    methods: {
        selectedProject(project) {
            this.$emit("selected:project", project);
        },
        toggleProjectList() {
            this.openProject = !this.openProject;
            this.projectMenuIconClass = this.openProject
                ? "open-animation"
                : "close-animation";
        }
    }
};
</script>

<style scoped>
.close-animation {
    animation: close 0.25s;
    animation-fill-mode: forwards;
}

.menu-item {
    padding: 0.5rem;
}

.menu-item:hover {
    background: white;
}

.project-form {
    width: 50%;
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
