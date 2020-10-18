<template>
  <div class="product-info-item">
    <strong>{{ title }}</strong>
    <br />
    <span>{{ info }}</span>
  </div>
</template>

<script>
export default {
  name: 'ProductInfoItem',
  props: {
    title: {
      type: String,
      required: true,
    },
    info: {
      type: [String, Number],
      required: true,
    },
  },
};
</script>

<style lang="postcss" scoped>
.product-info-item {
  margin: 0.5rem 0;
}
</style>
