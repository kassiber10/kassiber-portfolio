<template>
  <section>
    <project-card
    class="project-card"
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
      :descLong="projectToLoad.descLong"
      :image="projectToLoad.image"
      :skills="projectToLoad.skills"
      :url="projectToLoad.url"
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
      error: "",
    };
  },
  async mounted() {
    // load projects from pinia
    this.isLoading = true;
    try {
      this.projects = await this.projectsStore.getProjects;
    } catch (error) {
      this.error = error.message || "Something went wrong!";
    }

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
    },
  },
  computed: {
    ...mapStores(useProjectsStore),
  },
};
</script>

<style scoped>
.project-card:last-child {
  margin-right: 0;

}
h2 {
  text-align: right;
  /* background-color: var(--color-white); */
  border-bottom: 1px dashed var(--color-white);
}

</style>
