<?php
include '../access.php';
include '../model/connection.php';
class EditCase extends Connection{
    public function edit_case(){
        $conn = $this->connect();
        $email = $_GET['email'];
        $status = $_POST['status'];
        $sql = "UPDATE `cases` SET `case_status` = '$status' WHERE `cases`.`email` = '$email'";
        $result = $conn->query($sql);
        if ($result) {
           echo 'Case Status Updated Successfully';
        } else {
            echo 'error occur';
        }
        
        
    }
}
?>