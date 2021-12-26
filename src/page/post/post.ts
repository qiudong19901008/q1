import './post.css';
import {
  getCookie,
  isAlreadyLike,
} from '../../lib/helper';
import {
  getCommentListHtml,
} from '../../lib/htmlGetter';
import PostModel from '../../model/PostModel';
import CommentView from './CommentView';
import CookieHandler from '../../lib/CookieHandler';
import * as $ from 'jquery';

const commentView = new CommentView();
class PostView{

  /**
   * 页面初始化
   * 
   */
  public async initral(){
    const cookieKey = $('.postContent__like').data('cookie');
    if(isAlreadyLike(cookieKey)){
      $('.postContent__like').addClass('postContent__like--done');
    }
    this._bindEvents();
    await commentView.initral();
    
  }


  /**事件处理函数 */

  /**
   * 给文章点赞事件处理函数
   */
   protected async likePostHandler(){
    const postId = $('.postContent__like').data('id');
    const cookieKey = $('.postContent__like').data('cookie');
    if(isAlreadyLike(cookieKey)){
      alert('您已经点过赞了!');
      return;
    }
    const url = $('.postContent__like').data('url');
    const action = $('.postContent__like').data('action');
    const {likeCount} = await PostModel.likePost(url,{
      postId,
      action
    });
    $('.postContent__like').addClass('postContent__like--done');
    $('.postContent__likeCount').html(likeCount+'');    
    //设置cookie
    
    CookieHandler.setItem(
      cookieKey,
      postId,
      Infinity,
      window.location.pathname,
      window.location.host,
      false,
    );
  }


  private _bindEvents(){
    //点赞事件
    $('.postContent__like').on('click',this.likePostHandler);
  }



}

const postView = new PostView();



$(function(){
  postView.initral();
})






// 点赞
// $('#like').on('click',(e)=>{
//   const id = $('#like').data('id');
//   //判断是否已点赞
//   if(isAlreadyLike(id)){
//     alert('您已经点过赞了!');
//     return;
//   }
//   const data = {
//     postId: id,
//     action:'q1_api_like_post',
//   };
//   $.ajax({
//     url:'/zixuehu/wp-admin/admin-ajax.php',
//     method:'POST',
//     data,
//     success:(data)=>{
//       $('#like').addClass('done');
//       $('#like span').html(data);
//       $('#likeShow').html(data); 
//     },
//     error:(e)=>{
//       console.log(e);
//       alert('点赞失败');
//     }
//   })
  
// })

// 提交评论
// $('#cardCommentFormContainer .submit-btn').on('click',(e)=>{
//   // 阻止表单提交
//   e.preventDefault();
//   // 获取提交信息
//   const name = $('#name').val();
//   const email = $('#email').val();
//   const website = $('#website').val();
//   const content = $('#cardCommentFormContainer .comment-content textarea').val();
//   const postId = $('#cardCommentFormContainer').data('post-id');
//   const data = {
//     name,
//     email,
//     website,
//     postId,
//     content,
//   };
//   console.log(
//     data
//   )
  // const data = {
  //   name,
  //   email,
  //   website,
  //   action:'q1_ajax_submit_comment',
  // };
  // $.ajax({
  //   url:'/zixuehu/wp-admin/admin-ajax.php',
  //   method:'POST',
  //   data,
  //   success:(data)=>{
  //     alert('成功!')
  //   },
  //   error:(e)=>{
  //     alert('提交评论失败');
  //   }
  // })
// })