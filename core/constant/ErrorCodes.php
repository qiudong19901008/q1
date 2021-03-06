<?php

namespace q1\core\constant;

class ErrorCodes{

  ////////////////////////评论/////////////////////////
  /**
   * Q1主题-ERRCODE-COMMENT-提交评论失败 
   */
  public const Q1_ERRCODE_COMMENT_SUBMIT_COMMENT_FAILED = '10001';


  ////////////////////////文章/////////////////////////
  /**
   * Q1主题-ERRCODE-POST-新增一篇文章失败
   */
  public const Q1_ERRCODE_POST_ADD_ONE_FAILED = '20001';

  ////////////////////////用户/////////////////////////
   /**
   * Q1主题-ERRCODE-USER-登录失败
   */
  public const Q1_ERRCODE_USER_LOGIN_FAILED = '30001';
  /**
   * Q1主题-ERRCODE-USER-token验证失败
   */
  public const Q1_ERRCODE_USER_TOKEN_INVALID = '30002';


  ////////////////////////通用/////////////////////////
  /**
   * Q1主题-ERRCODE-COMMON Q1_ERRCODE_COMMON
   */
  public const Q1_ERRCODE_COMMON = '99999';

}