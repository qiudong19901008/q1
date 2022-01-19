

<?php

get_template_part('q1/component/post/commentSection/commentSection'); 

  
?>





<?php

// $arr = [
//   'a'=>1,
//   'b'=>2
// ];


function _get(&$arr,$key,$default=null){
  return isset($arr[$key]) ? $arr[$key] : $default;
}

$res = _get($arr,'c',null);

var_dump($res);

?>








