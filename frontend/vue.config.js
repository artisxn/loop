module.exports = {
  devServer: {
    disableHostCheck: true,
    proxy: 'http://site',
    // proxy: 'http://localhost:8090',
  },
};
