<?php 
if(isset($_GET['id'])){
require_once 'connect_admin.php';
//ประกาศตัวแปรรับค่าจาก param method get
$id = $_GET['id'];
$stmt = $conn->prepare('DELETE FROM user WHERE id=:id');
$stmt->bindParam(':id', $id , PDO::PARAM_INT);
$stmt->execute();

//  sweet alert 
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($stmt->rowCount() > 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  text: "กด OK เพื่อกลับไปหน้า Dashboard",
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
                  text: "กรุณาลองใหม่อีกครั้ง",
                  type: "error"
              }, function() {
                  window.location = "dashboard.php";
              });
            }, 1000);
        </script>';
    }
$conn = null;
}
?>