import BaseModel from "./BaseModel";
import HttpHandler from '../lib/HttpHandler';
const httpHandler = new HttpHandler();

type GetCommentListType = {
  postId:number,
  action:string,
}

type LikePostType = {
  postId:number,
  action:string,
}

type GetPostList = {
  action:string,
  orderBy:'create_time'|'update_time'|'rand',
  categoryId?:number,
  tagId?:number,
  s?:string,
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
    return res as any as {count:number};
  }

  public static async getPostList(url:string,params:GetPostList,page:number,size:number){
    const res = await httpHandler.get(url,{
      ...params,
      page,
      size,
    });
    return res;
  }


}
export default PostModel;