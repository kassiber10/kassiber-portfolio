<template>
  <section>
    <h1>My name is Alex!</h1>
    <img src="../assets/images/ak.png" />
    <h3>I'm a Fullstack Developer who likes Frontends:)</h3>
    <p>
      I’ve recently finished the academic program for Webdevelopment at
      FH Technikum Vienna. I have most experience in frontend development and
      strong design background due to my previous experiences. I prefer working
      with Vue.js as a Framework. Basically I'm learning constantly - recently
      I’m improving my backend skills and learning Svelte Kit. 
      <h3>What I am looking
      for...</h3><p> I'm looking for a Junior Frontend Position with professional
      development prospects in which I’ll be able to work with latest
      technologies and improve my skills constantly. My biggest motivation is
      the joy I feel during the process while researching, troubleshooting and
      and get the projects running which is incomparable to most of other
      Positons.</p>
    </p>
  </section>
</template>

<script>
export default {
  name: "LandingPage",
};
</script>

<style scoped>
section {
  flex-direction: column;
}
p {
  text-align: left;
}
img {
  max-width: 200px;
}
</style>
