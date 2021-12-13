// const $ = require("jquery");



//获取评论html
const getCommentsHtml = (commentList,url,action)=>{
  const res = `
    <div 
      class="commentList" 
      data-url="${url}"
      data-action="${action}"
      data-postid="<?php echo get_the_ID(); ?>"
    >
      ${renderCommentItemList(commentList)} 
    </div>
  `;
  return res;
}

const renderCommentItemList = (commentList)=>{
  const res = '';
  for(let comment of commentList){
    const one = renderOneCommentItem(comment);
    res+=one;
  }
  return res;
}


const renderOneCommentItem = (comment)=>{
  const res = `
  <div class="commentList__item">
    <div class="commentList__cardWrap">
      ${renderTopComment(comment)}
    </div>
    <div class="commentList__cardChild">
      ${renderChildComments(comment)}
    </div>
  </div>
  `;
  return res;
}



const renderTopComment = (comment)=>{
  return renderCommentCard(comment);
}

const renderChildComments = (comment)=>{
  const res = '';
  const childCommentList = comment.offspring;
  for(let comment of childCommentList){
    const subHtml = `
      <div class="commentList__childCardWrap">
        ${renderCommentCard(comment)}
      </div>
    `;
    res+=subHtml;
  }
  return res;
}


const renderCommentCard = (comment)=>{
  const res = `
    <div class="commentCard">
      <div class="commentCard__left">
        <img 
          class="commentCard__portrait"
          src="https:/meizidao.cc/core/assets/ec9d89bc94/img/avatar-default.png" 
          alt=""
        >
      </div>
      <div class="commentCard__right">
        <div class="commentCard__author">${comment.commentAuthor}</div>
        <p class="commentCard__content">${comment.commentContent}</p>
        <div class="commentCard__meta">
          <div class="commentCard__time">${comment.commentDate}</div>
          <div class="commentCard__replyWho">@Zke</div>
          <a class="commentCard__replyBtn">回复</a>
        </div>
      </div>
    </div>
  `;
  return res;
}


// module.exports=getCommentsHtml;

export default getCommentsHtml;