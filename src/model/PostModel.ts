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


}
export default PostModel;