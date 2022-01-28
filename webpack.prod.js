const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const {
  getPublicPath,
  getOutputPath,
} = require('./config');
const webpack = require('webpack');



/**
 * 样式输入路径
 */
 const outputPath = path.resolve(process.cwd(), 'assets'); 
 const publicPath = 'https://hedaoshe.com/wp-content/themes/q1/assets';

const config = {

  mode:'production',

  entry:{
    'q1':path.resolve(process.cwd(), '@src/q1.ts'), 
  },

  output: {
    path: path.resolve(process.cwd(), outputPath),
    publicPath,
    filename:'js/[name].js',
  },

  module:{
    rules:[
      {
        test: /\.js$/,
        exclude: [
          /inc/,
        ]
      },
      //打包ts
      {
        test: /\.tsx?$/,
        use: 'ts-loader',
        exclude: [
          /node_modules/,
          /inc/,
        ]
      },
      //单独打包出 css
      { 
        test:/\.css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader:'css-loader',
            options:{
              esModule: false, //这个搞死人
            }
          },
        ],
        exclude: [
          /inc/,
        ]
      },
       //url-loader打包图片字体
       {
        test: /\.(jpg|png|gif|woff|svg|eot|ttf)\??.*$/,       
        use: [
          {
            loader:"url-loader",
            options:{
              name:`resource/[name].[ext]`,
              limit: 1024*8,
              emitFile:true,
              esModule: false,
              useRelativePath:true,//设置为相对路径
              publicPath:'../',
            },
          }
        ],
        exclude: [
          /inc/,
        ]
      },
    ]
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
    alias: {
      'jquery': path.join(process.cwd(), '/node_modules/jquery/dist/jquery.min.js')
    }
  },
  

  optimization:{
    splitChunks: {
      minChunks: 1, //默认模块被引用一次就分离
      minSize: 1,  //提取出的chunk的最小大小
      cacheGroups: {
        //公用库
        default: {
          name: 'base',
          chunks: 'initial',
          minChunks: 2,  //模块被引用2次以上的才抽离
          priority: -20,
          reuseExistingChunk: true,
        },
        //拆分第三方库（通过npm|yarn安装的库）
        vendors: {  
          test: /[\\/]node_modules[\\/]/,
          name: 'vendor',
          chunks: 'initial',
          priority: -10,
          reuseExistingChunk: true,
        },
      }
    } //splitChunks end
  },


  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    }),
    new MiniCssExtractPlugin({
      filename: 'css/[name].css',
    }),
    new CssMinimizerPlugin(),
  ],

}


module.exports = config;