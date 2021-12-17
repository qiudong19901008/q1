
import CommentListHtmlGetter from "./CommentListHtmlGetter";
import PostListHtmlGetter from "./PostListHtmlGetter";
import PaginationHtmlGetter from "./PaginationHtmlGetter";




const getCommentListHtml = (commentList:any[],url:string,action:string,size:string,postId:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action,size,postId);
}

const getPostListHtml = (postList:any[],url:string,action:string,size:string,pageUrl:string)=>{
  return PostListHtmlGetter.run(postList,url,action,size,pageUrl);
}

const getPaginationHtml = (currentPage:number,totalCount:number,size:number)=>{
  return PaginationHtmlGetter.run(currentPage,totalCount,size);
}






export {
  getCommentListHtml,
  getPostListHtml,
  getPaginationHtml,
}