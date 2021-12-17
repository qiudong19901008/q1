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

const commentView = new CommentView();
class PostView{

  /**
   * 页面初始化
   * 1. 加载评论列表
   */
  public async initral(){
    // this._getCommentListHtml(1);
    // this._bindEvents();
    // commentView
    await commentView.initral();
  }

  private async _bindEvents(){
    //点赞事件
    $('.like').on('click',async ()=>{
      await this._likePost();
    })
  }

  /**
   * 获取评论列表
   */
  private async _getCommentListHtml(page=1){
    const postId = $('.commentList').data('postid');
    const url = $('.commentList').data('url');
    const action = $('.commentList').data('action');
    const size = $('.commentList').data('size');
    const {list,count} = await PostModel.getCommentList(url,{
      postId,
      action,
    },page,parseInt(size));
    const commentListHtml = getCommentListHtml(list,url,action,size,postId);
    $('.commentSection__listWrap').html(commentListHtml);
  }

  /**
   * 给文章点赞
   */
  private async _likePost(){
    const postId = $('.like').data('id');
    if(isAlreadyLike(postId)){
      alert('您已经点过赞了!');
      return;
    }
    const url = $('.like').data('url');
    const action = $('.like').data('action');
    const {count} = await PostModel.likePost(url,{
      postId,
      action
    });
    $('.like').addClass('done');
    $('.like span').html(count+'');
    $('.likeShow').html(count+''); 
    
  }

}

const postView = new PostView();



$(function(){
  postView.initral();
  // commentView
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