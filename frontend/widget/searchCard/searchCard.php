<form 
  class="searchCard"
  method="get"
  action="<?php echo esc_url( home_url( '/' ) );  ?>"
>
  <input 
    class="searchCard__input"
    type="text"
    name="s"
    placeholder="<?php echo $args['placeholder']; ?>" 
  >
  <button
    class="searchCard__btn"
    >
    <?php echo $args['btnInnerHtml']; ?>
    <!-- <i class="fa fa-search" ></i>     -->
  </button>
</form>
