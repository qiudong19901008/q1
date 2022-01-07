const config = {

  secondaryThemeDirName:'zixuehu',
  defaultPublicPath:'/wp-content/themes/hedao/q1/assets',
  defaultOutputPath:'q1/assets',

}

const getPublicPath = ()=>{
  let res = config.defaultPublicPath;
  if(config.secondaryThemeDirName){
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