import './index.css';
import * as $ from 'jquery';
import PostModel from '../../model/PostModel';
import {
  getPaginationHtml,
  getPostListHtml,
} from '../../lib/htmlGetter';
import config from '../../config/config';


class IndexView{

  public async initral(){
    //可能是在不同的page页刷新
    const path = location.pathname;
    const pathPiece = path.split('/');
    let page = pathPiece[pathPiece.length-1];
    if(page === ''){ //第一页
      page = '1';
    }
    //更新html
    await this._updatePostListAndPaginationHtml(parseInt(page));
    //分页按钮点击事件
    $('.pagination__page').on('click',this._paginationHandler);
    //后退前进按钮点击事件
    window.addEventListener('popstate', async (e)=> { 
      const path = location.pathname;
      const pathPiece = path.split('/');
      let page = pathPiece[pathPiece.length-1];
      if(page === ''){ //第一页
        page = '1';
      }
      await this._updatePostListAndPaginationHtml(parseInt(page)); 	
      $('.pagination__page').on('click',this._paginationHandler);
　　});
    
  }

  //分页点击处理函数
  private _paginationHandler = async (e:JQuery.ClickEvent<HTMLElement, undefined, HTMLElement, HTMLElement>)=>{
    const page = e.currentTarget.innerText;
    const className = e.currentTarget.className;
    if(this._isPageActive(className)){
      return;
    }
    await this._updatePostListAndPaginationHtml(parseInt(page));
    if(page === '1'){
      window.history.pushState(null, null, `http://localhost/zixuehu/`);
    }else{
      window.history.pushState(null, null, `http://localhost/zixuehu/page/${page}`);
    }
    //重新绑定事件
    $('.pagination__page').on('click',this._paginationHandler);
  }
  
  private _isPageActive(className:string){
    if(className.includes('pagination__page--current')){
      return true;
    }
    return false;
  }

  private async _updatePostListAndPaginationHtml(page=1){
    const url = $('.postList').data('url');
    const action = $('.postList').data('action');
    const size = $('.postList').data('size');
    const {list,count} = await PostModel.getPostList(url,{
      action,
      orderBy:'create_time',
    },page,parseInt(size));
    const postListHtml = getPostListHtml(list,url,action,size);
    const paginationHtml = getPaginationHtml(page,count,size);
    $('.indexPageContent__postListWrap').html(postListHtml);
    $('.indexPageContent__paginationWrap').html(paginationHtml);
  }
}

const indexView = new IndexView();

$(function(){
  indexView.initral();
})
