import * as $ from 'jquery';
import 'font-awesome/css/font-awesome.min.css';
import './common.css';

import '../../../frontend/common/menu/menu';
import '../../../frontend/common/mobileMenu/mobileMenu';
import '../../../frontend/siteHeader/siteHeader';

import IndexView from '../index';
import CategoryView from '../category/category';
import TagView from '../tag/tag';
import PostView from '../post/post';
import SearchView from '../search/search';
import { PageTypeType } from '../../lib/type';

class CommonView{

  //判断是哪个页面, 然后执行对应页面的初始化工作
  public initral(){
    const pageType = $('.siteHeaderWrapWrap').data('pagetype') as PageTypeType;
    switch(pageType){
      case 'category':
        new CategoryView().initral();
        break;
      case 'tag':
        new TagView().initral();
        break;
      case 'post':
        new PostView().initral();
        break;
      case 'search':
        new SearchView().initral();
        break;
      case 'index':
      default:
        new IndexView().initral();
    }
  }

  

}

const commonView = new CommonView();

$(function(){
  commonView.initral();
})

export default CommonView;




