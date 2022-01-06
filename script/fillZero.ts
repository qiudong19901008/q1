const fillZero = (num:number,len:1|2|3|4=4)=>{
  let res:string;
  switch(len){
    case 1:
      res = num +'';
      break;
    case 2:
      res = _fillZeroWithLenTwo(num);
      break;
    case 3:
      res = _fillZeroWithLenThree(num);
      break;
    case 4:
      res = _fillZeroWithLenFour(num);
      break;
  }
  return res;
}

const _fillZeroWithLenTwo = (num:number)=>{
  let str:string;
  if(num<10){
    str = '0'+num;
  }else{
    str = num+'';
  }
  return str;
}

const _fillZeroWithLenThree = (num:number)=>{
  let res:string;
  if(num<=9 && num>=0){
    res = '00'+num
  }else if(num <=99 && num>=10){
    res = '0'+num
  }else{
    res = ''+num
  }
  return res;
}

const _fillZeroWithLenFour = (num:number)=>{
  let res = ''
  if(num<=9 && num>=0){
    res = '000'+num
  }else if(num <=99 && num>=10){
    res = '00'+num
  }else if(num<=999 && num>=100){
    res = '0'+num
  }else{
    res = ''+num
  }
  return res;
}

export default fillZero;