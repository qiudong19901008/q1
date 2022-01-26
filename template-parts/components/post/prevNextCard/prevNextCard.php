<?php 

  use hedao\dao\PostDao;

  $prev = PostDao::getPrevOrNextPostInfo();
  $next = PostDao::getPrevOrNextPostInfo(true);
?>

<div class="prevNextCard">

    <?php if(count($prev)!==0): ?>
      
    <a class="prevNextCard__prev" href="<?php echo $prev['url'] ?>">   
      <p>
        <i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>
        上一篇
      </p>
      <h2 class="prevNextCard__prevTitle"><?php echo $prev['title'] ?></h2>
    </a>

    <?php endif; ?>

    <?php if(count($next)!==0): ?>

      <a class="prevNextCard__next" href="<?php echo $next['url'] ?>">
        <p >
          下一篇
          <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
        </p>
        <h2 class="prevNextCard__nextTitle"><?php echo $next['title'] ?></h2>
      </a>

    <?php endif; ?>
</div>