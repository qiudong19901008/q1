
import CommentListHtmlGetter from "./CommentListHtmlGetter";



const getCommentListHtml = (commentList:any[],url:string,action:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action);
}









export {
  getCommentListHtml,
}