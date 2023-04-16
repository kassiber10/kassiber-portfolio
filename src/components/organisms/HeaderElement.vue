<template>
  <header>
    <h1><router-link to="/"><span>Hello, world!</span></router-link></h1>
    <!-- <div> -->
    <nav-element></nav-element>
    <!-- </div> -->
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
  /* margin-bottom: 3rem; */
  /* flex-direction: column; */
}
span {
  font-family: Rubik;
  font-weight: bold;
}
/* div {
  display: flex;
  flex-direction: column;
  width: max(100%, 10rem);
  margin-left: 3rem;
} */
/* h1 {
  display: inline-block;
} */
/* .navi {
  width: max(10rem, 100%);
} */
@media (max-width: 600px) {
  header {
    flex-direction: column;
  }
}
</style>
