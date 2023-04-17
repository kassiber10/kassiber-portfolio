import { defineStore } from "pinia";
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
