<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <button type="button" @click="handleClick">Click</button>
  </div>
</template>

<script>
import ky from 'ky';

export default {
  name: 'App',
  methods: {
    handleClick() {
      const response = ky.get('/api/user');
      console.log(response);
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
