<template>
  <section>
    
    <div>
      <h2>{{ title }}</h2>
      <p><strong>{{ description }}</strong></p>
      <p>{{ descLong }}</p>
      <img :src="skills" class="skills" alt="dev skill icons" />
      <hr />
      <SecondaryButton @click="$emit('back')">Back</SecondaryButton>
      <PrimaryButton v-if="url" @click="visitProject"
        >Visit Project</PrimaryButton
      >
      <PrimaryButton v-if="github" @click="visitGithub"
        >Visit GitHub</PrimaryButton
      >
    </div>
    <div>
      <img :src="image" @click="showModal = true"/>
    </div>
  </section>
  <section v-if="showModal">
    <PicturesModal @close="showModal = false" :fullSizeUrl="image" :projectTitle="title" />
  </section>
</template>

<script>
import PicturesModal from "./PicturesModal.vue";

export default {
  name: "ProjectDetails",
  components: { PicturesModal },
  emits: ["back"],
  data() {
    return {
      showModal: false,
    };
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
    descLong: {
      type: String,
      required: false,
    },
    image: {
      type: String,
      required: true,
    },
    skills: {
      type: String,
      required: true,
    },
    url: {
      type: String,
      required: false,
    },
    github: {
      type: String,
      required: false,
    },
  },
  methods: {
    visitProject() {
      window.open(this.url, "_blank");
    },
    visitGithub() {
      window.open(this.github, "_blank");
    },
  },
};
</script>

<style scoped>
img {
  box-sizing: border-box;
  max-width: 100%;
}
div:first-of-type {
  margin-right: 2rem;
}

div {
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
@media (max-width: 600px) {
  div:first-of-type {
    margin-right: 0;
  }
}
</style>
