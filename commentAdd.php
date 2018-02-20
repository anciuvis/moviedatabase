<?php
include 'function.php';
//$post_body = file_get_contents('php://input');
//$fields = [];
//parse_str($post_body, $fields);
//echo json_encode($fields);
//$_POST = $fields;
//exit();
//echo json_encode($_POST);
//exit();
$comment = postComment();

echo json_encode($comment);

// echo $comment;
// echo JSON_encode($comment);
?>
