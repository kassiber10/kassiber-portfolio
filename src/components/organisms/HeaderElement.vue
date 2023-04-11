<template>
  <header>
   
      <h1><router-link to="/">Hello, world!</router-link></h1>
      <nav-element></nav-element>
   
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
header {
  display: flex;
  flex-direction: row;
}
</style>
