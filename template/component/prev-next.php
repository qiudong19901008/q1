<?php 

  $prev = getPrevPostInfo(get_the_ID());
  $next = getNextPostInfo(get_the_ID());

?>

<div class="prev-next-container">
  <?php if(count($prev) !== 0): ?>

    <a class="prev" href="<?php echo $prev['url']; ?>">
      <p>
        <i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i>
        上一篇
      </p>
      <h2 class="title"><?php echo $prev['title']; ?></h2>
    </a>

  <?php  else:  ?>

    <div style="
      background-color: #fff;
      padding:1.5rem;
      border-radius: 4px;
      font-size:1.4rem;
      color: #999;
      width:48%;
      
    ">
      <h2 class="title">没有了</h2>
    </div>

  <?php  endif;  ?>


  <?php if(count($next) !== 0): ?>

    <a class="next" href="<?php echo $next['url']; ?>">
      <p>
        下一篇
        <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
      </p>
      <h2 class="title"><?php echo $next['title']; ?></h2>
    </a>

    <?php  else:  ?>

    <div style="
      background-color: #fff;
      padding:1.5rem;
      border-radius: 4px;
      font-size:1.4rem;
      color: #999;
      width:48%;
    ">
      <h2 class="title" style="text-align: right;">没有了</h2>
    </div>

  <?php  endif;  ?>

 
</div>