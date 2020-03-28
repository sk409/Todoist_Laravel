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
            ajax.post("/register", data).then(async () => {
                // const data = {
                //     hex: "808080"
                // };
                // const response = await ajax.get("/colors/findOne", data);
                // return response.data;
            }).then(async color => {
                // const data = {
                //     favorite: 0,
                //     name: "インボックス",
                //     colorId: color.id
                // }
                // await ajax.post("/projects", data);
            }).then(() => {
                location.href = "/home";
            });
        }
    }
});
