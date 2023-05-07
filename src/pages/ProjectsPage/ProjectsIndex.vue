<template>
  <section>
    <BasicSpinner v-if="isLoading" />
    <project-card v-else
    class="project-card"
    v-for="project in projects"
    :key="project.id"
    :id="project.id"
    :title="project.title"
    :description="project.description"
    :image="project.image"
    :skills="project.skills"
    @click="$router.push({ name: 'project', params: { id: project.id } })"
    ></project-card>
    <h2 v-if="error">{{ error }}</h2>
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
          id: 0,
          title: "",
          description: "",
          image: [],
          skills: "",
        },
      ],
      isLoading: false,
      error: "",
    };
  },

  async mounted() {
    this.isLoading = true;
    try {
      this.projects = await this.projectsStore.getProjects;
      for (let i in this.projects) {
        const img = new Image();
        img.src = this.projects[i].image[0].src;
        await img.decode();
      }
    } catch (error) {
      this.error = error.message || "Something went wrong!";
    }
    this.isLoading = false;
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
