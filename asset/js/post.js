// const $ = require('jquery');

function isAlreadyZan(id){
  const cookies = getCookie(`q1_post_like_${id}`);
  if(cookies){
    return true;
  }
  return false;
}


$('#like').on('click',(e)=>{
  const id = $('#like').data('id');
  //判断是否已点赞
  if(isAlreadyZan(id)){
    alert('您已经点过赞了!');
    return;
  }
  const data = {
    postId: id,
    action:'q1_post_like_action',
  };
  $.ajax({

    url:'/zixuehu/wp-admin/admin-ajax.php',
    method:'POST',
    data,
    success:(data)=>{
      $('#like').addClass('done');
      $('#like span').html(data);
      $('#likeShow').html(data); 
    },
    error:(e)=>{
      alert('点赞失败');
    }
  })
  
})