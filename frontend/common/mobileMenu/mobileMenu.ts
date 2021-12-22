import * as $ from 'jquery';

$('.mobileMenu__item').on('click',(e)=>{
  $('.mobileMenu__item').removeClass('mobileMenu__item--active');
  $(e.currentTarget).addClass('mobileMenu__item--active');
});