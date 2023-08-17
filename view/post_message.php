<?php
include_once '../access.php';
include_once '../controller/post-message.php';
$method = new PostMessage;
$method->post_message();
?>