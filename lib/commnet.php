<?php

// Include Ajaxscript – Add this code at the end of the function.php file of your selected WordPress theme.

/*
Ajaxify Comments -> hooks into your comment form and adds AJAX functionality – no page reloads required.
When the comment form is submitted, the code will sends the data to the WordPress backend without reloading the entire page.
You can customize this code according to your requirement.
Author: InkThemes
*/



add_action('init', 'ajaxcomments_load_js');

function ajaxcomments_load_js() {
  wp_enqueue_script('ajaxcomments', get_template_directory_uri() . "/js/ajaxcomments.js", array('jquery'));
}

function ajaxify_comments_jaya($comment_ID, $comment_status) {
  global $post;
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  //If AJAX Request Then
  switch ($comment_status) {
    case '0':
    //notify moderator of unapproved comment
    wp_notify_moderator($comment_ID);
    case '1': //Approved comment
    echo "success";
    $commentdata = &get_comment($comment_ID, ARRAY_A);
    //print_r( $commentdata);
    $permaurl = get_permalink( $post->ID );
    $url = str_replace('http://', '/', $permaurl);

    if($commentdata['comment_parent'] == 0){
    $output = '<li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1″ id="comment-' . $commentdata['comment_ID'] . '">
    <div id="div-comment-' . $commentdata['comment_ID'] . '" class="comment-body">
    <div class="comment-author vcard">'.
    get_avatar($commentdata['comment_author_email'])
    .'<cite class="fn">' . $commentdata['comment_author'] . '</cite> <span class="says">says:</span>
    </div>

    <div class="comment-meta commentmetadata"><a href="http://localhost/WordPress_Code/?p=1#comment-'. $commentdata['comment_ID'] .'">' .
    get_comment_date( 'F j, Y \a\t g:i a', $commentdata['comment_ID']) .'</a>&nbsp;&nbsp;';
    if ( is_user_logged_in() ){
    $output .= '<a class="comment-edit-link" href="'. home_url() .'/wp-admin/comment.php?action=editcomment&amp;c='. $commentdata['comment_ID'] .'">
    (Edit)</a>';
    }
    $output .= '</div>
    <p>' . $commentdata['comment_content'] . '</p>
    <div class="reply">
    <a class="comment-reply-link" href="'. $url . '&amp;replytocom='. $commentdata['comment_ID'] .'#respond"
    onclick="return addComment.moveForm(&quot;div-comment-'. $commentdata['comment_ID'] .'&quot;, &quot;'. $commentdata['comment_ID'] . '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
    </div>
    </div>
    </li>' ;

    echo $output;

  }
  else{

    $output = '<ul class="children"> <li class="comment byuser comment-author-admin bypostauthor even depth-2″ id="comment-' . $commentdata['comment_ID'] . '">
    <div id="div-comment-' . $commentdata['comment_ID'] . '" class="comment-body">
    <div class="comment-author vcard">'.
    get_avatar($commentdata['comment_author_email'])
    .'<cite class="fn">' . $commentdata['comment_author'] . '</cite> <span class="says">says:</span> </div>

    <div class="comment-meta commentmetadata"><a href="http://localhost/WordPress_Code/?p=1#comment-'. $commentdata['comment_ID'] .'">' .
    get_comment_date( 'F j, Y \a\t g:i a', $commentdata['comment_ID']) .'</a>&nbsp;&nbsp;';
    if ( is_user_logged_in() ){
    $output .= '<a class="comment-edit-link" href="'. home_url() .'/wp-admin/comment.php?action=editcomment&amp;c='. $commentdata['comment_ID'] .'">
    (Edit)</a>';
  }

    $output .= '</div>
    <p>' . $commentdata['comment_content'] . '</p>
    <div class="reply">
    <a class="comment-reply-link" href="'. $url .'&amp;replytocom='. $commentdata['comment_ID'] .'#respond"
    onclick="return addComment.moveForm(&quot;div-comment-'. $commentdata['comment_ID'] .'&quot;, &quot;'. $commentdata['comment_ID'] . '&quot;, &quot;respond&quot;, &quot;1&quot;)">Reply</a>
    </div>
    </div>
    </li></ul>' ;

    echo $output;
}

$post = &get_post($commentdata['comment_post_ID']);
wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
break;
default:
echo "error";
}
exit;
}
}

add_action('comment_post', 'ajaxify_comments_jaya', 25, 2);
