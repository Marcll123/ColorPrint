const path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin"); //Sacar las hojas de estilo de nuestro proyecto

const CleanWebpackPlugin = require("clean-webpack-plugin"); //Permite limpiar la carpeta de distibucion cada vez que se haga un build

const autoprefixer = require("autoprefixer");

const HtmlWebpackPlugin = require("html-webpack-plugin");
const HtmlWebpackPluginConfig = new HtmlWebpackPlugin({
  template: "./app/index.html",
  filename: "index.html",
  inject: "body"
});

const config = {
  entry: ["@babel/polyfill","./app/index.jsx"], //Punto de entrada
  output: {
    path: path.resolve("dist"),
    filename: "bundle.js"
  },
  module: {
    rules: [  
      {
        test: /.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader" //Para usar js y jsx
        }
      },
      {
        test: /.html$/,
        use: {
          loader: "html-loader" //Para html
        }
      },
      {
        test: /\.(css|scss)$/,
        use: [
          "style-loader", //Perimite crear cadenas de texto css a node
          MiniCssExtractPlugin.loader,
          "css-loader?minimize&sourceMap", //Para darle soporte a la invocacion de las hojas de estilo
          {
            loader: "postcss-loader",
            options: {
              autoprefixer: {
                browser: ["last 2 versions"]
              },
              sourceMap: true,
              plugins: () => [autoprefixer]
            }
          },
          "resolve-url-loader",
          "sass-loader?outputStyle=compressed&sourceMap"
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/, // For images
        use: ["file-loader"]
      },
      {
        test: /\.(jpe?g|png|gif|svg|webp)/i,
        use: [
          "file-loader?name=assets/[name].[ext]",
          "image-webpack-loader?bypassOnDebug"
        ]
      },
      {
        test: /\.(ttf|eot|woff2?1|mp4|mp3|txt|xml|pdf)/i,
        use: "file-loader?name=assets/[name].[ext]"
      }
    ]
  },
  devServer: {
    historyApiFallback: true,
    contentBase: './',
    hot: true
  },
  plugins: [
    HtmlWebpackPluginConfig,
    new MiniCssExtractPlugin(),
    new CleanWebpackPlugin(["dist/**/*.*"])
  ]
};

module.exports = config;
