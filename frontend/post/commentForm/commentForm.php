<form class="commentForm" 
  data-postid="<?php the_ID(); ?>"
>
  <!-- 作者信息 -->
  <div class="commentForm__authorInfo">
    <div class="form-group">
      <label for="name">昵称：</label>
      <input type="text" name="name" id='name' class="commentForm__authorNickname">
    </div>
    <div class="form-group">
      <label for="email">邮箱：</label>
      <input type="text" name="email" id='email' class="commentForm__authorEmail">
    </div>
    <div class="form-group">
      <label for="website">网址：</label>
      <input type="text" name="website" id='website' class="commentForm__authorWebsite">
    </div>
  </div>
  <!-- 输入框 -->
  <div class="form-group">
    <textarea name="content" rows="4" class="commentForm__content" id="commentForm__content"></textarea>
  </div>
  <!-- 提交按钮 -->
  <div class="commentForm__submitArea form-group ">
    <button type="button" class="commentForm__submitBtn">提交</button>
  </div>
</form>