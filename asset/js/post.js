// const $ = require('jquery');

function isAlreadyZan(id){
  const cookies = getCookie(`q1_cookie_like_post_${id}`);
  if(cookies){
    return true;
  }
  return false;
}

// 点赞
$('#like').on('click',(e)=>{
  const id = $('#like').data('id');
  //判断是否已点赞
  if(isAlreadyZan(id)){
    alert('您已经点过赞了!');
    return;
  }
  const data = {
    postId: id,
    action:'q1_api_like_post',
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
      console.log(e);
      alert('点赞失败');
    }
  })
  
})

// 提交评论
$('#cardCommentFormContainer .submit-btn').on('click',(e)=>{
  // 阻止表单提交
  e.preventDefault();
  // 获取提交信息
  const name = $('#name').val();
  const email = $('#email').val();
  const website = $('#website').val();
  const content = $('#cardCommentFormContainer .comment-content textarea').val();
  const postId = $('#cardCommentFormContainer').data('post-id');
  const data = {
    name,
    email,
    website,
    postId,
    content,
  };
  console.log(
    data
  )
  // const data = {
  //   name,
  //   email,
  //   website,
  //   action:'q1_ajax_submit_comment',
  // };
  // $.ajax({
  //   url:'/zixuehu/wp-admin/admin-ajax.php',
  //   method:'POST',
  //   data,
  //   success:(data)=>{
  //     alert('成功!')
  //   },
  //   error:(e)=>{
  //     alert('提交评论失败');
  //   }
  // })
})