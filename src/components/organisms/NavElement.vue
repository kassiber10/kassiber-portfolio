<template>
  <nav>
    <ul>
      <li >
        <router-link to="/projects">Projects</router-link>
      </li>
      <li ><router-link to="/contact">Contact</router-link></li>
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
  width: 100%;
  margin-bottom: 5rem;
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
</style>
