
//
const deployConfig = {
  sourceDirPath:'E:/test-site/q1/wp-content/themes/q1',
  ignoreFnList : ['node_modules','.git'],
  siteRootDir : 'E:/MYSITE/w2fenx',
  oldDirPath : 'E:/MYSITE/w2fenx/html/w2fenx.com/wp-content/themes/q1',
}


const publishConfig = {
  sourceDirPath:'E:/test-site/q1/wp-content/themes/q1',
  ignoreFnList : [
    'node_modules','.git','@src','script','test',
    'package-lock.json','package.json','tsconfig.json','.gitignore','remark.md',
    'webpack.dev.js','webpack.prod.js'
  ],
  oldDirPath : 'F:/themes/Q1 v1.0.0',
  coverFileObjArr:[
    {
      needToBeCoveredFilePath:'E:/test-site/q1/wp-content/themes/q1/config/config.php',
      coverFilePath:'E:/test-site/q1/wp-content/themes/q1/test/config.php',
    }
  ]
}

module.exports = {
  deployConfig,
  publishConfig
};