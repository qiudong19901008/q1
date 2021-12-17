

class CommentListHtmlGetter{

  //获取评论html
  public static run(commentList:any[],url:string,action:string,size:string,postId:string){
    const res = `
      <div 
        class="commentList" 
        data-url="${url}"
        data-action="${action}"
        data-postid="${postId}"
        data-size="${size}"
      >
        ${this._renderCommentItemList(commentList)} 
      </div>
    `;
    return res;
  }

  private static _renderCommentItemList(commentList:any[]){
    let res = '';
    for(let comment of commentList){
      const one = this._renderOneCommentItem(comment);
      res+=one;
    }
    return res;
  }

  private static _renderOneCommentItem(comment:any){
    const res = `
    <div class="commentList__item">
      <div class="commentList__cardWrap">
        ${this._renderTopComment(comment)}
      </div>
      ${this._maybeAddChildComments(comment)}
    </div>
    `;
    return res;
  }

  // <div class="commentList__cardChild">
  //       ${this._renderChildComments(comment)}
  //     </div>
  private static _maybeAddChildComments(comment:any){
    if(comment.offspring.length > 0){
      return `
      <div class="commentList__cardChild">
        ${this._renderChildComments(comment)}
      </div>
      `
    }else{
      return '';
    }

  }

  private static _renderTopComment = (comment:any)=>{
    return CommentListHtmlGetter._renderCommentCard(comment);
  }
  
  private static _renderChildComments = (comment:any)=>{
    let res = '';
    const childCommentList = comment.offspring;
    for(let comment of childCommentList){
      const subHtml = `
        <div class="commentList__childCardWrap">
          ${CommentListHtmlGetter._renderCommentCard(comment)}
        </div>
      `;
      res+=subHtml;
    }
    return res;
  }

  private static _renderCommentCard = (comment:any)=>{
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
            ${CommentListHtmlGetter._mayBeAddhaveReplyWho(comment)}
            <a class="commentCard__replyBtn">回复</a>
          </div>
        </div>
      </div>
    `;
    return res;
  }

  private static _mayBeAddhaveReplyWho(comment:any){
    if(comment.replyPersonName){
      return `<div class="commentCard__replyWho">@${comment.replyPersonName}</div>`
    }else{
      return '';
    }
  }
  

}
export default CommentListHtmlGetter;