const {
  getLocalDateStr
} = require('./helper');
const {exec,cp,rm,cd} = require('shelljs');
const fs = require('fs');

/**
 * 部署
 * 1. 推送到git
 * 2. 删除老文件夹
 * 3. 复制变成新文件夹
 * 4. 部署到服务器
 */

class Deployer{
  
  _sourceDirPath;
  _oldDirPath;
  _siteRootDir;
  _ignoreFnList;
  _commentMsg;

  /**
   * 
   * @param {*} sourceDirPath 源代码的根文件夹
   * @param {*} ignoreFnList 源代码中复制时需要忽略的文件名称
   * @param {*} siteRootDir 网站根目录 
   * @param {*} oldDirPath 网站需要被替换掉的老文件夹, 比如Q5主题
   */
  constructor(sourceDirPath,ignoreFnList,siteRootDir,oldDirPath){
    this._sourceDirPath = sourceDirPath;
    this._ignoreFnList = ignoreFnList;
    this._siteRootDir = siteRootDir;
    this._oldDirPath = oldDirPath;
    this._getCommentMsg();
  }

  /**
   * 
   * @param {*} sourceDirPath 源代码的根文件夹
   * @param {*} ignoreFnList 源代码中复制时需要忽略的文件名称
   * @param {*} siteRootDir 网站根目录 
   * @param {*} oldDirPath 网站需要被替换掉的老文件夹, 比如Q5主题
   */
  deploy(){
    this.pushToGit();
    this._deleteOldDir();
    this._copyAsNewDir();
    this._deployToSite();
  }

  //0.
  _getCommentMsg(){
    const timeStr = getLocalDateStr(new Date(),'',false);
    const mark = process.env.npm_config_mark;
    let comment = mark;
    if(!comment){
      comment = timeStr;
    }
    this._commentMsg = comment;
  }

  //1. 
  pushToGit(){
    exec(`git add . && git commit -m'${this._commentMsg}' && git push origin`);
    console.log('1-推送到git完毕');
  }

  //2. 
  _deleteOldDir(){
    const fnList = fs.readdirSync(this._oldDirPath);
    for(let fn of fnList){
      rm('-r',[`${this._sourcePath}/${fn}`]);
    }
    console.log('2-老文件夹删除完毕');
  }

  //3. 
  _copyAsNewDir(){
    // const sourcePath = 'E:/test-site/q5/wp-content/themes/q5';
    const fnList = fs.readdirSync(this._sourceDirPath);
    for(let fn of fnList){
      if(this._ignoreFnList.includes(fn)){
        continue;
      }
      cp('-r',`${this._sourceDirPath}/${fn}`,`${this._oldDirPath}/`);
    }
    console.log('3-复制变成新文件夹完毕');
  }

  //4. 
  _deployToSite(){
    cd(this._siteRootDir);
    exec(`git add . && git commit -m'${this._commentMsg}' && git push origin`);
    console.log('4-部署到服务器完毕');
  }




}

module.exports = Deployer;




// node script/Deployer.js