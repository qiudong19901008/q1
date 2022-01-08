import './post.css';
import {
  getCookie,
  isAlreadyLike,
} from '../../lib/helper';
import PostModel from '../../model/PostModel';
import CommentView from './CommentView';
import CookieHandler from '../../../inc/CookieHandler';
import * as $ from 'jquery';


const commentView = new CommentView();
class PostView{

  /**
   * 页面初始化
   */
  public async initral(){
    const cookieKey = $('.postContent__like').data('cookie');
    if(isAlreadyLike(cookieKey)){
      $('.postContent__like').addClass('postContent__like--done');
    }
    this._bindEvents();

    //是否需要开启评论
    const commentStatus = $('.postPageContent').data('commentstatus');
    if(commentStatus == '1'){
      await commentView.initral();
    }
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

export default PostView;

// const postView = new PostView();



// $(function(){
//   postView.initral();
// })





