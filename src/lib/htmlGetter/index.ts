
import CommentListHtmlGetter from "./CommentListHtmlGetter";
import PostListHtmlGetter from "./PostListHtmlGetter";
import PaginationHtmlGetter from "./PaginationHtmlGetter";




const getCommentListHtml = (commentList:any[],url:string,action:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action);
}

const getPostListHtml = (postList:any[],url:string,action:string)=>{
  return PostListHtmlGetter.run(postList,url,action);
}

const getPaginationHtml = (currentPage:number,totalPage:number)=>{
  return PaginationHtmlGetter.run(currentPage,totalPage);
}






export {
  getCommentListHtml,
  getPostListHtml,
}