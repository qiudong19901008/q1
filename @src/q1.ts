import * as $ from 'jquery';
// import 'font-awesome/css/font-awesome.min.css';
import './q1.css';

import '../template-parts/components/index/carousel/carousel';
import '../template-parts/components/common/menu/menu';
import '../template-parts/components/common/mobileMenu/mobileMenu';
import '../template-parts/components/common/siteHeader/siteHeader';

import IndexView from './view/index/index';
import CategoryView from './view/category/category';
import TagView from './view/tag/tag';
import PostView from './view/post/post';
import SearchView from './view/search/search';
import { PageTypeType } from './lib/type';


//判断是哪个页面, 然后执行对应页面的初始化工作

const initralQ1 = ()=>{
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

$(function(){
  initralQ1();
})





