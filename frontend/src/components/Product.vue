<template>
  <div class="product">
    <div class="product__image-container">
      <img
        v-if="product.image"
        class="product__image"
        :src="product.image"
        alt=""
      />
      <div v-else class="product__image-icon">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="icon icon-tabler icon-tabler-box"
          width="84"
          height="84"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="#2c3e50"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
          <line x1="12" y1="12" x2="20" y2="7.5" />
          <line x1="12" y1="12" x2="12" y2="21" />
          <line x1="12" y1="12" x2="4" y2="7.5" />
        </svg>
      </div>
    </div>
    <div class="product__info">
      <h1 class="product__title">{{ product.title }}</h1>
      <ProductInfoItem
        class="product__info-item product__inventory-quantity"
        title="Inventory Quantity"
        :info="product.total_quantity"
      />
      <ProductInfoItem
        class="product__info-item product__total-sales"
        title="Total Sales"
        :info="`\$${product.total_sales}`"
      />
      <ProductInfoItem
        class="product__info-item product__times-purchased"
        title="Total Times Purchased"
        :info="product.times_purchased"
      />
      <ul class="product__variants">
        <li v-for="variant in product.product_variants" :key="variant.id">
          <ProductVariant :variant="variant" class="product__variant" />
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import ProductInfoItem from './ProductInfoItem';
import ProductVariant from './ProductVariant';

export default {
  name: 'Product',
  components: { ProductInfoItem, ProductVariant },
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="postcss" scoped>
.product {
  border: 1px solid #e2e8f0;
  border-radius: 4px;
  overflow: hidden;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;

  &__image-container {
    width: 100%;
  }

  &__image {
    width: 100%;
  }

  &__image-icon {
    text-align: center;
    padding: 1rem 0;

    svg {
      background: #edf2f7;
      border-radius: 50%;
    }
  }

  &__info {
    padding: 1rem;
  }

  &__variants {
    margin: 0;
    padding: 0;
    list-style: none;

    li {
      &:not(:last-of-type) {
        border-bottom: 1px solid #edf2f7;
      }
    }
  }

  &__variant {
  }
}
</style>
