import './search.css';
import * as $ from 'jquery';
import BasePostListPageView from '../BasePostListPageView';

class SearchView extends BasePostListPageView{
  


  protected updatePageStructure(postListHtml: string, paginationHtml: string): void {
    $('.searchPageContent__postListWrap').html(postListHtml);
    $('.searchPageContent__paginationWrap').html(paginationHtml);
  }

  protected getDifferenceRequestPostListParams() {
    const s = $('.searchPageContent').data('s');
    return {
      s,
    };
  }


}

// const searchView = new SearchView();

// $(function(){
//   searchView.initral();
// })


export default SearchView;