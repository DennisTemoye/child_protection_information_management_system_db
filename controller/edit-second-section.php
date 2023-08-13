<?php
include_once '../access.php';
include_once '../model/connection.php';
class EditSecondDetails extends Connection{
    public function edit_content() {
        if (isset($_GET['email'])) {
            $conn = $this->connect();
            $unique_email = $_GET['email'];
            // $email = $_POST['email'];
            $guardian_name = $_POST['guardian_name'];
            $guardian_email = $_POST['guardian_email'];
            $guardian_bio = $_POST['guardian_bio'];
            $guardian_phone = $_POST['guardian_phone'];
    
            $sql = "UPDATE `children` SET `guardian_email` = '$guardian_email', `guardian_name` = '$guardian_name', `guardian_phone` = '$guardian_phone', `guardian_bio` = '$guardian_bio' WHERE `email` = '$unique_email'";
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