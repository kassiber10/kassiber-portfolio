<template>
  <header>
    <h1>
      <router-link to="/" @click="breadcrumb = ''"
        ><span>Hello, world!</span></router-link
      >
    </h1>
    <!-- <div> -->
    <nav-element @clicked-link="clickedLink"></nav-element>
    <!-- </div> -->
  </header>
  <h2 v-if="breadcrumb" class="breadcrumb">{{ breadcrumb }}</h2>
</template>

<script>
import NavElement from "./NavElement.vue";
export default {
  components: {
    NavElement,
  },
  data() {
    return {
      breadcrumb: "",
    };
  },
  methods: {
    clickedLink(e) {
      this.breadcrumb = e;
    },
  },
};
</script>

<style scoped>
header {
  display: flex;
}
span {
  font-family: Rubik;
  font-weight: bold;

  --color-1: #186cb8;
  --color-2: #2a9a9f;
  --color-3: #f1b211;
  --color-4: #e83611;
  --color-5: #f9002f;

  background: linear-gradient(
    206deg,
    var(--color-1) 19%,
    transparent 19%,
    transparent 20%,
    var(--color-2) 20%,
    var(--color-2) 39%,
    transparent 39%,
    transparent 40%,
    var(--color-3) 40%,
    var(--color-3) 59%,
    transparent 59%,
    transparent 60%,
    var(--color-4) 60%,
    var(--color-4) 79%,
    transparent 79%,
    transparent 80%,
    var(--color-5) 80%
  );
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
}
h1 {
  margin: 0;
}
.breadcrumb {
  text-transform: uppercase;
}
.breadcrumb::before {
  content: ":: ";
}
/* .navi {
  width: max(10rem, 100%);
} */
@media (max-width: 600px) {
  header {
    flex-direction: column;
  }
}
</style>
