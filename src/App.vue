<template>
  <header-element></header-element>
  <main>
    
    <router-view v-slot="{Component}">
      <transition name="fade">
        <component :is="Component" />
      </transition>
      </router-view>
  </main>
</template>

<script>
import HeaderElement from "./components/organisms/HeaderElement.vue";
export default {
  components: {
    HeaderElement,
  },
};
</script>

<style scoped>
.fade-enter-active {
  
  animation: bounce-in 0.5s;
}
.fade-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.10);
  }
  100% {
    transform: scale(1);
  }
}
</style>
