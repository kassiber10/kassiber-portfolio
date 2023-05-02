<template>
  <div>
    <section>
      <div>
        <h2>{{ projectToLoad.title }}</h2>
        <p>
          <strong>{{ projectToLoad.description }}</strong>
        </p>
        <p>{{ projectToLoad.descLong }}</p>
        <img :src="projectToLoad.skills" class="skills" alt="dev skill icons" />
        <hr />
        <SecondaryButton @click="$router.push({ name: 'projects' })"
          >Back</SecondaryButton
        >
        <PrimaryButton v-if="projectToLoad.url" @click="visitProject"
          >Visit Project</PrimaryButton
        >
        <PrimaryButton v-if="projectToLoad.github" @click="visitGithub"
          >Visit GitHub</PrimaryButton
        >
      </div>
      <div class="prev-img" @click="showModal = true">
        <img :src="imageToLoad" />
      </div>
    </section>
    <section v-if="showModal">
      <PicturesModal
        @close="showModal = false"
        :fullSizeUrl="projectToLoad.image"
        :projectTitle="projectToLoad.title"
        :id="projectToLoad.id"
      />
    </section>
  </div>
</template>

<script>
import { mapStores } from "pinia";
import { useProjectsStore } from "../../stores/projects";
import PicturesModal from "./PicturesModal.vue";
export default {
  name: "ProjectDetails",
  components: { PicturesModal },
  data() {
    return {
      projectToLoad: {},
      imageToLoad: "",
      showModal: false,
      show: false,
    };
  },
  methods: {
    visitProject() {
      window.open(this.url, "_blank");
    },
    visitGithub() {
      window.open(this.github, "_blank");
    },
    loadProject() {
      const id = Number(this.$route.params.id);
      this.projectToLoad = this.projectsStore.getProject(id);
    },
    loadImage() {
      this.imageToLoad = this.projectToLoad.image[0].src;
    },
  },
  async mounted() {
    this.isLoading = true;
    try {
      this.projects = await this.projectsStore.getProjects;
      this.loadProject();
      this.loadImage();
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
img {
  box-sizing: border-box;
  max-width: 100%;
  cursor: pointer;
}
.prev-img {
  text-align: right;
}
.prev-img::after {
  content: "➔ view more images";
}
.prev-img:hover {
  content: "➔ more images";
  color: var(--color-light);
  cursor: pointer;
}

div:first-of-type {
  margin-right: 2rem;
}

div {
  box-sizing: border-box;
  flex-direction: column;
  text-align: left;
  width: 100%;
}
p {
  text-align: left;
}
button {
  margin-right: 1rem;
  margin-bottom: 1rem;
}
strong {
  font-weight: bold;
}
.skills {
  margin-top: 1rem;
}

.fade-enter-active {
  animation: bounce-in 0.5s;
}
.fade-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}
@media (max-width: 600px) {
  div:first-of-type {
    margin-right: 0;
  }
}
</style>
