const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');


const publicPath = '/';
const outputPath = 'public';
const prefix = 'q1';

const config = {

  mode:'development',

  entry:{
    'q1':path.resolve(__dirname, '@src/q1/q1.ts'), 
  },

  output: {
    path: path.resolve(__dirname, outputPath),
    publicPath,
    filename:`${prefix}/js/[name].js`,
  },

  module:{
    rules:[
      {
        test: /\.js$/,
        exclude: [
          path.resolve(__dirname, 'inc'),
        ]
      },
      //打包ts
      {
        test: /\.tsx?$/,
        use: 'ts-loader',
        exclude: /node_modules/,
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
        ]
      },
       //url-loader打包图片字体
      {
        test: /\.(jpg|png|gif|woff|svg|eot|ttf)\??.*$/,       
        use: [
          {
            loader:"url-loader",
            options:{
              name:`${prefix}/resource/[name].[ext]`,
              limit: 40960,
              emitFile:true,
              esModule: false,
              publicPath,
            },
          }
        ],
      },
    ]
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
  },
  

  optimization:{
    splitChunks: {
      minChunks: 1, //默认模块被引用一次就分离
      minSize: 1,  //提取出的chunk的最小大小
      cacheGroups: {
        //公用库
        // default: {
        //   name: 'base',
        //   chunks: 'initial',
        //   minChunks: 2,  //模块被引用2次以上的才抽离
        //   priority: -20,
        //   reuseExistingChunk: true,
        // },
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
    new MiniCssExtractPlugin({
      filename: `q1/css/[name].css`,
    }),
  ],

}


module.exports = config;