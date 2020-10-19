<template>
  <div class="products">
    <div class="test"></div>
    <Spinner v-if="loading" class="products__spinner" />
    <Alert v-else-if="error" type="error">
      Could not get products.
    </Alert>
    <Alert v-else-if="!products.length">
      There are no products to display.
    </Alert>
    <template v-else>
      <ul class="products__list">
        <li
          v-for="product in products"
          :key="product.id"
          class="products__list-item"
        >
          <Product class="products__product" :product="product" />
        </li>
      </ul>
      <div class="products__paginate">
        <Paginate
          :current-page="currentPage"
          :next-page="nextPage"
          :previous-page="previousPage"
          @previous-page="handleGoPreviousPage"
          @next-page="handleGoNextPage"
        />
      </div>
    </template>
  </div>
</template>

<script>
import ky from 'ky';
import Alert from './Alert';
import Paginate from './Paginate';
import Product from './Product';
import Spinner from './Spinner';

export default {
  name: 'Products',
  components: { Alert, Paginate, Product, Spinner },
  data() {
    return {
      loading: true,
      error: false,
      products: [],
      currentPage: 1,
      previousPage: null,
      nextPage: null,
    };
  },
  computed: {
    apiRoute() {
      return `/api/products?page=${this.currentPage}`;
    },
  },
  watch: {
    currentPage() {
      this.getProducts();
    },
  },
  created() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      this.loading = true;
      this.error = false;

      try {
        const response = await (await ky.get(this.apiRoute)).json();
        this.products = response.data;
        this.parsePageUrls(response.next_page_url, response.prev_page_url);
      } catch (error) {
        console.error(error);
        this.error = true;
      } finally {
        this.loading = false;
      }
    },
    parsePageUrls(nextPage, previousPage) {
      const queryParam = 'page';

      try {
        this.nextPage = new URL(nextPage).searchParams.get(queryParam);
      } catch {
        this.nextPage = null;
      }

      try {
        this.previousPage = new URL(previousPage).searchParams.get(queryParam);
      } catch {
        this.previousPage = null;
      }
    },
    handleGoPreviousPage() {
      this.currentPage = this.previousPage;
    },
    handleGoNextPage() {
      this.currentPage = this.nextPage;
    },
  },
};
</script>

<style lang="postcss" scoped>
.products {
  max-width: 32rem;
  width: 100%;
  margin: 0 auto;
  padding: 1rem;

  &__list {
    margin: 1rem 0;
    padding: 0;
    list-style: none;
  }
}
</style>
