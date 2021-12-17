<div class="widgetRecommendCard">
  <h2 class="widgetRecommendCard__title"><?php echo $args['name']; ?></h2>
  <div class="widgetRecommendCard__postList">

    

      <?php foreach($args['postList'] as $post): ?>

        <div class="widgetRecommendCard__postWrap">

          <?php 
            get_template_part('frontend/widget/simplePostCard/simplePostCard',null,[
              'post'=>$post,
            ]) 
          ?>

        </div>

      <?php endforeach ?>

    
    
  </div>
</div>