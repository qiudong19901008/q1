

<?php
  $paginationHtml = getPaginationHtml();
?>

<div class="pagination">
  <?php 
    if(!empty($paginationHtml)){
      echo $paginationHtml;
    }
  ?>
</div>

