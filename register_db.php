<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])){
    require_once 'connect_admin.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO user (username, password, name)
    VALUES (:username, :password, :name)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password , PDO::PARAM_STR);
    $stmt->bindParam(':name', $name , PDO::PARAM_STR);
    $result = $stmt->execute();
     // sweet alert 
    echo '
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลงทะเบียนสำเร็จ",
                  text: "กรุณาทำการ Login เข้าใช้งานเว็บไซต์",
                  type: "success"
              }, function() {
                  window.location = "login_user.php";
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "กรุณาทำการลงทะเบียนใหม่อีกครั้ง",
                  type: "error"
              }, function() {
                  window.location = "register.php";
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>