
class PostListTwoHtmlGetter{

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
        <div class="postCardTwo">
          ${this._renderPostLeft(post)}
          ${this._renderPostRight(post)}
        </div>
      </div>
    `;
    return res;
  }

  private static _renderPostLeft(post:any){
    return `
    <div class="postCardTwo__left">
      <a href="${post.url}" class="postCardTwo__thumb">
        <img src="${post.thumbnail}" alt="" class="postCardTwo__thumbImg">
      </a>
    </div>
    `;
  }

  private static _renderPostRight(post:any){
    return `
    <div class="postCardTwo__right">
      <div class="postCardTwo__rightHeader">
        ${this._renderPostCategoryList(post)}
        ${this._renderPostTitle(post)}
      </div>
      <!-- 简介 -->
      <p class="postCardTwo__excerpt">
        ${post.excerpt}
      </p>
      <!-- meta -->
      <div class="postCardTwo__meta">
        <div class="postCardTwo__metaLeft">
          <time class="postCardTwo__createTime">
            <i class="fa fa-clock"></i>
            ${post.create_date}
          </time>
          <span class="postCardTwo__author">
            <i class="fa fa-user"></i> <span>${post.authorName}</span>
          </span>
        </div>
        <div class="postCardTwo__metaRight">
          <span class="postCardTwo__view">
            <i class="fa fa-eye"></i> <span class="postCardTwo__viewCount">${post.meta._q1_field_post_viewCount}</span>
          </span>
          <span class="postCardTwo__comment">
            <i class="fa fa-comments"></i> <span class="postCardTwo__commentCount">${post.commentCount}</span>
          </span>
          <span href="#" class="postCardTwo__like">
            <i class="fa fa-thumbs-up"></i> <span class="postCardTwo__likeCount">${post.meta._q1_field_post_likeCount}</span>
          </span>
        </div>
      </div>
    </div>
    `
  }

  private static _renderPostTitle(post:any){
    return `
      <h2 class="postCardTwo__title"><a href="${post.url}" class="postCardTwo__titleLink">${post.title}</a></h2>
    `;
  }

  private static _renderPostCategoryList(post:any){
    const categoryList = post.categoryList;
    let res = '<div class="postCardTwo__categoryList">';
    for(let i=categoryList.length-1;i>=0;i--){
      res+=this._renderPostOneCategory(categoryList[i]);
    }
    // for(let category of categoryList){
    //   res+=this._renderPostOneCategory(category);
    // }
    res+='</div>';
    return res;
  }
  private static _renderPostOneCategory(category:any){
    return `
    <a href="${category.url}" class="postCardTwo__category">
      <i class="postCardTwo__categoryDot"></i>
      ${category.name}
    </a>
    `
  }







}
export default PostListTwoHtmlGetter;