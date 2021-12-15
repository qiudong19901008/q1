import './index.css';
import * as $ from 'jquery';
import PostModel from '../../model/PostModel';
import {
  getPaginationHtml,
  getPostListHtml,
} from '../../lib/htmlGetter'


class IndexView{

  public initral(){
    this._upatePostListAndPaginationHtml();
    // this._bindEvents();
  }

  /**
   * 获取文章列表和分页
   */
  private async _upatePostListAndPaginationHtml(page=1,size=10){
    const url = $('.postList').data('url');
    const action = $('.postList').data('action');
    const {list,count} = await PostModel.getPostList(url,{
      action,
      orderBy:'create_time',
    },page,size);
    const postListHtml = getPostListHtml(list,url,action);
    $('.indexPageContent__postListWrap').html(postListHtml);

    //获取分页
    const paginationHtml = getPaginationHtml(page,count,size);
    $('.indexPageContent__paginationWrap').html(paginationHtml);

   
  }

  /**
   * 绑定事件
   */
  private _bindEvents(){
    console.log('aaa')
    //绑定分页按钮事件
    $('button.pagination__page').on('click',(e)=>{
      console.log(e);
    })
  }

 


}

const indexView = new IndexView();

$(function(){
  indexView.initral();
  console.log(3333);
  // .downloadBtn[data-id=${id}]
  $('.pagination__page[data-page=1]').on('click',(e)=>{
    console.log(3333);
  });
})
