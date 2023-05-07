import { createApp } from "vue";
import { createPinia } from "pinia";
import router from "./router";
import App from "./App.vue";
import "./assets/style.css";
import BasicSpinner from "./components/atoms/BasicSpinner.vue";
import PrimaryButton from "./components/atoms/PrimaryButton.vue";
import SecondaryButton from "./components/atoms/SecondaryButton.vue";

const app = createApp(App);
const pinia = createPinia();

app.use(router);
app.use(pinia);

app.component("BasicSpinner", BasicSpinner);
app.component("PrimaryButton", PrimaryButton);
app.component("SecondaryButton", SecondaryButton);

app.mount("#app");
