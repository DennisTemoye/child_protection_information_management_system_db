<?php
require_once '../../access.php';
require_once '../../model/connection.php';
class SignIn extends Connection {
    public function login(){
       $conn = $this->connect();
       if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = $this->connect();
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        if (empty($email)) {
            echo "Username is required";
        } else if (empty($password)) {
            echo "Password is required";
        }
        $sql = "SELECT * FROM `children` WHERE `email` = '$email' AND `password` = '$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $check = $row['email'] === $email && $row['password'] === $password;
            if ($check) {
                $user = $row['lastname'];
                // $_SESSION['name'] = $name;
                echo "Welcome ". $user;
                // header("./prof.php");
            }
        } else {
            echo "Incorrect Password or email";
        }
        }

   }
}
$method = new SignIn;
$method->login()
?>