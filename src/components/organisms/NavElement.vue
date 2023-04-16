<template>
  <nav>
    <!-- <router-link to="/projects"><button>Projects</button></router-link>
    <router-link to="/contact"><button>Contact</button></router-link> -->
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
  width: 100%;
}
li {
  font-family: Rubik;
  font-size: 2rem;
  list-style: none;
  text-align: right;
}
li:hover {
  background-color: white;
}

</style>
