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
   * 1. 获取被回复评论的id
   * 2. 使用获取的id 设置回复框的parentid
   */
   protected replyBtnHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
      //拿到被回复楼层的id，作为回复者的parentId
      const dataMap = e.currentTarget.dataset;
      const parentId = dataMap.id?dataMap.id:0;
      //设置commentForm__content的父id
      $('.commentForm__content').data('parentid',parentId);
   }

   /**
    * 内容输入框失去焦点时处理函数
    * 1. 重置回复框的parentid
    */
    protected contentInputBoxBlurHandler = async()=>{
      this._resetContentInputBoxParentId();
      // console.log($('.commentForm__content').data('parentid'))
    }

    /**
     * input框获得焦点时处理函数
     */
    protected inputBoxFocusHandler = async()=>{
      this._hideTips();
    }

    /**
     * 重置评论表单
     * 
     */
    protected resetFormHandler=async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
      this._resetContentInputBoxParentId();
      this._resetCommentForm();
    }

  /**
   * 提交评论表单处理函数
   * 1. 获取提交的数据
   * 2. 验证表单数据
   * 3. 提交
   * 4. 告诉评论者评论状态
   */
    protected submitFormHandler = async(e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
      try{


         //1.
          const url = $('.commentForm').data('url');
          const action = $('.commentForm').data('action');
          const postId = $('.commentForm').data('postid');
          const author = $('.commentForm__authorNickname').val() as string;
          const email = $('.commentForm__authorEmail').val() as string;
          const authorUrl = $('.commentForm__authorWebsite').val() as string;
          const content = $('.commentForm__content').val() as string;
          const parentId = $('.commentForm__content').data('parentid');
          //2. 
          if(!author){
            this._showTips('请输入您的昵称!');
            return;
          }
          if(!content){
            this._showTips('请输入您评论的内容!');
            return;
          }
          this._openLoading();
          //3. 
          const res = await PostModel.addOneComment(url,{
            action,
            postId,
            author,
            authorUrl,
            content,
            parentId,
            email,
          });
          //4. 
          if(res.errorCode === 0){ //成功后清除表单数据
            alert('提交成功, 审核通过后放出');
            this._resetCommentForm();
          }else{
            alert('提交失败');
          }
          this._closeLoading();
      }catch(e){
        this._closeLoading();
        throw e;
      }      

    }

  private _openLoading(){
    $('.commentSection__mask').removeClass('hide');
  }
  private _closeLoading(){
    $('.commentSection__mask').addClass('hide');
  }

  private _resetContentInputBoxParentId(){
    $('.commentForm__content').data('parentid',"0");
  }

  private _resetCommentForm(){
    $('.commentForm__authorNickname').val('');
    $('.commentForm__authorEmail').val('');
    $('.commentForm__authorWebsite').val('');
    $('.commentForm__content').val('');
    this._resetContentInputBoxParentId();
  }
  
  private _showTips(info:string){
    $('.commentForm__tips').text(info).removeClass('hide');
  }

  private _hideTips(){
    $('.commentForm__tips').text('').addClass('hide');
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
    $('.commentSection .commentCard__replyBtn').on('click',this.replyBtnHandler);
   }

   // 只绑定一次事件, 因为这些dom元素不会改变, 不需要重复绑定
   protected bindOnlyOnceEvents(){
    // 内容输入框失去焦点事件
    // $('.commentForm__content').on('blur',this.contentInputBoxBlurHandler);
    // 输入框获得焦点事件
    $('.commentForm__authorNickname').on('focus',this.inputBoxFocusHandler);
    $('.commentForm__authorEmail').on('focus',this.inputBoxFocusHandler);
    $('.commentForm__authorWebsite').on('focus',this.inputBoxFocusHandler);
    $('.commentForm__content').on('focus',this.inputBoxFocusHandler);
    
    // 评论表单提交事件
    $('.commentSection .commentForm__submitBtn').on('click',this.submitFormHandler);
    // 重置表单事件
    $('.commentSection .commentForm__resetBtn').on('click',this.resetFormHandler);
    
   }




}

export default CommentView;