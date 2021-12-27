
class PostListHtmlGetter{

  public static run(postList:any[],url:string,action:string,size:string,pageUrl:string){
    const res = `
      <div 
        class="postList" 
        data-url="${url}"
        data-action="${action}"
        data-size="${size}"
        data-pageurl="${pageUrl}"
      >
        ${this._renderPostList(postList)} 
      </div>
    `;
    return res;
  }


  private static _renderPostList(postList:any[]){
    let res = '';
    for(let post of postList){
      res+=this._renderOnePost(post);
    }
    return res;
  }

  private static _renderOnePost(post:any){
    const res = `
      <div class="postList__CardWrap">
        <div class="postCard">
          ${this._renderPostHeader(post)}
          ${this._renderPostMeta(post)}
          <div class="postCard__excerpt">
          ${post.excerpt}
          </div>
        </div>
      </div>
    `;
    return res;
  }


  private static _renderPostHeader(post:any){
    const category = post.categoryList[0];

    return `
    <div class="postCard__header">
      <a href="${category.url}" class="postCard__category">
        ${category.name}
        <i class="postCard__categoryIcon"></i>
      </a>
      <h2 class="postCard__title">
        <a href="${post.url}" title="">
          ${post.title}
        </a>
      </h2>
    </div>
    `;
  }

  private static _renderPostMeta(post:any){

    const meta = post.meta;

    return `
      <div class="postCard__meta">
        <time class="postCard__createTime">
          <i class="fa fa-clock"></i>
          ${post.create_date}
        </time>
        <span class="postCard__author">
          <i class="fa fa-user"></i>
          <span href="#">${post.authorName}</span>
        </span>
        <span class="postCard__viewCount">
          <i class="fa fa-eye"></i>
          阅读(${meta._q1_field_post_viewCount})
        </span>
        <span class="postCard__commentCount">
          <i class="fa fa-comments"></i>
          评论(${post.commentCount})
        </span>
        <span href="#" class="postCard__likeCount">
          <i class="fa fa-thumbs-up"></i>
          赞(${meta._q1_field_post_likeCount})
        </span>
      </div>
    
    `
  }





}
export default PostListHtmlGetter;