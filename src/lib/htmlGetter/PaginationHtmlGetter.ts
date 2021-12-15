

class PaginationHtmlGetter{


  public static run(currentPage:number,totalCount:number,size:number){
    //确定页数
    let maxPage = totalCount/size;
    if(totalCount%size !== 0){
      maxPage++;
    }
    //确定第一页
    const firstHtml = this._getItemHtml(1);

  }

  private static _getItemHtml(pageNum:number){
    const res = `
      <a>${pageNum}</a>
    `;
    return res;
  }

  // ... []

  



}
export default PaginationHtmlGetter;