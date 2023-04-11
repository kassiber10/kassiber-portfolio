<template>
  <article>
    <h2>{{ title }}</h2>
    <div class="content">
      <p>Description: {{ description }}</p>
      <img :src="image" />
      <img :src="skills" class="skills" />
      <!-- <ul>
        <li v-for="skill in skills" :key="skill">{{ skill }}</li>
      </ul> -->
    </div>
    <button>Details</button>
  </article>
</template>

<script>
export default {
  name: "ProjectCard",
  props: {
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
  methods: {},
};
</script>

<style scoped>
img {
  width: 100%;
  
  /* background-color: aquamarine; */
}
.skills {
  margin-top: .5rem;
  max-width: 10rem;
  
}
article {
  /* background-color: darkcyan; */
  /* flex-direction: row; */
  /* max-width: 50%; */
  border-radius: 4px;
  text-align: left;
  padding: 1rem;
  margin: 1rem;
}
article:hover {
  border: 1px solid var(--color-white);
 
}
button {
  width: 100%;
  margin-top: .5rem;
}
</style>
