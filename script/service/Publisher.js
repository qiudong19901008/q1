const {exec,cp,rm,cd} = require('shelljs');
const fs = require('fs');

/**
 * 部署
 * 1. 删除发布文件夹的内容
 * 2. 把主题文件复制到发布文件夹
 * 3. 覆盖发布文件夹的某些文件
 */

class Publisher{
  
  _sourceDirPath;
  _oldDirPath;
  _ignoreFnList;
  _coverFileObjArr; // {oldFilePath:string,newFilePath:string}[]

  /**
   * 
   * @param {*} sourceDirPath 源代码的根文件夹
   * @param {*} ignoreFnList 源代码中复制时需要忽略的文件名称
   * @param {*} oldDirPath 网站需要被替换掉的老文件夹, 比如Q5主题
   * @param {*} coverFileObjArr 需要被覆盖的文件列表
   */
  constructor(sourceDirPath,ignoreFnList,oldDirPath,coverFileObjArr){
    this._sourceDirPath = sourceDirPath;
    this._ignoreFnList = ignoreFnList;
    this._oldDirPath = oldDirPath;
    this._coverFileObjArr = coverFileObjArr
  }

  run(){
    this._deleteOldDir();
    this._copyAsNewDir();
    this._coverFileList();
  }

  //1. 
  _deleteOldDir(){
    if(!fs.existsSync(this._oldDirPath)){
      fs.mkdirSync(this._oldDirPath,{recursive:true});
    }
    const fnList = fs.readdirSync(this._oldDirPath);
    for(let fn of fnList){
      rm('-r',[`${this._oldDirPath}/${fn}`]);
    }
    console.log('1-老文件夹删除完毕');
  }

  //2. 
  _copyAsNewDir(){
    // const sourcePath = 'E:/test-site/q5/wp-content/themes/q5';
    const fnList = fs.readdirSync(this._sourceDirPath);
    for(let fn of fnList){
      if(this._ignoreFnList.includes(fn)){
        continue;
      }
      cp('-r',`${this._sourceDirPath}/${fn}`,`${this._oldDirPath}/`);
    }
    console.log('2-复制变成新文件夹完毕');
  }

  //3. 覆盖某些文件
  _coverFileList(){
    // {needToBeCoveredFilePath:string,coverFilePath:string}[]
    for(let fileObj of this._coverFileObjArr){
      const coverFilePath = fileObj['coverFilePath'];
      const needToBeCoveredFilePath = fileObj['needToBeCoveredFilePath'];
      const realNeedToBeCoveredFilePath = needToBeCoveredFilePath.replace(this._sourceDirPath,this._oldDirPath);

      // console.log(
      //   coverFilePath,
      //   needToBeCoveredFilePath,
      //   realNeedToBeCoveredFilePath,
      // )
      cp('-r',coverFilePath,realNeedToBeCoveredFilePath);
    }
    console.log('3-覆盖文件完毕');
  }


}

module.exports = Publisher;




// node script/Publisher.js