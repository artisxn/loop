<template>
  <div class="product-variant">
    <ProductInfoItem
      class="product-variant__info"
      title="Variant"
      :info="variant.title"
    />
    <ProductInfoItem
      class="product-variant__info"
      title="Price"
      :info="`\$${variant.price}`"
    />
  </div>
</template>

<script>
import ProductInfoItem from './ProductInfoItem';

export default {
  name: 'ProductVariant',
  components: { ProductInfoItem },
  props: {
    variant: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="postcss" scoped>
.product-variant {
  display: flex;
  justify-content: space-between;

  &__info {
    width: calc(50% - 0.5rem);
  }
}
</style>
