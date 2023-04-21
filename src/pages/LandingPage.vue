<template>
  <section>
    <h1 v-if="isLoading">...loading...</h1>
    <div>
      <img src="../assets/images/site/ak.png" />      
      <div class="skills">
        <p>experienced in</p>
      <img src="https://skillicons.dev/icons?i=js,html,css,vuejs" />
      <img src="https://skillicons.dev/icons?i=php,mysql,bootstrap,github" />
      <p>currently learning</p>
      <img src="https://skillicons.dev/icons?i=svelte,nodejs,express,java,firebase" />
    </div>
    </div>
    <article>
  <h1>Fullstack Developer with Design Background</h1>
  <p>
    I’ve recently finished the academic Web Development program at
    FH Technikum Vienna. I have most experience in frontend development and
    strong design background due to my previous experiences.</p> <p>I prefer working
    with Vue.js as a Javascript framework. Basically I'm learning and working on projects constantly. Currently I'm improving my skills in Svelte/Svelte Kit and Node.js.</p> 
    <br /><h3>What I am looking for...</h3><p> I'm looking for a Junior Frontend Position with professional
    development prospects in which I’ll be able to work with latest
    technologies and improve my skills constantly. My biggest motivation is
    the joy I feel during the process while researching, troubleshooting 
    and getting the projects running which is incomparable to most of other
    professional experiences.</p>
  <h3>Experienced in...</h3>
  <p>Javascript, CSS, HTML, Vue.js, PHP, SQL, Bootstrap, Github, Adobe Suite</p>
  <h3>Currently learning...</h3>
  <p>Svelte/Svelte Kit, Express.js, Node.js, JAVA, Firebase</p>
</article>
  </section>
</template>

<script>
export default {
  name: "LandingPage",
  data() {
    return {
      isLoading: true,
    }
  },
  async mounted() {
    this.isLoading = false;
  },
};
</script>

<style scoped>
h1 {
  font-size: clamp(3vw, 3rem, 2rem);  
}
div {  
  margin-right: 3.5rem;  
}
.skills {
  width: 100%;
  
}
.skills>img {
  margin-bottom: .5rem;
}
p {
  text-align: left;
}
img {
  width: max(150px, 20%);
  margin-right: 6rem;
}
article {
 margin-left: 2rem;
}
@media (max-width: 600px) {
.skills {
  flex-direction: column;
  align-self: flex-end;
}
h1 {
  margin-top: 2rem;
}
 div {
  margin-right: 0;
  display: flex;
 }
 div > p {
  display: flex;
  flex-direction: column;
 }
 p >img {
  background-color: brown;
  min-width: 8rem;
 }
 div > img {
  margin-right: 1.5rem;
 }
 article {
 margin-left: 0;
}
}

</style>
