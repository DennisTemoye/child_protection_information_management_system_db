<?php
include_once '../access.php';
include_once '../model/connection.php';

class Delete extends Connection{
    public function delete_child(){
        $conn = $this->connect();
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $sql = "DELETE FROM `children` WHERE `id` = '$user_id'";
            $result = $conn->query($sql);
           
            if ($result == TRUE) {
                echo "Child Deleted successfully";
            } else {
                echo "error" . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$method = new Delete;
$method->delete_child()
?>