<template>
  <article>
    <h2>{{ title }}</h2>
    <div class="content">
      <p>{{ description }}</p>
      <img :src="image" />
      <img :src="skills" class="skills" />
    </div>
    <PrimaryButton>Details</PrimaryButton>
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
};
</script>

<style scoped>
img {
  width: 100%;
  /* background-color: aquamarine; */
}
img.skills {
  margin-top: 0.5rem;
  width: max(100px, 150px);
}

article {
  border-radius: 4px;
  text-align: left;
  padding: 0 1rem 1rem 0;
  margin: 1rem 3rem 1rem 0;
}
article:hover {
  border-radius: 0;
  border-bottom: 2px solid var(--color-light);
}
button {
  width: 100%;
  margin-top: 1.5rem;
}
@media (max-width: 600px) {
  article {
    margin: 1rem 0 1rem 0;
  }
}
</style>
