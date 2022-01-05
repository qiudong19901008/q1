import * as $ from 'jquery';
import 'font-awesome/css/font-awesome.min.css';
import './common.css';

// @import url('../../../frontend/widget/searchCard/searchCard.css');

import '../../../frontend/common/menu/menu';

import '../../../frontend/common/mobileMenu/mobileMenu';

import '../../../frontend/siteHeader/siteHeader';


class CommonView{

  public initral(){
    this._bindEvents();
  }

  private _bindEvents(){
    
  }

}

const commonView = new CommonView();

$(function(){
  commonView.initral();
  
})

export default CommonView;




