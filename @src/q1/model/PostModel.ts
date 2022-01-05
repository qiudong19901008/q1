import BaseModel from "./BaseModel";
import HttpHandler from "../../lib/HttpHandler";
const httpHandler = new HttpHandler();

export type GetCommentListType = {
  postId:number,
  action:string,
}

export type LikePostType = {
  postId:number,
  action:string,
}

export type GetPostList = {
  action:string,
  orderBy:'create_time'|'update_time'|'rand',
  categoryId?:number,
  tagId?:number,
  s?:string,
  categorySlug?:string,
  tagSlug?:string,
}

export type SubmitCommentType = {
  action:string,
  author:string,
  email:string,
  authorUrl:string,
  postId:number,
  content:string,
  parentId:number,
}

/**
 * 不返回数据的操作结果
 */
export type OperationType = {
  errorCode:number,
  msg:string,
  requestUrl:string,
}

class PostModel extends BaseModel{


  public static async getCommentList(url:string,params:GetCommentListType,page:number,size:number){
    const res = await httpHandler.get(url,{
      ...params,
      page,
      size,
    });
    return res;
  }

  public static async likePost(url:string,data:LikePostType){
    const res = await httpHandler.post(url,{
      ...data,
    });
    return res as any as {likeCount:number};
  }

  public static async getPostList(url:string,params:GetPostList,page:number,size:number){
    const res = await httpHandler.get(url,{
      ...params,
      page,
      size,
    });
    return res;
  }

  public static async addOneComment(url:string,data:SubmitCommentType){
    const res = await httpHandler.post(url,{
      ...data,
    });
    return res as any as OperationType;
  }

}
export default PostModel;