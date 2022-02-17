<?php


namespace hedao\lib\constant;

class ErrorCodes{


  /**用户登录失败 */
  public const HEDAO_USER_LOGIN_FAILED = '10001';

  /**token失效 */
  public const HEDAO_TOKEN_INVALID = '10002';


  /**插入文章失败 */
  public const HEDAO_INSERT_POST_FAILED = '20011';
  /**更新文章失败 */
  public const HEDAO_UPDATE_POST_FAILED = '20012';
  /**删除文章列表失败 */
  public const HEDAO_DELETE_POST_LIST_FAILED = '20013';

}