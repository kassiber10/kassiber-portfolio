<template>
  <swiper
    :pagination="{ clickable: true }"
    :zoom="true"
    :modules="modules"
    class="swiper"
    :id="id"
  >
    <swiper-slide
      v-for="img in projectImages"
      :key="img.id"
      class="swiper-slide"
    >
      <div class="swiper-zoom-container">
        <img :src="img.src" />
      </div>
    </swiper-slide>
  </swiper>
</template>
<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/pagination";
import { Pagination } from "swiper";
import { Zoom } from "swiper";
import { mapStores } from "pinia";
import { useProjectsStore } from "../../stores/projects";
export default {
  data() {
    return {
      projects: [
        {
          id: "",
          title: "",
          description: "",
          image: [],
          skills: "",
        },
      ],
      projectImages: [],
    };
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [Pagination, Zoom],
    };
  },
  computed: {
    ...mapStores(useProjectsStore),
  },
  methods: {
    getImagesbyProjectId(projectId) {
      const images = this.projects.filter((pr) => pr.id === projectId);
      return images[0].image;
    },
  },
  async mounted() {
    // this.isLoading = true;
    try {
      this.projects = await this.projectsStore.getProjects;
      this.projectImages = this.getImagesbyProjectId(this.id);
    } catch (error) {
      this.error = error.message || "Something went wrong!";
    }
    // this.isLoading = false;
  },
};
</script>

<style scoped>
.swiper {
  height: 100%;
}
/* .swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
  height: 100%;
  max-height: 25%;
  width: 100%;
}*/
.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: contain;
}
</style>
