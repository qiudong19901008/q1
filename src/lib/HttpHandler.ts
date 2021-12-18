import AxiosStatic,{AxiosRequestConfig,AxiosResponse,AxiosInstance,Method } from 'axios';
import config from '../config/config'
import LocalStorager from './LocalStorager';
import * as qs from 'qs';


const defaultConfig:AxiosRequestConfig  = {
  baseURL:config.requestConfig.baseURL, //基础url
  timeout: config.requestConfig.timeout, //超时时间
  validateStatus(status:number) { // return true或者设置为null或undefined，promise将resolved,否则将rejected
    return status >= 200 && status < 510
  },
}

class HttpHandler{
  
  constructor(){
    this.init();
  }

  private axios:AxiosInstance;

  private init(){
    const axios = AxiosStatic.create(defaultConfig); 
    this._setRequestInterceptors(axios);
    this._setResponseInterceptors(axios);
    this.axios = axios;
  }

  private _setRequestInterceptors(axios:AxiosInstance){
    axios.interceptors.request.use((originalConfig)=>{
      const reqConfig = {...originalConfig}; 
      // console.log(reqConfig)
      //1. 是否有请求的url
      if(this._isLackRequestUrl(reqConfig)){
        throw new Error('need request url');
      }
      //2. 检查请求方法是否正确
      const errorMsg = this._checkReqMethod(reqConfig);
      if(errorMsg !== ''){
        throw new Error(errorMsg);
      }
      //3. 表单编码, 否则会404
      reqConfig.data = qs.stringify(reqConfig.data); 
      return reqConfig;
    })
  }

  private _isLackRequestUrl(reqConfig:AxiosRequestConfig){
    if(!reqConfig.url){
      return true;
    }
    return false;
  }

  private _checkReqMethod(reqConfig:AxiosRequestConfig){
    if(!reqConfig.method){
      return 'need request method';
    }
    reqConfig.method = reqConfig.method.toLowerCase() as Method;
    if(!['get','post','delete','put'].includes(reqConfig.method)){
      return `can not understand request method ${reqConfig.method}`;
    }
    if(reqConfig.method === 'get' && reqConfig.data){
      return 'get method can not include body data';
    }
    if(['post','delete','put'].includes(reqConfig.method) && reqConfig.params){
      return 'post delete or put method can not include query data';
    }
    return '';
  }


  // {msg:'',errorCode:0}
  // {list:'',count:''}
  private _setResponseInterceptors(axios:AxiosInstance){
    axios.interceptors.response.use((res)=>{
      console.log(res);
      if(this._isResCollect(res)){
        return res.data;
      }
      throw new Error(res.statusText);
    },error=>{
      // axios的错误直接抛出
      throw error;
    })
  }

  private _isResCollect(res:AxiosResponse){
    return res.status.toString().charAt(0) === '2';
  }

  public async get(url:string,params={}){
    const resData = await this.axios({
      url,
      params,
      method:'get',
    });
    return resData as any as responseDataType;
  }

  public async post(url:string,data={}){
    const resData = await this.axios({
      url,
      data,
      method:'post',
    });
    return resData;
  }

  public async put(url:string,data={}){
    const resData = await this.axios({
      url,
      data,
      method:'put',
    });
    return resData;
  }

  public async delete(url:string,data={}){
    const resData = await this.axios({
      url,
      data,
      method:'delete',
    });
    return resData;
  }






  
}

export type responseDataType={
  list:[],
  count:number,
}


export default HttpHandler;
