import MenuApp from "./components/MenuApp.vue";
import NavbarApp from "./components/NavbarApp.vue";
import TodoProject from "./components/TodoProject.vue";

new Vue({
    el: "#app",
    components: {
        MenuApp,
        NavbarApp,
        TodoProject
    },
    data: {
        project: null
    },
    mounted() {
        const defaultProjectJSON = this.$refs.defaultProjectJSON.textContent;
        this.project = JSON.parse(defaultProjectJSON);
    },
    methods: {
        createdTodo(todo) {
            this.project.todos.push(todo);
        },
        selectedProject(project) {
            this.project = project;
        }
    }
});
