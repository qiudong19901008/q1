import * as $ from 'jquery';

$('.mobileMenu__itemIcon').on('click',(e)=>{
  const icon = $(e.currentTarget);
  const item = icon.parent();
  item.siblings().removeClass('mobileMenu__item--active');
  if(item.hasClass('mobileMenu__item--active')){
    item.removeClass('mobileMenu__item--active');
  }else{
    item.addClass('mobileMenu__item--active');
  }
  
  
  
})