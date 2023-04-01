<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['id'])) {
require_once 'connect_admin.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];

//sql update
$stmt = $conn->prepare("UPDATE user SET username=:username, password=:password, name=:name WHERE id=:id");
$stmt->bindParam(':id', $id , PDO::PARAM_INT);
$stmt->bindParam(':username', $username , PDO::PARAM_STR);
$stmt->bindParam(':password', $password , PDO::PARAM_STR);
$stmt->bindParam(':name', $name , PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if($stmt->rowCount() > 0){
    echo '<script>
        setTimeout(function() {
            swal({
                title: "แก้ไขข้อมูลสำเร็จ",
                type: "success"
            }, function() {
                window.location = "dashboard.php"; 
            });
        }, 1000);
    </script>';
}else{
   echo '<script>
        setTimeout(function() {
            swal({
                title: "เกิดข้อผิดพลาด",
                type: "error"
            }, function() {
                window.location = "register_editdata.php"; 
            });
        }, 1000);
    </script>';
}
}
$conn = null;
?>