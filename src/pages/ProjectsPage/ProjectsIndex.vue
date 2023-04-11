<template>
  <h2>./Projects</h2>
  <section>
    <project-card
      v-if="!isLoading && !projectToLoad"
      v-for="project in projects"
      :key="project.id"
      :title="project.title"
      :description="project.description"
      :image="project.image"
      :skills="project.skills"
      @click="loadProjectDetail(project.id)"
    ></project-card>
    <p v-if="isloading">...loading...</p>
    <project-details
      v-if="projectToLoad"
      :id="projectToLoad.id"
      :title="projectToLoad.title"
      :description="projectToLoad.description"
      :image="projectToLoad.image"
      :skills="projectToLoad.skills"
      @back="back"
    ></project-details>
  </section>
</template>

<script>
import ProjectCard from "../../components/molecules/ProjectCard.vue";
import ProjectDetails from "./ProjectDetails.vue";
import { mapStores } from "pinia";
import { useProjectsStore } from "../../stores/projects";
export default {
  name: "ProjectsIndex",
  components: { ProjectCard, ProjectDetails },
  data() {
    return {
      projects: [
        {
          id: "",
          title: "",
          description: "",
          image: "",
          skills: [],
        },
      ],
      projectToLoad: undefined,
      isLoading: false,
    };
  },
  async mounted() {
    // load projects from pinia
    this.isLoading = true;
    this.projects = await this.projectsStore.getProjects;
    this.isLoading = false;
  },
  methods: {
    loadProjectDetail(id) {
      if (this.projects) {
        this.projectToLoad = this.projects.find((p) => p.id == id);
        
      }
    },
    back() {
      this.projectToLoad = !this.projectToLoad;
    }
  },
  computed: {
    ...mapStores(useProjectsStore),
  },
};
</script>

<style scoped></style>
