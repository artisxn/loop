<template>
  <div class="alert" :class="`alert--${type}`">
    <slot />
  </div>
</template>

<script>
export default {
  name: 'Alert',
  props: {
    type: {
      type: String,
      validator: value =>
        ['error', 'info', 'success', 'warning'].includes(value),
      default: 'info',
    },
  },
};
</script>

<style lang="postcss" scoped>
.alert {
  border-radius: 4px;
  padding: 1rem;
  border: 1px solid #90cdf4;
  background: #bee3f8;
  color: #2a4365;

  &--error {
    background: #fed7d7;
    color: #742a2a;
    border-color: #feb2b2;
  }

  &--warning {
    background: #fefcbf;
    color: #744210;
    border-color: #faf089;
  }

  &--success {
    background: #c6f6d5;
    color: #22543d;
    border-color: #9ae6b4;
  }
}
</style>
