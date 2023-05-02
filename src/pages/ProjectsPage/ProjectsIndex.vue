<template>
  <section>
    <h2 v-if="isLoading">...loading...</h2>
    <h2 v-if="error">{{ error }}</h2>
    <project-card
      class="project-card"
      v-if="!isLoading"
      v-for="project in projects"
      :key="project.id"
      :id="project.id"
      :title="project.title"
      :description="project.description"
      :image="project.image"
      :skills="project.skills"
      @click="$router.push({ name: 'project', params: { id: project.id } })"
    ></project-card>
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
.nested-enter-active .details,
.nested-leave-active .details {
  transition: all 0.3s ease-in-out;
}

.nested-enter-from .details,
.nested-leave-to .details {
  transform: translateX(30px);
  opacity: 0;
}

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
