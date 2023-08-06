<?php
include_once '../model/connection.php';
include_once '../access.php';
class GetChildren extends Connection{
   public function get_children() {
    $sql = "SELECT * FROM `children`";
    $conn = $this->connect();
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
$method = new GetChildren;
$method->get_children();
?>