<template>
  <div class="loader-cont">
    <p>..loading</p>
    <span class="loader" />
  </div>
</template>

<style>
.loader-cont {
  width: 100%;
  height: 100%;
  margin: 0 auto;
}
.loader {
  display: flex;
  z-index: 100;
  margin: 0 auto;
  width: 48px;
  height: 48px;
  border: 5px solid var(--color-white);
  border-bottom-color: var(--color-medium);
  border-radius: 50%;
  display: inline-block;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
