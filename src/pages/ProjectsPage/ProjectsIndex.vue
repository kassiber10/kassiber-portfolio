<template>
  <h2>./Projects</h2>
  <section>
    <project-card
      v-if="!isLoading"
      v-for="project in projects"
      :key="project.title"
      :title="project.title"
      :description="project.description"
      :image="project.image"
      :skills="project.skills"
    ></project-card>
    <p v-else>...loading...</p>
  </section>
</template>

<script>
import ProjectCard from "../../components/molecules/ProjectCard.vue";
export default {
  name: "ProjectsIndex",
  components: { ProjectCard },
  data() {
    return {
      projects: [
        {
          title: "",
          description: "",
          image: "",
          skills: [],
        },
      ],
      isLoading: false,
    };
  },
  async mounted() {
    this.isLoading = true;
    const response = await fetch("../../src/data/projects.json");
    this.projects = await response.json();
    this.isLoading = false;
  },
};
</script>

<style scoped></style>
