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
  /* max-width: 5rem;   */
}
/* img.skills  {
  
  margin-right: 5.5rem;
  padding-right: 5.5rem;

} */
article {
  /* background-color: darkcyan; */
  /* flex-direction: row; */
  /* max-width: 50%; */
  border-radius: 4px;
  text-align: left;
  padding: 1rem 1rem 1rem 0;
  margin: 1rem 1rem 1rem 0;
}
article:hover {
  border: 1px solid var(--color-white);
 
}
button {
  width: 100%;
  margin-top: .5rem;
}
</style>
