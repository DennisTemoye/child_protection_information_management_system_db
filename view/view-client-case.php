<?php
include_once '../controller/view-client-case.php';
$method = new ClientCase;
$method->get_cases_by_email()
?>