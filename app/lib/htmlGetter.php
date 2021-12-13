<?php


function getPaginationHtml(){
  $res = paginate_links(
    [
      'prev_next' => true,
      'mid_size'  => 1,
      'prev_text' => '上一页',
      'next_text' => '下一页',
    ]
  );
  return $res;
}