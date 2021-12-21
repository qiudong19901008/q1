import * as $ from 'jquery';
import 'font-awesome/css/font-awesome.min.css';
import './common.css';

// @import url('../../../frontend/widget/searchCard/searchCard.css');

import '../../../frontend/common/menu/menu';


class CommonView{

  public initral(){
    this._bindEvents();
  }

  private _bindEvents(){
    //点击弹出手机菜单
    $('.siteHeader__toggleMenuBtn').on('click',(e)=>{
      // 禁止滑动
      $('body').css('overflow','hidden');
      // 显示遮罩
      $('.siteHeader__mask').removeClass('hide');
      // 显示菜单栏
      $('.siteHeader__mobileNavMenuContainer .mobile-menu').css('left',0);
    });

    // 点击弹出搜索框
    $('.siteHeader__toggleSearchFormBtn').on('click',(e)=>{
      // 禁止滑动
      $('body').css('overflow','hidden');
      // 显示搜索框和遮罩
      $('.siteHeader__searchForm').removeClass('hide');
      $('.siteHeader__mask').removeClass('hide');
      // 图标变 X
      $('.siteHeader__searchFormBtnIcon').addClass('fa-remove');
    });

    // 遮罩点击事件
    $('.siteHeader__mask').on('click',(e)=>{
      // 允许滑动
      $('body').css('overflow','auto');
      // 关闭菜单栏, 搜索框和遮罩
      $('.siteHeader__mobileNavMenuContainer .mobile-menu').css('left','-60%');
      $('.siteHeader__searchForm').addClass('hide');
      $('.siteHeader__mask').addClass('hide');
      // 图标还原 搜索
      $('.siteHeader__searchFormBtnIcon').removeClass('fa-remove');
    })
  }

}

const commonView = new CommonView();

$(function(){
  commonView.initral();
  
})

export default CommonView;




