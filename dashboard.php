<?php session_start();
  include "server.php";?>
<?php
if (!$_SESSION['username']){
  Header("Location: login_user.php");
  
}else{?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet" type="text/css">

        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
        <link rel="manifest" href="assets/img/favicons/manifest.json">
        <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
        <meta name="theme-color" content="#ffffff">
        <link href="assets/css/theme.css" rel="stylesheet" />

        <title>Dashboard | Admin</title>
        <style>
            body{
                font-family: 'Mali', cursive;
            }
            h3{
                font-family: 'Mali', cursive;
            }
            th{
                text-align: center;
            }
            .td{
                text-align: center;
            }
            .btn {
                font-family: 'Mali', cursive;
            }
            
        </style>
    </head>
    <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand d-inline-flex" href="dashboard.php"><img class="d-inline-block" src="images/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2"></span></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="">Home</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="#products">Products</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="#users">Users</a></li>
                </ul>

                <a class="nav-item px-2"><strong>HI! ADMIN </strong><?php print_r($_SESSION['username']);?></a>

                <form class="d-flex"><a class="text-1000" href="#!">
                    <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg></a><a class="text-1000" href="Login_admin.php">
                    <svg class="feather feather-log-out" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12">
                    </svg></a>
                </form>
        </nav>
        <section class="py-11 bg-light-gradient border-bottom border-white border-5">
            <div class="bg-holder overlay overlay-light" style="background-image:url(images/header-bg5.jpg);background-size:cover;"></div>
        <!--/.bg-holder-->

            <div class="container">
                <div class="row flex-center">
                    <div class="col-12 mb-10">
                        <div div class="d-flex align-items-center flex-column">
                            <h1 class="fw-normal">Product Management</h1>
                            <h1 class="fs-4 fs-lg-8 fs-md-6 fw-bold">GREEN HOUSE ADMIN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                
      <!-- ============================================-->
      <!-- <section> begin ============================-->
        <section class="py-0" id="header" style="margin-top: -23rem !important;">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"> <img class="img-fluid" src="images/img_007.jpg" width="790" alt="..." /></div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-span h-100 text-white"> <img class="img-fluid" src="images/img_005.png" width="790" alt="..." /></div>
                    </div>
                </div>
            </div>
            <br>
        </section>
        <!-- end of .container-->

        <div class="container">
            <div class="row">
                <div class="col-md-12" id="products"> <br>
                    <h3>รายการต้นไม้ในร้าน <a href="form_adddata.php" class="btn btn-info">เพิ่มข้อมูล</a> </h3><br>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="15%">ชื่อต้นไม้</th>
                                <th width="20%">คำอธิบาย</th>
                                <th width="10%">ชนิด</th>
                                <th width="10%">ราคา</th>
                                <th width="15%">รูปภาพ</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                require_once 'connect_admin.php';
                                $select_stmt = $conn->prepare('SELECT * FROM plants'); 
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td class="td"><?= $row['id'];?></td>
                                <td><?= $row['names'];?></td>
                                <td><?= $row['discription'];?></td>
                                <td><?= $row['type'];?></td>
                                <td class="td"><?= $row['price'];?></td>
                                <td class="td"><img src = img/<?= $row['image'];?> width= "80" height= "80"></td>
                                
                                <td><a href="form_editdata.php?id=<?= $row['id'];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="form_deletedata.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" 
                                onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12" id="users"> <br>
                    <h3>รายการสมาชิกในร้านค้า <a href="#"></a></a></h3><br>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="30%">ชื่อผู้ใช้</th>
                                <th width="20%">รหัสผ่าน</th>
                                <th width="30%">ชื่อ-สกุล</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                require_once 'connect_admin.php';
                                require_once 'server.php';
                                $select_stmt = $conn->prepare('SELECT * FROM user'); 
                                $select_stmt->execute();

                                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td class="td"><?= $row['id'];?></td>
                                <td><?= $row['username'];?></td>
                                <td class="td"><?= $row['password'];?></td>
                                <td><?= $row['name'];?></td>
                                <td><a href="register_deletedata.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" 
                                onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="vendors/@popperjs/popper.min.js"></script>
        <script src="vendors/bootstrap/bootstrap.min.js"></script>
        <script src="vendors/is/is.min.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script src="vendors/feather-icons/feather.min.js"></script>
        <script>
        feather.replace();
        </script>
        <script src="assets/js/theme.js"></script>

        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    </body>
</html>
<?php }?>