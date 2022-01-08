const config = {

  secondaryThemeDirName:'',
  defaultPublicPath:'/wp-content/themes/hedao/q1/assets',
  defaultOutputPath:'q1/assets',

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