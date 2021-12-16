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
const isAlreadyLike = (id:number)=>{
  const cookies = getCookie(`q1_cookie_like_post_${id}`);
  if(cookies){
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
  getCookie,
  isAlreadyLike,
  isInt,
}