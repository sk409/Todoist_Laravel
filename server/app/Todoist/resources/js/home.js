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
        createdSection(section) {
            section.todos = [];
            this.project.sections.push(section);
        },
        createdTodo(todo, index) {
            if (index === undefined) {
                this.project.todos.push(todo);
            } else {
                this.project.sections[index].todos.push(todo);
            }
        },
        selectedProject(project) {
            this.project = project;
        },
        updateSection(section, index) {
            this.$set(this.project.sections, index, section);
        }
    }
});
