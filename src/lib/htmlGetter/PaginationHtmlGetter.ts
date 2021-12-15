class PaginationHtmlGetter{


  public static run(currentPage:number,totalCount:number,size:number){
    //确定页数
    let maxPage = Math.floor(totalCount/size);
    if(totalCount%size !== 0){
      maxPage++;
    }
    let res = '<div class="pagination">';
    //确定第一页
    if(currentPage === 1){
      res += this._getItemHtml(1,true);
    }else{
      res += this._getItemHtml(1);
    }
  
    //前置原点, 如果当前页比第一页大两页, 那么才设置
    if(currentPage-1 > 2){
      res+=this._getDots();
    }

    //前置, 如果当前页的前一页不是第一页才设置
    if( currentPage-1 > 1){
      res+=this._getItemHtml(currentPage-1);
    }

    //自身,如果当前页不是第一页也不是最后一页才设置
    if(currentPage > 1 && currentPage<maxPage){
      res += this._getItemHtml(currentPage,true);
    }

    //后置, 如果当前页的后一页不是最后一页才设置
    if(currentPage+1<maxPage){
      res+=this._getItemHtml(currentPage+1);
    }
    
    //后置原点, 如果最后一页比当前页大2页才设置
    if(maxPage - currentPage >2){
      res+=this._getDots();
    }

    //确定最后一页
    if(currentPage === maxPage){
      res += this._getItemHtml(maxPage,true);
    }else{
      res += this._getItemHtml(maxPage);
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

  private static _getItemHtml(pageNum:number,isActive=false){
    let res = '';
    if(isActive){
      res = `<button class="pagination__page pagination__page--current" data-page="${pageNum}">${pageNum}</button>`;
    }else{
      res = `<button class="pagination__page" data-page="${pageNum}">${pageNum}</button>`;
    }
    return res;
  }

  private static _getDots(){
    return `<span class="pagination__dots">...</span>`;
  }




}


export default PaginationHtmlGetter;


