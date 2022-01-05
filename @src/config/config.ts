
// import devConfig from './configEnv/config.dev';
// import prodConfig from './configEnv/config.prod';



// let baseURL:string;
// const env = process.env.NODE_ENV;
// if(env === 'development'){
//   console.log('开发环境')
//   baseURL= devConfig.baseUrl;
// }else{
//   console.log('生产环境')
//   baseURL= prodConfig.baseUrl;
// }

// uploadUrl:`${baseURL}/file/upload`,

const config = {
  defaultPage:1,
  defaultSize:10,
  requestConfig:{
    baseURL:'http://localhost/zixuehu', //基础url
    timeout:15 * 1000, //超时时间
  },

}

export default config;