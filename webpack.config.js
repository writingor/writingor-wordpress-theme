const path = require('path')
const fs = require('fs');
const CopyPlugin = require('copy-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

const declareTheme = (compiler) => {
  compiler.hooks.done.tap('WriteFilePlugin', () => {
    const filePath = path.resolve(__dirname, 'public/style.css')
    fs.writeFileSync(filePath, `
/**
 * Theme Name:  Writingor
 * Description: Special theme for the Writingor.
 *
 * Author:      Writingor
 * Author URI:  https://github.com/writingor
 *
 * Tags:        writingor
 * Text Domain: writingor
 *
 * Version:     1.0.001
 */
      `, 'utf8')
  })
}

const config = {
  entry: {
    common: ['./assets/js/script.js', './assets/scss/style.scss'],
    // gutenberg: ['./assets/js/gutenberg.js', './assets/scss/gutenberg.scss'],
  },
  containerUrl: 'http://localhost:8002',
}

module.exports = {
  context: path.resolve(__dirname, 'src'),
  entry: config.entry,
  output: {
    filename: 'assets/js/[name].js',
    path: path.resolve(__dirname, 'public'),
    clean: true,
    pathinfo: false,
  },
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 2,
              sourceMap: false,
              url: false,
            },
          },
          {
            loader: "sass-loader",
            options: {
              // api: "modern",
              // sassOptions: {
              //   quietDeps: true,
              // },
            },
          },
        ],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
    ],
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        {
          from: 'assets/font/',
          to: 'assets/font/[path][name][ext]',
        },
        {
          from: 'assets/img/',
          to: 'assets/img/[path][name][ext]',
        },
        {
          from: 'assets/video/',
          to: 'assets/video/[path][name][ext]',
        },
        {
          from: './**/*.php',
          to: '[path][name][ext]',
        },
        {
          from: 'assets/libs/',
          to: 'assets/libs/[path][name][ext]',
        },
      ],
    }),
    new MiniCssExtractPlugin({
      filename: 'assets/css/[name].css',
    }),
    {
      apply: declareTheme
    },
    new BrowserSyncPlugin({
      ui: false,
      notify: false,
      proxy: config.containerUrl,
      files: ['public/**/*.php'],
    })
  ],
  devtool: false,
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        terserOptions: {
          format: {
            comments: false,
          },
        },
        extractComments: false,
      }),
      new CssMinimizerPlugin(),
    ],
  },
  stats: 'errors-warnings',
  performance: {
    hints: false,
  },
}
