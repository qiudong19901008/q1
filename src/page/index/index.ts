import './index.css';
import * as $ from 'jquery';
import PostModel from '../../model/PostModel';
import CommonView from '../common/common';


class IndexView{

  public initral(){

  }

  /**
   * 获取文章列表
   */
  private async _getPostListHtml(page=1,size=10){
  const url = $('.commentList').data('url');
  const action = $('.commentList').data('action');
  const {list,count} = await PostModel.getPostList(url,{
    action,
    orderBy:'create_time',
  },page,size);
  console.log()
}


}

// const indexView = new IndexView();
const commonView = new CommonView();
$(function(){
  console.log('aaaaaaa')
  commonView.initral();
});