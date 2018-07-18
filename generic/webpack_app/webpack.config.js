const path = require('path');

module.exports = {
  entry: {
    app: [
      './src/app.js',
      'babel-polyfill'
    ]
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'app.bundle.js'
  },
  module: {
    rules: [{
      test: /\.js?$/,
      exclude: /node_modules/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['env', 'stage-0']
        }
      }
    }]
  },
  mode: 'none',
  devtool: 'inline-source-map'
}