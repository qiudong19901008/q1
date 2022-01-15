
import CommentListHtmlGetter from "./CommentListHtmlGetter";
// import PostListHtmlGetter from "./PostListHtmlGetter";
import PostListHtmlGetter from "./PostListTwoHtmlGetter";
import PaginationHtmlGetter from "./PaginationHtmlGetter";
import CookieHandler from "../../../inc/CookieHandler";




const getCommentListHtml = (commentList:any[],url:string,action:string,size:string,postId:string)=>{
  return CommentListHtmlGetter.run(commentList,url,action,size,postId);
}

const getPostListHtml = (postList:any[],url:string,action:string,size:string,pageUrl:string)=>{
  return PostListHtmlGetter.run(postList,url,action,size,pageUrl);
}

const getPaginationHtml = (currentPage:number,totalCount:number,size:number,pageIndexUrl:string)=>{
  return PaginationHtmlGetter.run(currentPage,totalCount,size,pageIndexUrl);
}


/**
 * 根据cookie名称获取cookie
 */
 const getCookie = (cookieName:string)=>{
  var cookieValue="";  
  if (document.cookie && document.cookie != '') {   
      var cookies = document.cookie.split(';');  
      for (var i = 0; i < cookies.length; i++) {   
           var cookie = cookies[i];  
           if (cookie.substring(0, cookieName.length + 2).trim() == cookieName.trim() + "=") {  
                 cookieValue = cookie.substring(cookieName.length + 2, cookie.length);   
                 break;  
           }  
       }  
  }   
  return cookieValue; 
}

/**
 * 是否已经点赞
 * @param id 文章id
 */
const isAlreadyLike = (cookieKey:string)=>{
  const cookie = CookieHandler.getItem(cookieKey);
  if(cookie){
    return true;
  }
  return false;
}

/**
 * 是否是数字
 */
const isInt = (val:string)=>{
  const re = /^\d+$/;
  if(re.test(val)){
    return true;
  }
  return false;
}







export {
  getCommentListHtml,
  getPostListHtml,
  getPaginationHtml,
  getCookie,
  isAlreadyLike,
  isInt,
}