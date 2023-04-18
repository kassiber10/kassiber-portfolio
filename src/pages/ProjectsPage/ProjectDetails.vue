<template>
  <section>
    <div>
      <h2>{{ title }}</h2>
      <p>{{ description }}</p>
      <p>{{ descLong }}</p>
      <img :src="skills" alt="dev skill icons" />
      <hr />
      <SecondaryButton @click="$emit('back')">Back</SecondaryButton>
      <PrimaryButton v-if="url" @click="visitProject"
        >Visit Project</PrimaryButton
      >
    </div>
    <div>
      <img :src="image" />
    </div>
  </section>
</template>

<script>
export default {
  name: "ProjectDetails",
  emits: ["back"],
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
  },
  methods: {
    visitProject() {
      window.open(this.url, "_blank");
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
  width: 90%;
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
@media (max-width: 600px) {
  div:first-of-type {
    width: 100%;
  }
}
</style>
