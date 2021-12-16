import './index.css';
import * as $ from 'jquery';
import BasePostListPageView from '../BasePostListPageView';

class IndexView extends BasePostListPageView{
  


  protected updatePageStructure(postListHtml: string, paginationHtml: string): void {
    $('.indexPageContent__postListWrap').html(postListHtml);
    $('.indexPageContent__paginationWrap').html(paginationHtml);
  }


}

const indexView = new IndexView();

$(function(){
  indexView.initral();
})
