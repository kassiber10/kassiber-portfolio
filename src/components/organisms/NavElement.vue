<template>
  <nav>
    <ul>
      <li><router-link to="/projects">Projects</router-link></li>
      <li><router-link to="/contact">Contact</router-link></li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "NavElement",
};
</script>

<style scoped>
nav {
  background-color: aquamarine;
}
ul {
  font-family: "Rubik", sans-serif;
  font-size: 1.5rem;
  list-style: none;
}
</style>
