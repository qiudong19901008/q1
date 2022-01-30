const Deployer = require('./Deployer');
const config = require('./config');


new Deployer(
  config.sourceDirPath,
  config.ignoreFnList,
  config.siteRootDir,
  config.oldDirPath,
).pushToGit();