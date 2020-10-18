<template>
  <div class="paginate">
    <button
      type="button"
      class="paginate__button paginate__button--previous"
      :disabled="!canGoPrevious"
      @click="$emit('previous-page')"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-chevron-left"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="#2c3e50"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <polyline points="15 6 9 12 15 18" />
      </svg>
    </button>
    <span class="paginate__current-page">{{ currentPage }}</span>
    <button
      type="button"
      class="paginate__button paginate__button--next"
      :disabled="!canGoNext"
      @click="$emit('next-page')"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-chevron-right"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="#2c3e50"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <polyline points="9 6 15 12 9 18" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  name: 'Paginate',
  props: {
    currentPage: {
      type: [Number, String],
      default: 1,
    },
    nextPage: {
      type: String,
      default: null,
    },
    previousPage: {
      type: String,
      default: null,
    },
  },
  computed: {
    canGoNext() {
      return !!this.nextPage;
    },
    canGoPrevious() {
      return !!this.previousPage;
    },
  },
};
</script>

<style lang="postcss" scoped>
.paginate {
  display: flex;
  align-items: center;
  justify-content: center;

  &__button {
    background: #e2e8f0;
    border: 0;
    border-radius: 4px;
    cursor: pointer;
    transition: background 250ms;

    &:hover:not(:disabled) {
      background: #a0aec0;
    }

    &:disabled {
      cursor: not-allowed;
    }
  }

  &__current-page {
    display: block;
    font-weight: 700;
    font-size: 1.2rem;
    margin: 0 1rem;
  }
}
</style>
