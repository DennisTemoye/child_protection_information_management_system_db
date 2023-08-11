<?php
include_once '../access.php';
include_once '../model/connection.php';
class ClientCase extends Connection{
   public function get_cases_by_email(){
    if(isset($_GET['email']))
    $email = $_GET['email'];
    $conn = $this->connect();
    $sql = "SELECT * FROM `cases` WHERE `email` = '$email'";
    $result = $conn->query($sql);
    if ($result) {
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        print json_encode($rows);
    } else {
        echo "Error!";
    }
   }
}
?>