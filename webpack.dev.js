const path = require('path');
const webpack = require('webpack');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");





const getNewEntry = (filename)=>{
  return [`./src/page/${filename}/${filename}.ts`];
}

const getHtmlTemplateConfig = (name)=>{
  return new HtmlWebpackPlugin({
    template:`./src/page/${name}/${name}.html`,
    filename:`./${name}.html`,
    inject:'body',
    hash:false,
    chunks:['base','common',,name],
    minify:'auto',
    // publicPath:'../'  
  });
}



const publicPath = '/'


const config = {
  mode:'development',
  entry:{
    'common':['./src/page/common/common.ts'], 
    'index':['./src/page/index/index.ts'],
  },
  output:{
    path: path.resolve(__dirname, 'dist'),
    publicPath:jsPublicPath,
    filename:'js/[name]_[chunkhash:7].js',
  },

  devServer:{
    static: {
      directory: path.resolve(__dirname, 'dist'),
    },
    client: {
      overlay: true,
    },
    hot:true,
    compress: false,
    port: 9000,
  },

  target:"web", 

  externals:{
    'jquery':"window.jQuery",
  },
  
  module:{
    rules:[
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
          "style-loader",
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
              name:'resource/[name]_[hash:7].[ext]',
              limit: 8096,
              emitFile:true,
              esModule: false,
              publicPath:publicPath,
            },
          }
        ],
      },
      {
        test: /\.webmanifest\??.*$/,
        use:[
          {
            loader:"file-loader",
            options:{
              name:'resource/[name]_[hash:7].[ext]',
              emitFile:true,
              esModule: false,
              publicPath:publicPath,
            },
          }
        ]
      },
    ]
  },
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
    alias:{
      node_modules:__dirname+'/node_modules',
    }
  },
  devtool: 'inline-source-map',
  
  optimization: { 
    runtimeChunk :'single',
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
        // common: {  //拆分指定文件
        //   test:path.join(__dirname, 'src/page/common/common.ts'),
        //   name: 'common1',
        //   chunks: 'initial',
        //   priority: -9,
        //   reuseExistingChunk: true,
        // },
      }
    }
  },

  plugins:[
    // new CleanWebpackPlugin(),
    // getHtmlTemplateConfig('index'),
    // getHtmlTemplateConfig('category'),
    // getHtmlTemplateConfig('post'),
    // getHtmlTemplateConfig('template'),
    // //开发环境因为整合到了js中, 所以两个css插件不生效
    // new MiniCssExtractPlugin({
    //   filename:'css/[name]_[contenthash:7].css',
    // }),
    // new CssMinimizerPlugin(),
  ],

}

if(WEBPACK_ENV  === 'dev'){
  //解决多入口热更新
  config.optimization.runtimeChunk = 'single';
}


module.exports = config;