import * as $ from 'jquery';
import PostModel from '../../model/PostModel';
import {
  getCommentListHtml,
  getPaginationHtml,
} from '../../lib/htmlGetter';

class CommentView{

  public async initral(){
    await this.getDataThenUpdatePageStructure(1);
    this.bindOnlyOnceEvents();
    this.bindEvents();
  }

  /***事件处理函数 */

  /**
   * 分页处理函数, 该函数会被点击分页按钮触发
   * 1. 更新页面结构
   * 2. 绑定事件
   */
   protected pagedHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
     this._openLoading();
    const page = e.currentTarget.innerText;
    const className = e.currentTarget.className;
    if(this.isCurrentPage(className)){
      return;
    }
    //1. 
    await this.getDataThenUpdatePageStructure(parseInt(page));
    //2.
    this.bindEvents();
    this._closeLoading();
  }

  /**
   * 回复按钮点击处理函数
   * 1. 
   * 2. 
   */
   protected replyBtnHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
      e.preventDefault();
      console.log(e.data);
      // $('.commentForm__content').data('parentid','')
    // onblur
   }



  /**
   * 提交评论处理函数
   * 1. 
   * 2. 
   */
  protected submitCommentHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
    const author = $('.commentForm__authorNickname');
    const email = $('.commentForm__authorEmail');
    const url = $('.commentForm__authorWebsite');
    const postid = $('.commentForm').data('postid');
    // const 


  }

  private _openLoading(){
    $('.commentSection__mask').removeClass('hide');
  }
  private _closeLoading(){
    $('.commentSection__mask').addClass('hide');
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

    const postId = $('.commentList').data('postid');
    const url = $('.commentList').data('url');
    const action = $('.commentList').data('action');
    const size = $('.commentList').data('size');

    const params = {
      postId:parseInt(postId),
      action,
    }
    const {list,count} = await PostModel.getCommentList(url,params,page,parseInt(size));
    const commentListHtml = getCommentListHtml(list,url,action,size,postId);
    const paginationHtml = getPaginationHtml(page,count,size);
    $('.commentSection__listWrap').html(commentListHtml);
    $('.commentSection__paginationWrap').html(paginationHtml);
  }

   // 绑定事件
   protected bindEvents(){
    // 分页按钮点击事件
    $('.commentSection .pagination__page').on('click',this.pagedHandler);
    // 回复按钮点击事件
    $('.commentSection .commentCard__replyBtn').on('click',this.pagedHandler);
   }

   // 只绑定一次事件, 因为该dom元素不会改变, 不需要重复绑定
   protected bindOnlyOnceEvents(){
    // 评论表单提交事件
    $('.commentSection .commentForm__submitBtn').on('click',this.submitCommentHandler);
   }




}

export default CommentView;