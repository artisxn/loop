<template>
  <div id="app">
    <h1 class="title">Universe of Birds</h1>
    <Products />
  </div>
</template>

<script>
import Products from './components/Products';

export default {
  name: 'App',
  components: { Products },
};
</script>

<style lang="postcss">
@import './css/main.pcss';

#app {
  margin: 3rem 0;
}

.title {
  text-align: center;
}
</style>
