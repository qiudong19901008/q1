const Deployer = require('./service/Deployer');
const {deployConfig} = require('./config/config');



new Deployer(
  deployConfig.sourceDirPath,
  deployConfig.ignoreFnList,
  deployConfig.siteRootDir,
  deployConfig.oldDirPath,
).deploy();

