<template>
  <button><slot /></button>
</template>

<script>
export default {
  name: "PrimaryButton",
};
</script>

<style scoped>
button {
  border-radius: 3px;
  border: 1px solid transparent;
  padding: 0.6em 1.2em;
  font-family: inherit;
  background-color: var(--color-dark);
  cursor: pointer;
  transition: border-color 0.25s;
}

button:hover {
  border-color: var(--color-light);
}

button:focus,
button:focus-visible {
  outline: 4px auto var(--color-medium);
}
</style>
