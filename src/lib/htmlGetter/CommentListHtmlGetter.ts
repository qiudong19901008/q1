

class CommentListHtmlGetter{

  //获取评论html
  public static run(commentList:any[],url:string,action:string){
    const res = `
      <div 
        class="commentList" 
        data-url="${url}"
        data-action="${action}"
        data-postid="<?php echo get_the_ID(); ?>"
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
      <div class="commentList__cardChild">
        ${this._renderChildComments(comment)}
      </div>
    </div>
    `;
    return res;
  }

  private static _renderTopComment = (comment:any)=>{
    // return this._renderCommentCard(comment);
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
            <div class="commentCard__replyWho">@Zke</div>
            <a class="commentCard__replyBtn">回复</a>
          </div>
        </div>
      </div>
    `;
    return res;
  }
  

}
export default CommentListHtmlGetter;