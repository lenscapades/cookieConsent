const path = require('path');

module.exports = {
  entry: {
    loader: [
      './src/loader.js'
    ],
    app: [
      './src/app.js'
    ]
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: '[name].js'
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
