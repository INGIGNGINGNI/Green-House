
<?php
    require_once('connect_admin.php');
    
    if (isset($_REQUEST['id'])) {
        try {
            $id = $_REQUEST['id'];
            $stmt = $conn->prepare('SELECT * FROM plants WHERE id =:id');
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }   

    if (isset($_REQUEST['btn_update'])) {
        try {

            $names = $_REQUEST['names'];
            $discription = $_REQUEST['discription'];
            $type = $_REQUEST['type'];
            $price = $_REQUEST['price'];
            
            
            $image_file = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];

            $path = "img/".$image_file;
            $directory = "img/"; // set uplaod folder path for upadte time previos file remove and new file upload for next use

            if ($image_file) {
                if (!file_exists($path)) { // check file not exist in your upload folder path
                    if ($size < 5000000) { // check file size 5MB
                        unlink($directory.$row['image']); // unlink functoin remove previos file
                        move_uploaded_file($temp, 'img/'.$image_file); // move upload file temperory directory to your upload folder
                    } else {
                        $errorMsg = "Your file to large please upload 5MB size";
                    }
                } else {
                    $errorMsg = "File already exists... Check upload folder";
                }
            } else {
                $image_file = $row['image']; // if you not select new image than previos image same it is it.
            }
            if (!isset($errorMsg)) {
                $update_stmt = $conn->prepare("UPDATE plants SET names=:names, discription=:discription, type=:type, price=:price, image=:image WHERE id = :id");
                $update_stmt->bindParam(':names', $names);
                $update_stmt->bindParam(':discription', $discription);
                $update_stmt->bindParam(':type', $type);
                $update_stmt->bindParam(':price', $price);
                $update_stmt->bindParam(':image', $image_file);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    // sweet alert 
                    echo '
                    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                    if ($update_stmt){
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "แก้ไขข้อมูลสำเร็จ",
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
                                window.location = "form_editdata.php";
                            });
                            }, 1000);
                        </script>';
                    }
                    // $updateMsg = "File update successfully...";
                    // header("refresh:2;dashboard.php");
                }
            }
            
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style1.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <title>Edit Plant | Admin</title>
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">แก้ไขข้อมูล</h2>
                        <form class="register-form" id="login-form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="names"><i class="zmdi zmdi-file-text"></i></label>
                                <input type="text" name="names" id="names" required value="<?php echo $names; ?>" minlength="3"placeholder="ชื่อต้นไม้"/>
                            </div>

                            <div class="form-group">
                                <label for="discription"><i class="zmdi zmdi-comment"></i></label>
                                <input type="text" name="discription" id="discription" required value="<?php echo $discription; ?>" minlength="3"placeholder="คำอธิบาย"/>
                            </div>

                            <div class="form-group">
                                <label for="type"><i class="zmdi zmdi-flower-alt"></i></label>
                                <input type="text" name="type" id="type" required value="<?php echo $type; ?>" minlength="3"placeholder="ชนิดของต้นไม้"/>
                            </div>

                            <div class="form-group">
                                <label for="price"><i class="zmdi zmdi-flower-alt"></i></label>
                                <input type="text" name="price" id="price" required value="<?php echo $price; ?>" minlength="1"placeholder="ราคาต่อต้น (บาท)"/>
                            </div>
                            
                            <div class="form-group">
                                <img src = "img/<?= $row['image'];?>" width= "200" height= "200">
                                <label for="image"><i class="zmdi zmdi-image-alt"></i></label>
                                <input type="file" name="image" id="image" required value="<?php echo $image; ?>"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="hidden" name="btn_update" value= "btn_update">
                                <button type="submit" class="form-submit">แก้ไขข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main2.js"></script>
</body>
</html>