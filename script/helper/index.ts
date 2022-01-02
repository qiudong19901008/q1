import fillZero from "./fillZero";
import * as fs from 'fs';


/**
   * 获取本地日期字符串
   * @param date 
   * @param dateSeparate 
   * @param withTime 
   * @returns 
   */
const getLocalDateStr = (date:Date,dateSeparate = '-',withTime=true)=>{
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


export {
  getLocalDateStr,
}