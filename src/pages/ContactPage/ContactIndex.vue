<template>
  <form @submit.prevent="submitContactForm" id="contactform">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" />
    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email" />
    <label for="text">Your message</label>
    <textarea name="text" id="text" rows="8"></textarea>
    <PrimaryButton>Get in touch</PrimaryButton>
    <!-- <SecondaryButton @click="resetForm">Reset</SecondaryButton> -->
  </form>
</template>

<script>
import axios from "axios";
export default {
  name: "ContactIndex",
  
  methods: {
    async submitContactForm() {
      const fd = new FormData(contactform);
      axios
        .post("http://www.kassiber.org/incl/email/contact.php", fd)
        .then(function (response) {
          console.log(response.data.emailSentSuccess);
        })
        .catch(function (error) {
          console.log(error.data);
        });
    },
    resetForm() {
      const fd = new FormData();
    }
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
