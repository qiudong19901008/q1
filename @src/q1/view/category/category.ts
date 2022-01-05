import './category.css';
import * as $ from 'jquery';
import BasePostListPageView from '../BasePostListPageView';

class CategoryView extends BasePostListPageView{
  


  protected updatePageStructure(postListHtml: string, paginationHtml: string): void {
    $('.categoryPageContent__postListWrap').html(postListHtml);
    $('.categoryPageContent__paginationWrap').html(paginationHtml);
  }

  protected getDifferenceRequestPostListParams() {
    const categorySlug = $('.categoryPageContent').data('slug');
    return {
      categorySlug,
    };
  }


}

// const categoryView = new CategoryView();

// $(function(){
//   categoryView.initral();
// })
export default CategoryView;