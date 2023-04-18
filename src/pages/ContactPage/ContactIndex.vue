<template>
  <h1 v-if="responseMsg">{{ responseMsg }}</h1>
  <h2>I would love to hear from you!</h2>
  <p>
    Just drop me a line and I'll get back to you as soon as possible. Have nice
    day:)
  </p>
  <form @submit.prevent="submitContactForm" id="contactform">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" v-model="formData.name" />
    <p v-if="!formData.name && checkValue" class="form-error">
      Please enter a name!
    </p>
    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email" v-model="formData.email" />
    <p v-if="!formData.email && checkValue" class="form-error">
      Please enter a valid E-Mail adress!
    </p>
    <label for="text">Your message</label>
    <textarea name="text" id="text" rows="8" v-model="formData.text"></textarea>
    <p v-if="!formData.text && checkValue" class="form-error">
      Please write me a message!
    </p>
    <PrimaryButton>Get in touch</PrimaryButton>
    <!-- <SecondaryButton @click="resetForm">Reset</SecondaryButton> -->
  </form>
</template>

<script>
import axios from "axios";
// const API = import.meta.env.API;
export default {
  name: "ContactIndex",
  data() {
    return {
      formData: {
        name: "",
        email: "",
        text: "",
      },
      responseMsg: "",
      checkValue: false,
    };
  },
  computed: {
    validateForm() {
      this.checkValue = true;
      // const validEmail = /\S+@\S+\.\S+/.test(this.formData.email);

      if (!Object.values(this.formData).every((data) => data !== "")) {
        return false;
      }
      return true;
    },
  },
  methods: {
    async submitContactForm() {
      const fd = new FormData(contactform);

      if (this.validateForm) {
        axios
          .post("https://www.kassiber.org/incl/email/contact.php", fd)
          .then((response) => {
            if (response.data.emailError === undefined) {
              this.responseMsg = response.data.emailSentSuccess;
            } else {
              this.responseMsg = response.data.emailError;
            }
          })
          .catch((error) => {
            this.responseMsg = error;
            console.log(error);
          });
      }
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  margin-top: 3rem;
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
p {
  text-align: left;
}
.form-error {
  background-color: var(--color-white);
  color: var(--color-dark);
  padding: 0.5rem;
  font-weight: bold;
}
</style>
