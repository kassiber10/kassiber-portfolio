<template>
  <header-element></header-element>
  <main>
    <router-view></router-view>
  </main>
</template>

<script>
import HeaderElement from "./components/organisms/HeaderElement.vue";
export default {
  components: {
    HeaderElement,
  },
};
</script>

<style scoped></style>
