import { createRouter, createWebHistory } from "vue-router";

import ProjectsIndex from "./pages/ProjectsPage/ProjectsIndex.vue";
import ProjectDetails from "./pages/ProjectsPage/ProjectDetails.vue"
import LandingPage from "./pages/LandingPage.vue";
import ContactIndex from "./pages/ContactPage/ContactIndex.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/projects", name: "projects", component: ProjectsIndex },
    { path: "/", name: "root", component: LandingPage },
    { path: "/contact", name: "contact", component: ContactIndex },
  ],
});

export default router;
