import PostModel, { GetPostList } from "../model/PostModel";
import {
  getPaginationHtml,
  getPostListHtml,
  isInt,
} from '../lib/helper';


abstract class BasePostListPageView{

  /**
   * 页面初始化
   */
  public initral(){
    this.pageFreshHandler();
  }
  
  /***事件处理函数 */

  /**
   * 分页处理函数, 该函数会被点击分页按钮触发
   * 1. 更新页面结构
   * 2. 更新url, 并保存过去的url
   * 2. 绑定事件
   */
  protected pagedHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
    //0 阻止页面跳转
    e.preventDefault();
    //0.1
    const page = e.currentTarget.innerText;
    const className = e.currentTarget.className;
    if(this.isCurrentPage(className)){
      return;
    }
    //1. 
    await this.getDataThenUpdatePageStructure(parseInt(page));
    //2.
    this.handleBrowserUrl(parseInt(page));
    //3.
    this.bindEvents();
  }

  /**
   * 新页面加载时的处理函数, 在通过url请求或者刷新页面时会触发
   * 1. 获取当前页码
   * 2. 更新页面结构
   * 3. 绑定事件
   */
  protected pageFreshHandler =async()=>{
    // 1.
    const page = this.getCurrentPage(); 
    // 2.
    await this.getDataThenUpdatePageStructure(page);
    // 3.
    this.bindEvents();
  }


  /**
   * 获取当前页码
   */
  protected getCurrentPage(){
    const path = location.pathname;
    const pathPiece = path.split('/');
    let page = pathPiece[pathPiece.length-1]; 
    let pageNum = 0;
    if(!isInt(page)){
      pageNum = 1;
    }else{
      pageNum = parseInt(page);
    }
    return pageNum;
  }

  /**
   * @description 被点击的页码是否是当前页
   * @param className 被点击元素的所有className
   * @returns 
   */
  protected isCurrentPage(className:string){
    if(className.includes('pagination__page--current')){
      return true;
    }
    return false;
  }

  /**
   * @description 获取数据然后更新页面结构
   * @param page 第几页
   */
  protected async getDataThenUpdatePageStructure(page=1){
    const url = $('.postList').data('url');
    const action = $('.postList').data('action');
    const size = $('.postList').data('size');
    const pageUrl = $('.postList').data('pageurl');
    const differenceParams = this.getDifferenceRequestPostListParams();
    const params:GetPostList = {
      action,
      orderBy:'create_time',
      ...differenceParams,
    }
    const {list,count} = await PostModel.getPostList(url,params,page,parseInt(size));
    const postListHtml = getPostListHtml(list,url,action,size,pageUrl);
    const paginationHtml = getPaginationHtml(page,count,size,pageUrl);
    this.updatePageStructure(postListHtml,paginationHtml);
  }

  

  /**
   * @description 处理浏览器的url, 
   * 1. 把浏览器的url地址进行更改, 
   * 2. 记录上一次的url
   */
  protected handleBrowserUrl(page:number){
    const nextPageUrl = this._getNextPageUrl(page);
    //1 2
    window.history.pushState(null, null,nextPageUrl); 
  }

  /**
   * 第一页是: http://localhost/zixuehu
   * 第二页是: http://localhost/zixuehu/page/4
   * 第一页少了一个斜杠
   */
  private _getNextPageUrl(page:number){
    //获取当前页url
    const currentUrl = $('.postList').data('pageurl');
    // http://localhost/zixuehu/page/4
    //如果下一页是第一页
    if(page === 1){ 
      return currentUrl.replace(/page\/\d+/,'');
    }
    const re = /.*page\/(\d+)/;
    const reRes = re.exec(currentUrl);
    //如果当前页是第一页, 第一页少了一个斜杠, 所以使用 /page
    if(!reRes){
      return currentUrl+`/page/${page}`;
    }
    //其他情况
    return currentUrl.replace(/page\/\d+/,`page/${page}`);
  }

  
  // 绑定事件
  protected bindEvents(){
    // 分页按钮点击事件
    $('.pagination__page').on('click',this.pagedHandler);
    // 后退前进按钮点击事件
    window.addEventListener('popstate', this.pageFreshHandler);
  }

  /**
   * 因为 index category tag的选择器不同, 所以必须子类完成选取更新操作
   */
  protected abstract updatePageStructure(postListHtml:string,paginationHtml:string):void;

  /**
   * 获取差异化的请求post列表的请求参数, 因为index category tag search页面的参数不同
   */
  protected abstract getDifferenceRequestPostListParams():{};
  

}
export default BasePostListPageView;