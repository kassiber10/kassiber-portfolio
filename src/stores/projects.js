import { defineStore } from "pinia";
import projects from "../data/projects.json";
export const useProjectsStore = defineStore("projects", {
  state: () => ({
    projectsList: [
      {
        title: "",
        description: "",
        descLong: "",
        image: "",
        skills: "",
        url: "",
        github: "",
      },
    ],
  }),
  getters: {
    getProjects: (state) => state.fetchProjects(),
  },
  actions: {
    async fetchProjects() {
      // const response = await fetch("./src/data/projects.json");
      // this.projectsList = await response.json();
      this.projectsList = projects;
      return this.projectsList;
    },
  },
});
