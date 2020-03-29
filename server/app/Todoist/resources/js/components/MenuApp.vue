<template>
  <div class="menu-app">
    <div
      v-for="menuItem in menuItems"
      :key="menuItem.title"
      class="menu-item"
      v-text="menuItem.title"
    ></div>
    <div>
      <CollapseView @open="fetchProjects">
        <template #header>
          <div class="align-items-center d-flex">
            <span class="font-weight-bold ml-1">プロジェクト</span>
            <span class="button material-icons ml-auto mr-1" @click.stop="dialogProject = true">add</span>
          </div>
        </template>
        <template #content>
          <ProjectList :projects="projects" class="mt-2" @selected="selectedProject"></ProjectList>
        </template>
      </CollapseView>
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
import ajax from "../ajax.js";
import CollapseView from "./CollapseView.vue";
import DialogView from "./DialogView.vue";
import ProjectStoreForm from "./ProjectStoreForm.vue";
import ProjectList from "./ProjectList.vue";
export default {
  props: {
    defaultColor: {
      default: null,
      validator: v => typeof v === "object" || v === null
    },
    defaultProject: {
      default: null,
      validator: v => typeof v === "object" || v === null
    },
    user: {
      required: true,
      type: Object
    }
  },
  components: {
    CollapseView,
    DialogView,
    ProjectStoreForm,
    ProjectList
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
      ],
      projects: []
    };
  },
  methods: {
    createdProject(project) {
      const data = {
        id: project.id
      };
      ajax.get("/projects/findByIdSuperficial", data).then(response => {
        this.projects.push(response.data);
      });
    },
    fetchProjects() {
      if (this.projects.length !== 0) {
        return;
      }
      const data = {
        userId: this.user.id
      };
      ajax.get("/projects/findByUserIdSuperficial", data).then(response => {
        this.projects = response.data.filter(
          project =>
            this.defaultProject === null ||
            project.id !== this.defaultProject.id
        );
      });
    },
    selectedProject(project) {
      this.$emit("selected:project", project);
    }
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
