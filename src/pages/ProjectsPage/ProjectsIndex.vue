<template>
  <section>
    <h2 v-if="isLoading">...loading...</h2>
    <!-- <img v-if="isLoading" src="../../assets/images/site/skateboarding.gif" /> -->
    <h2 v-if="error">{{ error }}</h2>
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
    <project-details
      v-if="projectToLoad"
      :id="projectToLoad.id"
      :title="projectToLoad.title"
      :description="projectToLoad.description"
      :descLong="projectToLoad.descLong"
      :image="projectToLoad.image"
      :skills="projectToLoad.skills"
      :url="projectToLoad.url"
      :github="projectToLoad.github"
      @back="back"
    ></project-details>
  </section>
</template>

<script>
import { mapStores } from "pinia";
import { useProjectsStore } from "../../stores/projects";
import ProjectCard from "../../components/molecules/ProjectCard.vue";
import ProjectDetails from "./ProjectDetails.vue";
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
          skills: "",
        },
      ],
      projectToLoad: undefined,
      isLoading: false,
      error: "",
    };
  },
  async mounted() {
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
.project-card:nth-of-type(even) {
  margin-right: 0;
}
section {
  display: grid;
  grid-template-columns: auto auto;
}
.project-card {
  min-width: 200px;
}
h2 {
  text-align: right;
  border-bottom: 1px dashed var(--color-white);
}

@media (max-width: 600px) {
  section {
    grid-template-columns: auto;
  }
  article {
    margin-bottom: 3.5rem;
  }
}
</style>
