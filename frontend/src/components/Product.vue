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
          version="1.1"
          id="Capa_1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          width="235.491px"
          height="235.491px"
          viewBox="0 0 235.491 235.491"
          style="enable-background:new 0 0 235.491 235.491;"
          xml:space="preserve"
        >
          <g>
            <g>
              <path
                d="M229.651,34.784l-73.865,14.607c-11.425-4.308-22.729-6.5-33.594-6.5c-84.85,0-120.56,128.016-122.034,133.438
			c-0.21,0.825-0.21,1.707,0,2.505c3.635,14.19,17.851,21.98,39.972,21.98c14.753,0,32.074-3.663,44.112-9.346
			c13.229-6.239,27.359-9.381,42.074-9.381c32.224,0,56.777,15.225,57.054,15.377c1.716,1.105,4.023,1.006,5.595-0.277
			c1.651-1.286,2.292-3.434,1.627-5.382c-1.106-3.326-13.008-37.409-18.37-49.255c-23.812-52.445,59.847-98.214,60.696-98.685
			c2.132-1.146,3.106-3.673,2.284-5.935C234.372,35.653,232.156,34.273,229.651,34.784z M163.344,146.581
			c3.435,7.658,9.813,25.055,13.962,36.824c-10.988-4.909-29.259-11.104-50.991-11.104c-16.164,0-31.718,3.475-46.223,10.343
			c-10.868,5.105-26.569,8.412-39.97,8.412c-9.664,0-26.146-1.796-30.206-13.478C13.873,164.17,49.004,52.643,122.167,52.643
			c10.075,0,20.654,2.126,31.387,6.344c0.873,0.336,1.823,0.455,2.745,0.224l50.353-9.954
			C181.029,68.232,144.201,104.487,163.344,146.581z"
              />
              <path
                d="M114.437,71.862c7.151,0,12.952,5.795,12.952,12.952c0,7.153-5.801,12.952-12.952,12.952
			c-7.153,0-12.954-5.799-12.954-12.952C101.483,77.657,107.284,71.862,114.437,71.862z"
              />
            </g>
          </g>
        </svg>
      </div>
    </div>
    <div class="product__info">
      <h2 class="product__title">{{ product.title }}</h2>
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
    text-align: center;
  }

  &__image {
    width: 100%;
  }

  &__image-icon {
    display: inline-block;
    padding: 1rem;
    margin: 1rem 0;
    background: #edf2f7;
    border-radius: 50%;

    svg {
      width: 5rem;
      height: 5rem;
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
