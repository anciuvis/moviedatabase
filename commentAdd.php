<?php
// echo json_encode($_POST);
// exit();

include 'function.php';

$comment = postComment();
// echo $comment;
echo JSON_encode($comment);

?>
