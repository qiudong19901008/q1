import './tag.css';

import * as $ from 'jquery';
import BasePostListPageView from '../BasePostListPageView';

(window as any)['jQuery'] = $; (window as any)['$'] = $;

class TagView extends BasePostListPageView{
  


  protected updatePageStructure(postListHtml: string, paginationHtml: string): void {
    $('.tagPageContent__postListWrap').html(postListHtml);
    $('.tagPageContent__paginationWrap').html(paginationHtml);
  }

  protected getDifferenceRequestPostListParams() {
    const tagSlug = $('.tagPageContent').data('slug');
    return {
      tagSlug,
    };
  }


}

// const tagView = new TagView();

// $(function(){
//   tagView.initral();
// })

export default TagView;