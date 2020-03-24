<template>
    <div class="project-form">
        <div class="border-bottom font-large form-title p-3">
            プロジェクトを追加
        </div>
        <div class="p-3">
            <div class="mx-auto">
                <label for="name-input">プロジェクト名</label>
                <div>
                    <input v-model="name" class="input w-100" type="text" />
                </div>
            </div>
            <div class="mt-3 mx-auto">
                <label>プロジェクトカラー</label>
                <div class="p-relative">
                    <div
                        class="color-input input p-2"
                        @click="colorPicker = true"
                    >
                        <div
                            v-if="selectedColor"
                            class="align-items-center d-flex h-100"
                        >
                            <ColorSample
                                :color="selectedColor.hex"
                                :size="16"
                            ></ColorSample>
                            <span class="ml-2">{{ selectedColor.name }}</span>
                        </div>
                    </div>
                    <ColorPicker
                        v-show="colorPicker"
                        class="left-0 p-absolute top-0 w-100"
                        @input="inputColor"
                    ></ColorPicker>
                </div>
            </div>
            <div class="d-flex mt-3">
                <span class="border button ml-auto" @click="$emit('cancel')"
                    >キャンセル</span
                >
                <div class="button ml-2 mr-1 primary" @click="create">追加</div>
            </div>
        </div>
    </div>
</template>

<script>
import ajax from "../ajax.js";
import ColorPicker from "./ColorPicker.vue";
import ColorSample from "./ColorSample.vue";
export default {
    props: {
        defaultColor: {
            default: null,
            validator: v => typeof v === "object" || v === null
        }
    },
    components: {
        ColorPicker,
        ColorSample
    },
    data() {
        return {
            color: null,
            colorPicker: false,
            name: ""
        };
    },
    computed: {
        selectedColor() {
            return this.color || this.defaultColor;
        }
    },
    created() {
        this.fetchCharcoal();
    },
    methods: {
        create() {
            const data = {
                favorite: 0,
                name: this.name,
                color_id: this.color.id
            };
            ajax.post("/projects", data).then(response => {
                this.$emit("created", response.data);
            });
        },
        fetchCharcoal() {
            const data = {
                name: "チャコール"
            };
            ajax.get("/colors/findOne", data).then(response => {
                this.color = response.data;
            });
        },
        inputColor(color) {
            this.color = color;
            this.colorPicker = false;
        }
    }
};
</script>

<style scoped>
.color-input {
    height: 32px;
}

.form-title {
    background: #fafafa;
}
</style>
