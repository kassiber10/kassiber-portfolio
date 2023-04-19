<template>
  <BaseModal>
    <div class="modal-header">
      <h3>{{ projectTitle }}</h3>
      <SecondaryButton @click="$emit('close')">Close</SecondaryButton>
    </div>
    <img :src="fullSizeUrl" />
  </BaseModal>
</template>

<script>
import BaseModal from "../../components/organisms/BaseModal.vue";
export default {
  name: "PicturesModal",
  components: {
    BaseModal,
  },
  props: {
    fullSizeUrl: {
      type: String,
      required: true,
    },
    projectTitle: {
      type: String,
      required: true,
    },
    show: Boolean,
  },
  data() {
    return {};
  },
};
</script>

<style scoped>
img {
  max-width: 90%;
  height: max(800%, 70vh);
}
.modal-header {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin-bottom: 2rem;
}
</style>
