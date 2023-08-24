<?php
// upload.php
include_once '../access.php';
include_once '../model/connection.php';
class Upload extends Connection {
    public function upload() {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "C:\EMMA\my_project\REACT\child-abuse-management-system\public\ ";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $conn = $this->connect();
            
            $imagePath = $conn->real_escape_string($targetFile);
            $sql = "INSERT INTO images (image_path) VALUES ('$imagePath')";
            $result = $conn->query($sql);
            
            if ($result) {
                echo json_encode(['message' => 'Image uploaded and inserted']);
            } else {
                echo json_encode(['message' => 'Database insertion failed']);
            }
            
            $conn->close();
        } else {
            echo json_encode(['message' => 'Image upload failed']);
        }
    } else {
        echo json_encode(['message' => 'No image provided']);
    }
}
}
$meth = new Upload;
$meth->upload();
?>