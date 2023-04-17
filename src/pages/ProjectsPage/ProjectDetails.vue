<template>
  <section>
    <div>
      <h2>{{ title }}</h2>
      <p>{{ description }}</p>
      <p>{{ descLong }}</p>
      <img :src="skills" alt="dev skill icons" />
      <hr />
      <button @click="$emit('back')">Back</button>
      <button><a :href="url" target="_blank">Visit Project</a></button>
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
      location.href = this.url;
      location.target = blank;
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
button {
  margin-right: 1rem;
  margin-bottom: 1rem;
}


</style>
