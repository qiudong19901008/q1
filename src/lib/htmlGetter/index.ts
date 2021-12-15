
import CommentListHtmlGetter from "./CommentListHtmlGetter";
import PostListHtmlGetter from "./PostListHtmlGetter";




const getCommentListHtml = (commentList:any[],url:string,action:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action);
}

const getPostListHtml = (postList:any[],url:string,action:string)=>{
  return PostListHtmlGetter.run(postList,url,action);
}







export {
  getCommentListHtml,
  getPostListHtml,
}