

<?php

get_template_part('q1/component/post/commentSection/commentSection'); 

  
?>





<?php

// $res = UserDao::login('qiud',555);

$res = generateToken(1,60*60,'abd');

var_dump($res);
// // 
// get_template_part('test/jwt.php'); 


?>








