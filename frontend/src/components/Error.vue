<template>
  <div class="error">
    <slot />
  </div>
</template>

<script>
export default {
  name: 'Error',
};
</script>

<style lang="postcss" scoped>
.error {
  background: #fed7d7;
  color: #742a2a;
  border: 1px solid #feb2b2;
  border-radius: 4px;
  padding: 1rem;
}
</style>
