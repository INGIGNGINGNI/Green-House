<?php 

    require_once('connect_admin.php');

    if (isset($_REQUEST['btn_insert'])) {
        try {
            $names = $_REQUEST['names'];
            $discription = $_REQUEST['discription'];
            $type = $_REQUEST['type'];
            $price = $_REQUEST['price'];

            $image_file = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];

            $path = "img/" . $image_file;

            if (!file_exists($path)) { 
                if ($size < 5000000) { 
                    move_uploaded_file($temp, 'img/'.$image_file); 
                } else {
                    $errorMsg = "Your file too large please upload 5MB size"; 
                }
            } else {
                $errorMsg = "File already exists... Check upload filder"; 
            }

            if (!isset($errorMsg)) {
                $insert_stmt = $conn->prepare("INSERT INTO plants (names, discription, type, price, image)
                VALUES (:names, :discription, :type, :price, :image)");
                $insert_stmt->bindParam(':names', $names);
                $insert_stmt->bindParam(':discription', $discription);
                $insert_stmt->bindParam(':type', $type);
                $insert_stmt->bindParam(':price', $price);
                $insert_stmt->bindParam(':image', $image_file);


                if ($insert_stmt->execute()) {
                    // sweet alert 
                    echo '
                    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                    if($insert_stmt){
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลสำเร็จ",
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
                    // $insertMsg = "File Uploaded successfully...";
                    // header('refresh:2;dashboard.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Plant | Admin</title>
    
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style1.css">

</head>
<body>

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">เพิ่มข้อมูล</h2>
                        <form class="register-form" id="register-form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="names"><i class="zmdi zmdi-file-text"></i></label>
                                <input type="text" name="names" id="names" placeholder="ชื่อต้นไม้"/>
                            </div>
                            <div class="form-group">
                                <label for="discription"><i class="zmdi zmdi-comment"></i></label>
                                <input type="text" name="discription" id="discription" placeholder="คำอธิบาย"/>
                            </div>
                            <div class="form-group">
                                <label for="type"><i class="zmdi zmdi-flower-alt"></i></label>
                                <input type="text" name="type" id="type" placeholder="ชนิดของต้นไม้"/>
                            </div>
                            <div class="form-group">
                                <label for="price"><i class="zmdi zmdi-money"></i></label>
                                <input type="text" name="price" id="price" placeholder="ราคาต่อต้น (บาท)"/>
                            </div>

                            <div class="form-group">
                                <label for="image"><i class="zmdi zmdi-image-alt"></i></label>
                                <input type="file" name="image" id="image"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="btn_insert" id="btn_insert" class="form-submit" value="เพิ่มข้อมูล"/>
                                <!-- <button type="submit" name="save">   Register</button> -->
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/insert-image2.jpg" alt=""></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main2.js"></script>
</body>
</html>