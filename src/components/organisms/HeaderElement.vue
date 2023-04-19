<template>
  <header>
    <h1>
      <router-link to="/"><span>Hello, I'm Alex</span></router-link>
    </h1>
    <h5>new WebDeveloper();</h5>
  </header>
  <nav-element></nav-element>
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
  background-image: repeating-linear-gradient(
    45deg,
    rgba(250, 250, 250, 0.07) 0,
    rgba(250, 250, 250, 0.07) 1px,
    transparent 0,
    transparent 50%
  );
  background-size: 9px 9px;
  font-family: "Rubik", cursive;
  font-size: max(3vw, 2rem);
  text-transform: uppercase;
  margin-bottom: 2rem;
  padding: 2rem;
  border-radius: 10px;
  flex-wrap: wrap;
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
h5 {
  text-transform: none;
  margin: 0;
  font-size: clamp(3.5vw, 2rem, 1.5rem);
  font-weight: 300;
}
.breadcrumb {
  text-transform: uppercase;
}
.breadcrumb::before {
  content: ":: ";
}
</style>
