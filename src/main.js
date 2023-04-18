import { createApp } from "vue";
import { createPinia } from "pinia";
import router from "./router";
import App from "./App.vue";
import "./assets/style.css";
import PrimaryButton from "./components/Atoms/PrimaryButton.vue";
import SecondaryButton from "./components/Atoms/SecondaryButton.vue";

const app = createApp(App);
const pinia = createPinia();

app.use(router);
app.use(pinia);

app.component("PrimaryButton", PrimaryButton);
app.component("SecondaryButton", SecondaryButton);

app.mount("#app");
