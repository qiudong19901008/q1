const config = {

  secondaryThemeDirName:'',
  defaultPublicPath:'/wp-content/themes/hedao/q5/assets',
  defaultOutputPath:'q5/assets',

}

const getPublicPath = (secondaryThemeDirName)=>{
  let res = config.defaultPublicPath;
  if(secondaryThemeDirName){
    res = `/${config.secondaryThemeDirName}${config.defaultPublicPath}`;
  }
  return res;
}

const getOutputPath = ()=>{
  return config.defaultOutputPath;
}

module.exports = {
  getPublicPath,
  getOutputPath,
}