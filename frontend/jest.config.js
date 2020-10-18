const esModules = ['ky'].join('|');

module.exports = {
  preset: '@vue/cli-plugin-unit-jest',
  transform: {
    '^.+\\.(js|jsx)?$': 'babel-jest',
  },
  transformIgnorePatterns: [`../../node_modules/(?!${esModules})`],
};
