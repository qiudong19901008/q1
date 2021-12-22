import * as $ from 'jquery';

$('.mobileMenu__item').on('click',(e)=>{
  // $('.mobileMenu__item').removeClass('mobileMenu__item--active');
  $(".mobileMenu__item").not(this).removeClass('mobileMenu__item--active');
  const $current = $(e.currentTarget);
  if($current.hasClass('mobileMenu__item--active')){
    $current.removeClass('mobileMenu__item--active');
  }else{
    $current.addClass('mobileMenu__item--active');
  }
  
});