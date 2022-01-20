import * as $ from 'jquery';

//这个有bug, 切换的时候会跳两格

const carouselNext = $('.carousel__next');
const carouselPrev = $('.carousel__prev');
const carouselSlider = $('.carousel__slider');
const carousel = $('.carousel');

const carouselCount = $('.indexPageContent__carouselWrap').data('carouselcount');

const carouselNextFunc = ()=>{
  carouselDirection = 1;
  carousel.css('justifyContent','flex-start');
  carouselSlider.css('transform',`translate(-${100/carouselCount}%)`);
}

let carouselDirection = 1; //1表示next方向, -1表示prev方向

let timer = setInterval(carouselNextFunc,3000);

carouselPrev.on('click',()=>{
  carouselDirection = -1;
  carousel.css('justifyContent','flex-end');
  carouselSlider.css('transform',`translate(${100/carouselCount}%)`);
})

carouselNext.on('click',carouselNextFunc);

carouselSlider.on('transitionend',()=>{
  if(carouselDirection === 1){
    carouselSlider.append(carouselSlider.children().first());
  }else if(carouselDirection === -1){
    carouselSlider.prepend(carouselSlider.children().last());
  }
  
  carouselSlider.css('transition','none');
  carouselSlider.css('transform','translate(0)');
  setTimeout(()=>{
    carouselSlider.css('transition','all .5s');
  })
})

carousel.on('mouseover',()=>{
  clearInterval(timer);
  // console.log('aaa')
})

carousel.on('mouseout',()=>{
  timer = setInterval(carouselNextFunc,3000);
  // console.log('bbb')
})





