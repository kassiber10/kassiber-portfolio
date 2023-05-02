<template>
  <BaseModal>
    <div class="modal-header">
      <h3>{{ projectTitle }}</h3>
      <SecondaryButton @click="$emit('close')">Close</SecondaryButton>
    </div>
    <projects-swiper :id="id" class="swiper-cont"></projects-swiper>
    <p>double click image to zoom</p>
  </BaseModal>
</template>

<script>
import BaseModal from "../../components/organisms/BaseModal.vue";
import ProjectsSwiper from "../../components/organisms/ProjectsSwiper.vue";
export default {
  name: "PicturesModal",
  components: {
    BaseModal,
    ProjectsSwiper,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
    projectTitle: {
      type: String,
      required: true,
    },
    fullSizeUrl: {
      type: Array,
      required: true,
    },
    show: Boolean,
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
.swiper-cont {
  border-radius: 8px;
  /* display: inline; */
  max-width: 100%;
  margin: 0;
  height: fit-content;
}
</style>
