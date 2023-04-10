<template>
  <header>
    <section>
      <h1><router-link to="/">Hello, world!</router-link></h1>
      <nav-element></nav-element>
    </section>
  </header>
</template>

<script>
import NavElement from "./NavElement.vue";
export default {
  components: {
    NavElement,
  },
};
</script>

<style scoped>

</style>
