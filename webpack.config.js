// webpack.config.js
/**
 * Webpack configuration.
 */
var webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const JS_DIR = path.resolve(__dirname, "assets/src/js");
const IMG_DIR = path.resolve(__dirname, "assets/src/img");
const CSS_DIR = path.resolve(__dirname, "assets/src/scss");
const BUILD_DIR = path.resolve(__dirname, "build");
const entry = {
  main: JS_DIR + "/main.js",
  css: CSS_DIR + "/main.scss",
};
const output = {
  path: BUILD_DIR,
  filename: "assets/src/js/[name].js",
};
/**
 * Note: argv.mode will return 'development' or 'production'.
 */

const plugins = (argv) => [
  new CleanWebpackPlugin({
    cleanStaleWebpackAssets: argv.mode === "production", // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
  }),
  new MiniCssExtractPlugin({
    filename: "assets/src/css/[name].css",
  }),
  /*new webpack.ProvidePlugin({
    $: "jquery",
    jQuery: "jquery",
    "window.jQuery": "jquery",
    Tether: "tether",
    "window.Tether": "tether",
  }),*/
];
const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /\.(sa|sc|c)ss$/,
    include: [CSS_DIR],
    exclude: /node_modules/,
    use: [
      {
        loader: MiniCssExtractPlugin.loader,
      },
      {
        loader: "css-loader", // translates CSS into CommonJS modules
      },
      {
        loader: "postcss-loader", // Run post css actions
        options: {
          plugins: function () {
            // post css plugins, can be exported to postcss.config.js
            return [require("precss"), require("autoprefixer")];
          },
        },
      },
      {
        loader: "sass-loader", // compiles Sass to CSS
      },
    ],
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },
  /*{
    test: /\.(woff(2)?|ttf|eot)$/,
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },*/
];
/**
 * Since you may have to disambiguate in your webpack.config.js between development and production builds,
 * you can export a function from your webpack configuration instead of exporting an object
 *
 * @param {string} env environment ( See the environment options CLI documentation for syntax examples. https://webpack.js.org/api/cli/#environment-options )
 * @param argv options map ( This describes the options passed to webpack, with keys such as output-filename and optimize-minimize )
 * @return {{output: *, devtool: string, entry: *, optimization: {minimizer: [*, *]}, plugins: *, module: {rules: *}, externals: {jquery: string}}}
 *
 * @see https://webpack.js.org/configuration/configuration-types/#exporting-a-function
 */
module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  /**
   * A full SourceMap is emitted as a separate file ( e.g.  main.js.map )
   * It adds a reference comment to the bundle so development tools know where to find it.
   * set this to false if you don't need it
   */
  devtool: "source-map",
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        cache: false,
        parallel: true,
        sourceMap: false,
      }),
    ],
  },
  plugins: plugins(argv),
});
