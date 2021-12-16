
import CommentListHtmlGetter from "./CommentListHtmlGetter";
import PostListHtmlGetter from "./PostListHtmlGetter";
import PaginationHtmlGetter from "./PaginationHtmlGetter";




const getCommentListHtml = (commentList:any[],url:string,action:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action);
}

const getPostListHtml = (postList:any[],url:string,action:string,size:string)=>{
  return PostListHtmlGetter.run(postList,url,action,size);
}

const getPaginationHtml = (currentPage:number,totalCount:number,size:number)=>{
  return PaginationHtmlGetter.run(currentPage,totalCount,size);
}






export {
  getCommentListHtml,
  getPostListHtml,
  getPaginationHtml,
}