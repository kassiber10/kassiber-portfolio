<template>
  <teleport to="body">
    <div class="backdrop" @click="$emit('close')"></div>
    <div>
      <main>
        <slot />
      </main>
    </div>
  </teleport>
</template>

<script>
export default {
  emits: ["close"],
};
</script>

<style scoped>
.backdrop {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 100%;
  background-color: rgba(2, 0, 36, 0.9);
  z-index: 10;
}

div {
  border-radius: 8px;
  position: fixed;
  text-align: left;
  left: 5%;
  top: 5%;
  bottom: 5%;
  width: 100%;
  padding: 2rem;
  z-index: 100;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
  overflow-y: scroll;
}
main {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
@media (min-width: 0rem) {
  div {
    left: 6%;
    width: 80%;
  }
}
@media (min-width: 40rem) {
  div {
    left: 12%;
    width: 70%;
  }
}
@media (min-width: 60rem) {
  div {
    left: 8%;
    width: 80%;
  }
}
</style>
