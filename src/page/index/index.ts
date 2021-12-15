import './index.css';
import * as $ from 'jquery';
import PostModel from '../../model/PostModel';
import {
  getPostListHtml,
} from '../../lib/htmlGetter'


class IndexView{

  public initral(){
    this._getPostListHtml();
    
  }

  /**
   * 获取文章列表
   */
  private async _getPostListHtml(page=1,size=10){
    const url = $('.postList').data('url');
    const action = $('.postList').data('action');
    const {list,count} = await PostModel.getPostList(url,{
      action,
      orderBy:'create_time',
    },page,size);
    const postListHtml = getPostListHtml(list,url,action);
    $('.indexPageContent__postListWrap').html(postListHtml);
  }

 


}

const indexView = new IndexView();

$(function(){
  indexView.initral();
})
