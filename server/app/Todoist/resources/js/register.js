import ajax from "./ajax.js";

new Vue({
    el: "#app",
    data: {
        email: "",
        name: "",
        password: "",
        passwordConfirmation: "",
    },
    methods: {
        register() {
            const data = {
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.passwordConfirmation
            };
            ajax.post("/register", data).then(() => {
                const data = {
                    favorite: 0,
                    name: "インボックス"
                }
                ajax.post("/projects", data).then(response => {
                    location.href = "/home";
                });
            });
        }
    }
});
