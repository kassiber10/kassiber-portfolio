<template>
  <nav>
    <ul>
      <li @click="$emit('clickedLink', 'projects')">
        <router-link to="/projects">Projects</router-link>
      </li>
      <li @click="$emit('clickedLink', 'contact')"><router-link to="/contact">Contact</router-link></li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "NavElement",
  emits: ["clickedLink"],
};
</script>

<style scoped>
nav {
  width: 100%;
  margin-bottom: 3rem;
}

li {
  font-family: Rubik;
  font-size: clamp(2rem, .8vw, 1rem);
  list-style: none;
  text-align: right;
  border-bottom: 1px dashed var(--color-medium);
}

li:hover::before {
  content: "➔ ";
  color: var(--color-light);
}

ul {
  padding: 0;
}
/* @media (max-width: 600px) {
  header {
    flex-direction: column;
  }
} */
</style>
