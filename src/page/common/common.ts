import * as $ from 'jquery';
import 'font-awesome/css/font-awesome.min.css';
import './common.css';

// @import url('../../../frontend/widget/searchCard/searchCard.css');

import '../../../frontend/common/menu/menu';

import '../../../frontend/common/mobileMenu/mobileMenu';

import '../../../frontend/siteHeader/siteHeader';


class CommonView{

  public initral(){
    this._bindEvents();
  }

  private _bindEvents(){
    //点击弹出手机菜单
    // $('.siteHeader__toggleMenuBtn').on('click',(e)=>{
    //   // 禁止滑动
    //   $('body').css('overflow','hidden');
    //   // 显示遮罩
    //   $('.siteHeader__mask').removeClass('hide');
    //   // 显示菜单栏
    //   $('.siteHeader__mobileNavMenuContainer .mobile-menu').css('left',0);
    // });

    

    // 遮罩点击事件
    // $('.siteHeader__mask').on('click',(e)=>{
    //   // 允许滑动
    //   $('body').css('overflow','auto');
    //   // 关闭菜单栏, 搜索框和遮罩
    //   $('.siteHeader__mobileNavMenuContainer .mobile-menu').css('left','-60%');
    //   $('.siteHeader__searchForm').addClass('hide');
    //   $('.siteHeader__mask').addClass('hide');
    //   // 图标还原 搜索
    //   $('.siteHeader__searchFormBtnIcon').removeClass('fa-remove');
    // })
  }

}

const commonView = new CommonView();

$(function(){
  commonView.initral();
  
})

export default CommonView;




