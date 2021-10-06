const webpack = require('webpack');
const path = require('path');
const glob = require('glob');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const config = require('./config');
const inProduction = process.env.NODE_ENV === 'production';

// LOADER HELPERS
const extractCss = {
  loader: MiniCssExtractPlugin.loader,
  options: {
    publicPath: `${config.assetsPath}static/css/`,
  },
};

const cssLoader = {
  loader: 'css-loader',
  options: {
    importLoaders: 1,
    sourceMap: true,
  },
};

const images = [{
  loader: 'file-loader',
  options: {
    name: '[name].[ext]',
    outputPath: 'images/',
    publicPath: `${config.assetsPath}static/images/`,
  },
}, ];

if (inProduction) {
  images.push('image-webpack-loader');
}

module.exports = {
  entry: {
    scripts: './resources/assets/js/main.js',
    styles: './resources/assets/sass/main.scss',
    vendor: ['jquery'],
  },
  output: {
    path: path.resolve(__dirname, '../static/'),
    filename: `js/[name].js`,
  },

  watchOptions: {
    ignored: /node_modules/,
  },

  devtool: false,

  module: {
    rules: [{
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
      {
        test: /\.css$/,
        use: [ extractCss, cssLoader, 'postcss-loader'],
      },
      {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
          extractCss,
          cssLoader,
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                includePaths: [
                  path.resolve(__dirname, '../resources/assets/sass'),
                ],
                sourceMap: true,
              },
            },
          },
        ],
      },
      {
        test: /\.sass$/,
        exclude: /node_modules/,
        use: [
          extractCss,
          cssLoader,
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                indentedSyntax: true,
                includePaths: [
                  path.resolve(__dirname, '../resources/assets/sass'),
                ],
                sourceMap: true,
              },
            },
          },
        ],
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        use: images,
      },
      {
        test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
          name: '[name].[hash:7].[ext]',
          outputPath: 'fonts/',
          publicPath: `${config.assetsPath}static/fonts/`,
        },
      },
    ],
  },

  optimization: {
    splitChunks: {
      cacheGroups: {
        vendor: {
          chunks: 'all',
          name: 'vendor',
          test: 'vendor',
          enforce: true,
        },
      },
    },
  },

  resolve: {
    alias: {
      images: path.join(__dirname, '../resources/assets/images'),
    },
    extensions: ['*', '.js', '.json'],
  },

  plugins: [

    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: `css/[name].css`,
    }),


    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: config.devUrl, // YOUR DEV-SERVER URL
      files: [
        './*.php',
        './resources/views/**/*.twig',
        './static/css/*.*',
        './static/js/*.*',
      ],
    }, {
      reload: false,
      injectCss: true,
    }, ),
  ],
};

if (!inProduction) {
  module.exports.plugins.push(new webpack.SourceMapDevToolPlugin({}));
}