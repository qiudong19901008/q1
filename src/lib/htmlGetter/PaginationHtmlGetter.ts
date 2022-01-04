class PaginationHtmlGetter{

  private static isShowPagination(totalCount:number,size:number){
    if(totalCount <= size){
      return false;
    }
    return true;
  }

  /**
   * 
   * @param currentPage 当前页码
   * @param totalCount 总页码
   * @param size 每页大小
   * @param pageIndexUrl 页面默认页，有多种页面，比如category, 如果不希望有href， 则传入空字符串
   * @returns 
   */
  public static run(currentPage:number,totalCount:number,size:number,pageIndexUrl:string){
    if(!this.isShowPagination(totalCount,size)){
      return;
    }
    //确定页数
    let maxPage = Math.floor(totalCount/size);
    if(totalCount%size !== 0){
      maxPage++;
    }
    let res = '<div class="pagination">';
    //确定第一页
    if(currentPage === 1){
      res += this._getItemHtml(1,pageIndexUrl,true);
    }else{
      res += this._getItemHtml(1,pageIndexUrl);
    }
  
    //前置原点, 如果当前页比第一页大两页, 那么才设置
    if(currentPage-1 > 2){
      res+=this._getDots();
    }

    //前置, 如果当前页的前一页不是第一页才设置
    if( currentPage-1 > 1){
      res+=this._getItemHtml(currentPage-1,pageIndexUrl);
    }

    //自身,如果当前页不是第一页也不是最后一页才设置
    if(currentPage > 1 && currentPage<maxPage){
      res += this._getItemHtml(currentPage,pageIndexUrl,true);
    }

    //后置, 如果当前页的后一页不是最后一页才设置
    if(currentPage+1<maxPage){
      res+=this._getItemHtml(currentPage+1,pageIndexUrl);
    }
    
    //后置原点, 如果最后一页比当前页大2页才设置
    if(maxPage - currentPage >2){
      res+=this._getDots();
    }

    //确定最后一页
    if(currentPage === maxPage){
      res += this._getItemHtml(maxPage,pageIndexUrl,true);
    }else{
      res += this._getItemHtml(maxPage,pageIndexUrl);
    }

    res += '</div>';

    return res;
  }

  //   <div class="pagination">
//   <a href="" class="pagination__page">1</a>
//   <span class="pagination__dots">...</span>
//   <a href="" class="pagination__page">3</a>
//   <a href="" class="pagination__page pagination__page--current">4</a>
//   <a href="" class="pagination__page">5</a>
//   <span class="pagination__dots">...</span>
//   <a href="" class="pagination__page">7</a>
// </div>

  private static _getItemHtml(pageNum:number,pageIndexUrl:string,isActive=false){
    const pageUrl = this._getPageUrl(pageIndexUrl,pageNum);
    let res = '';
    if(isActive){
      res = this._getActiveItemHtml(pageUrl,pageNum); 
    }else{
      res = this._getInActiveItemHtml(pageUrl,pageNum);
    }
    return res;
  }

  /**
   * 如果包含了 page/\d+ 则要先去除, 因为在http://localhost/zixuehu/page/3页面刷新后, 默认页面变成了http://localhost/zixuehu/page/3
   * 再加上page的话就成了 http://localhost/zixuehu/page/3/page/${pageNum}
   */
  private static _getPageUrl(pageIndexUrl:string,pageNum:number){
    if(!pageIndexUrl){
      return '';
    }
    pageIndexUrl = pageIndexUrl.replace(/\/page\/\d+/,'');
    if(pageNum === 1){
      return pageIndexUrl;
    }
    return `${pageIndexUrl}/page/${pageNum}`;
  }

  private static _getActiveItemHtml(pageUrl:string,pageNum:number){
    let res = '';
    if(pageUrl){
      res = `<a href="${pageUrl}" class="pagination__page pagination__page--current" data-page="${pageNum}">${pageNum}</a>`;
    }else{
      res = `<a class="pagination__page pagination__page--current" data-page="${pageNum}">${pageNum}</a>`;
    }
    return res;
  }

  private static _getInActiveItemHtml(pageUrl:string,pageNum:number){
    let res = '';
    if(pageUrl){
      res = `<a href="${pageUrl}" class="pagination__page" data-page="${pageNum}">${pageNum}</a>`;
    }else{
      res = `<a class="pagination__page" data-page="${pageNum}">${pageNum}</a>`;
    }
    return res;
  }

  private static _getDots(){
    return `<span class="pagination__dots">...</span>`;
  }




}


export default PaginationHtmlGetter;


