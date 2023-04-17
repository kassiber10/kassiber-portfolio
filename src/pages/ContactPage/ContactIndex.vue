<template>
  <form @submit.prevent="submitContactForm">
    <label for="name">Name</label>
    <input type="text" name="name" />
    <label for="email">E-Mail</label>
    <input type="email" name="email" />
    <label for="text">Your message</label>
    <textarea name="text" rows="8"></textarea>
    <button>Get in touch</button>
  </form>
</template>

<script>
export default {
  name: "ContactIndex",
  methods: {
    submitContactForm() {
      console.log("submitted");
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
}
label {
  text-align: left;
}
input,
textarea {
  background-color: inherit;
  border: 1px solid var(--color-light);
  border-radius: 2px;
  margin-bottom: 1rem;
}
button {
  margin-top: 1.5rem;
}
</style>
