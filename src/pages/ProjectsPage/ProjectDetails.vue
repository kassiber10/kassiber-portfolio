<template>
  <section>
    <div>
      <h2>{{ title }}</h2>
      <p>{{ description }}</p>
      <img :src="skills" alt="dev skill icons" />
      <hr />
      <button @click="$emit('back')">back</button>
    </div>
    <div>
      <img :src="image" />
    </div>
  </section>
</template>

<script>
export default {
  name: "ProjectDetails",
  emits: "back",
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
    image: {
      type: String,
      required: true,
    },
    skills: {
      type: String,
      required: true,
    },
  },
};
</script>

<style scoped>

img {
  max-width: 100%;
}
div {
  flex-direction: column;
  text-align: left;
  margin: 1rem;
  /* background-color: white; */
  width: 100%;
}
p {
  text-align: left;
}
</style>
