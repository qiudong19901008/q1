
const Publisher = require('./service/Publisher');

const {publishConfig} = require('./config/config');


new Publisher(
  publishConfig.sourceDirPath,
  publishConfig.ignoreFnList,
  publishConfig.oldDirPath,
  publishConfig.coverFileObjArr,
).run();

// node ./script/publish.js

