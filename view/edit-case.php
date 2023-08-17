<?php
include_once '../access.php';
include_once '../controller/edit-case.php';

$method = new EditCase;
$method->edit_case();
?>