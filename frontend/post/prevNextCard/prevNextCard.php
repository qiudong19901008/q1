<?php 

  $prev = PostDao::getPrevOrNextPostInfo();
  $next = PostDao::getPrevOrNextPostInfo(true);
?>

<div class="prevNextCard">


    <a class="prevNextCard__prev" href="<?php echo $prev['url'] ?>">   
      <p>
        <i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>
        上一篇
      </p>
      <h2 class="prevNextCard__prevTitle"><?php echo $prev['title'] ?></h2>
    </a>
    <a class="prevNextCard__next" href="<?php echo $next['url'] ?>">
      <p >
        下一篇
        <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
      </p>
      <h2 class="prevNextCard__nextTitle"><?php echo $next['title'] ?></h2>
    </a>
</div>