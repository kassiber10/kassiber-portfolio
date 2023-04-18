<template>
  <section>
    <div>
      <img src="../assets/images/ak.png" />
      <p>I'm experienced in
      <img src="https://skillicons.dev/icons?i=js,html,css,vuejs,php,mysql" /></p>
      
      <p>I actually learn
      <img src="https://skillicons.dev/icons?i=svelte,express,java,firebase" /></p>
    </div>
    <article>
  <h1>Fullstack Developer with Design Background</h1>
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
</article>
  </section>
</template>

<script>
export default {
  name: "LandingPage",
};
</script>

<style scoped>
h1 {
  font-size: clamp(3vw, 3rem, 2rem);
  
}
div {  
  margin-right: 6rem;
}

p {
  text-align: left;
}
img {
  width: max(150px, 20%);
  border-radius: 4px;
  margin-right: 6rem;
}

article {
 margin-left: 2rem;
}
@media (max-width: 600px) {
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


 section {
  /* display: flex; */
   flex-direction: column;
 }
 article {
 /* background-color: aqua; */
 margin-left: 0;
}
}

</style>
