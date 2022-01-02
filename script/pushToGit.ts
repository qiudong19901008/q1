import {exec} from 'shelljs';
import { getLocalDateStr } from './helper';


const pushToGit = ()=>{
  const timeStr = getLocalDateStr(new Date(),'',false);
  const mark = process.env.npm_config_mark;
  let comment = mark;
  if(!comment){
    comment = timeStr;
  }
  exec(`git add . && git commit -m'${comment}' && git push origin`);
}


pushToGit();

