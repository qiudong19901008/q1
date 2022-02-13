<?php
  // var_dump($args['postList']);
?>


<div class="widgetRecommendCard">
  <h2 class="widgetRecommendCard__title"><?php echo $args['name']; ?></h2>
  <div class="widgetRecommendCard__postList">

    

      <?php foreach($args['postList'] as $myPost): ?>

        <div class="widgetRecommendCard__postWrap">

          <?php 

            // var_dump($myPost);
            // die;
            get_template_part('components/simplePostCard/simplePostCard',null,[
              'post'=>$myPost,
            ]);
          ?>

        </div>

      <?php endforeach ?>

    
    
  </div>
</div>