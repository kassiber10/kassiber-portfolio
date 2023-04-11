import { defineStore } from "pinia";

// You can name the return value of `defineStore()` anything you want,
// but it's best to use the name of the store and surround it with `use`
// and `Store` (e.g. `useUserStore`, `useCartStore`, `useProductStore`)
// the first argument is a unique id of the store across your application
export const useProjectsStore = defineStore("projects", {
  state: () => ({
    projectsList: [
      {
        title: "",
        description: "",
        image: "",
        skills: [],
      },
    ],
  }),
  getters: {
    getProjects: (state) => state.fetchProjects(),
  },
  actions: {
    async fetchProjects() {
        const response = await fetch("../src/data/projects.json");
        // console.log(response);
        this.projectsList = await response.json();
        return this.projectsList;
        // console.log(this.projectsList);
    },
  },
});
