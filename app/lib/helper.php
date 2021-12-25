<?php


/**
 * 获取值, 没有则使用默认值
 */
 function getValue($value,$default){
  return !empty($value)?$value:$default;
 }


/**
 * cookie是否包含某个值
 */
function has_cookie($cookie_name){
  if(isset($_COOKIE[$cookie_name])){
    return true;
  }else{
    return false;
  }
}

/**
 * 设置cookie
 */
function setQ1Cookie($key,$value,$path='/',$expire=60*60*24*30){
  $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
  return setcookie($key,$value,$expire,$path,$domain,false);
}

/**
 * 返回json数据
 * @param array $data
 */
function json($data){
  header('Content-Type:application/json');
  echo json_encode($data);
  die;
}

/**
 * errorCode: 0
 * msg: "操作成功"
 * requestUrl: "PUT /rws/siteType/update/8"
 */
function success($method,$action,$msg='操作成功'){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>0,
    'msg'=>$msg,
    'requestUrl'=>$method . ' ' . $action,
  ]);
  die;
}

/**
 * errorCode: 0
 * msg: "操作失败"
 * requestUrl: "PUT /rws/siteType/update/8"
 */
function failed($method,$action,$msg='操作失败',$errorCode=ErrorCodes::Q1_ERRCODE_COMMON){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>$errorCode,
    'msg'=>$msg,
    'requestUrl'=>$method . ' ' . $action,
  ]);
  die;
}

