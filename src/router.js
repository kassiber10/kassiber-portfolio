import { createRouter, createWebHistory } from "vue-router";

import ProjectsIndex from "./pages/ProjectsPage/ProjectsIndex.vue";
import ProjectDetails from "./pages/ProjectsPage/ProjectDetails.vue"
import LandingPage from "./pages/LandingPage.vue";
import ContactIndex from "./pages/ContactPage/ContactIndex.vue";
// import PortfolioPage from "./pages/PortfolioPage/PortfolioIndex.vue";
// import GaleriePage from "./pages/GaleriePage/GalerieIndex.vue";
// import PricesPage from "./pages/PricesPage/PricesIndex.vue";
// import AboutPage from "./pages/AboutPage/AboutIndex.vue";
// import ContactPage from "./pages/ContactPage/ContactIndex.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/projects", name: "projects", component: ProjectsIndex },
    { path: "/project/:id", name: "project", component: ProjectDetails },
    { path: "/", name: "root", component: LandingPage },
    { path: "/contact", name: "contact", component: ContactIndex },
    // { path: "/portfolio", component: PortfolioPage },
    // { path: "/galeries", component: GaleriePage },
    // { path: "/prices", component: PricesPage },
    // { path: "/about", component: AboutPage },
    // { path: "/contact", component: ContactPage },
  ],
});

export default router;
