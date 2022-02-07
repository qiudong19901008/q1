const fillZero = (num,len)=>{
  let res;
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

const _fillZeroWithLenTwo = (num)=>{
  let str;
  if(num<10){
    str = '0'+num;
  }else{
    str = num+'';
  }
  return str;
}

const _fillZeroWithLenThree = (num)=>{
  let res;
  if(num<=9 && num>=0){
    res = '00'+num
  }else if(num <=99 && num>=10){
    res = '0'+num
  }else{
    res = ''+num
  }
  return res;
}

const _fillZeroWithLenFour = (num)=>{
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



/**
   * 获取本地日期字符串
   * @param date 
   * @param dateSeparate 
   * @param withTime 
   * @returns 
   */
const getLocalDateStr = (date,dateSeparate = '-',withTime=true)=>{
  const yearStr = date.getFullYear()+'';
  const monthStr = date.getMonth()+1+'';
  const dayStr = fillZero(date.getDate(),2);
  const hourStr =  fillZero(date.getHours(),2);
  const minuteStr = fillZero(date.getMinutes(),2);
  const secondStr = fillZero(date.getSeconds(),2);
  if(!withTime){
    return `${yearStr}${dateSeparate}${monthStr}${dateSeparate}${dayStr}`;
  }else{
    return `${yearStr}${dateSeparate}${monthStr}${dateSeparate}${dayStr} ${hourStr}:${minuteStr}:${secondStr}`;
  }
}

module.exports ={
  getLocalDateStr
};