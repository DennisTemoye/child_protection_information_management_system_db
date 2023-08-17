<?php
include_once '../access.php';
include_once '../model/connection.php';
 class PostMessage extends Connection{
    public function post_message (){
        $conn = $this->connect();
        $name = $_POST['name'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        $sql = "INSERT INTO `messages`(`id`, `name`, `message`, `email`) VALUES (NULL,'$name','$message','$email')";
        $result = $conn->query($sql);
        if ($result) {
           echo 'Successful';
        } else {
            echo 'error occur';
        }
    }
 }
?>