<form class="commentForm" 
  data-postid="<?php the_ID(); ?>"
  data-action="<?php echo Actions::ADD_ONE_COMMENT; ?>"
  data-url="<?php echo admin_url('admin-ajax.php') ?>"
>
  <!-- 提示信息 -->
  <!-- <p class="commentForm__tips hide">
    请输入作者信息
  </p> -->
  <!-- 作者信息 -->
  <div class="commentForm__authorInfo">
    <div class="form-group">
      <label for="name" class="commentForm__nicknameLabel">昵称：</label>
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
  <div class="commentForm__contentWrap form-group">
    <label for="commentForm__content" class="commentForm__contentLabel">内容：</label>
    <textarea 
      name="content" 
      rows="4" 
      class="commentForm__content" 
      id="commentForm__content"
      data-parentid="0"
    ></textarea>
  </div>
  <!-- 提交按钮 -->
  <div class="commentForm__operation form-group ">
    <button type="button" class="commentForm__submitBtn">提交</button>
    <button type="button" class="commentForm__resetBtn">重置</button>
  </div>
</form>