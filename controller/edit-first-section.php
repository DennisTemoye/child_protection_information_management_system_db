<?php
include_once '../access.php';
include_once '../model/connection.php';
class EditFirstDetails extends Connection{
    public function edit_content() {
        if (isset($_GET['email'])) {
            $conn = $this->connect();
            $unique_email = $_GET['email'];
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $bio = $_POST['bio'];
            $phone = $_POST['phone'];
    
            $sql = "UPDATE `children` SET `email` = '$email', `firstname` = '$firstname', `lastname` = '$lastname', `bio` = '$bio', `phone` = '$phone' WHERE `email` = '$unique_email'";
            $result = $conn->query($sql);
    
            if ($result) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo 'No Email';
        }
    }
    
}
?>