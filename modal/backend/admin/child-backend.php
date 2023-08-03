<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials:true");
header('Content-type: application/json');
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '../child_abuse_management_system_db/Modal/Database/database.php');
require(realpath($_SERVER["DOCUMENT_ROOT"]) . "../child_abuse_management_system_db/controller/classes/admin/child.php");
require(realpath($_SERVER["DOCUMENT_ROOT"]) . "../child_abuse_management_system_db/controller/classes/admin/login.php");


// $child = new Child();
$login = new Login();

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$email = $body['email'];
$password = $body['password'];




// $firstName = $_REQUEST['firstName'];
// $lastName = $_REQUEST['lastName'];
// $address = $_REQUEST['address'];
// $age = $_REQUEST['age'];
// $gender = $_REQUEST['gender'];



$login->processAdminLoginInfo("Dennis","SSSS");

// save into db
echo json_encode("Registration Successful");
exit;

echo "Admin";
