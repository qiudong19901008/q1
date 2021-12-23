import * as $ from 'jquery';

//手机菜单按钮点击事件
$('.siteHeader__toggleMenuBtn').on('click',(e)=>{
  // 禁止滑动
  $('body').css('overflow','hidden');
  // 显示遮罩
  $('.siteHeader__mask').removeClass('hide');
  // 显示菜单栏
  $('.siteHeader__mobileMenuWrap').css('left',0);
});


// 遮罩点击事件
$('.siteHeader__mask').on('click',(e)=>{
  // 允许滑动
  $('body').css('overflow','auto');
  // 关闭菜单栏, 搜索框和遮罩
  $('.siteHeader__mobileMenuWrap').css('left','-60%');
  $('.siteHeader__searchForm').addClass('hide');
  $('.siteHeader__mask').addClass('hide');
  // 图标还原 搜索
  $('.siteHeader__searchFormBtnIcon').removeClass('fa-remove');
})