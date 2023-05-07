import { defineStore } from "pinia";
import projects from "../data/projects.json";
export const useProjectsStore = defineStore("projects", {
  state: () => ({
    projectsList: [
      {
        id: 0,
        title: "",
        description: "",
        descLong: "",
        image: [],
        skills: "",
        url: "",
        github: "",
      },
    ],
  }),
  getters: {
    getProjects: (state) => state.fetchProjects(),
    getProject: (state) => {
      return (id) => state.projectsList.find((p) => p.id === id);
    },
  },
  actions: {
    async fetchProjects() {
      this.projectsList = projects;

      return this.projectsList;
    },
  },
});
