<?php session_start();
  include "server.php";?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Green House | Shop</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet" type="text/css">
    <link href="css/styles1.css" rel="stylesheet" />
    <link href="assets/css/theme.css" rel="stylesheet" />
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
  
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />

    <style>
      h2{
        font-family: 'Mali', cursive;
      }
      p{
        font-family: 'Mali', cursive;
        font-size: 18px;
      }
      .li{
        font-family: 'Mali', cursive;
        font-size: 18px;
      }
    </style>

  </head>

  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="images/logo.png" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2"></span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="#portfolio">Shop</a></li>
            </ul>
            
            <a class="nav-item px-2"><strong>HI! </strong><?php print_r($_SESSION['username']);?></a>

                <form class="d-flex"><a class="text-1000" href="">
                    <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg></a><a class="text-1000" href="Login_user.php">
                    <svg class="feather feather-log-out" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12">
                    </svg></a>
                </form>
          </div>
        </div>
      </nav>
      <section class="py-11 bg-light-gradient border-bottom border-white border-5">
        <div class="bg-holder overlay overlay-light" style="background-image:url(images/header-bg.jpg);background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-12 mb-10">
              <div class="d-flex align-items-center flex-column">
                <h1 class="fw-normal"> Selected especially for you</h1>
                <h1 class="fs-4 fs-lg-8 fs-md-6 fw-bold">GREEN HOUSE SHOP</h1>
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
              <div class="card card-span h-100 text-white"> <img class="img-fluid" src="images/img_004.jpg" width="790" alt="..." />
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-span h-100 text-white"> <img class="img-fluid" src="images/img_002.jpg" width="790" alt="..." />
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <!-- Portfolio Grid-->
      <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                  <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Products</h5><br>
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                </div>
                  <div class="row">
                    <?php
                      require_once 'connect_admin.php';
                      $stmt = $conn->prepare("SELECT * FROM plants");
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                      foreach($result as $k) {
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <!-- <a class="portfolio-link" data-bs-toggle="modal" data-bs-target="#product" > -->
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fa-plus fa-3x"></i></div>
                                </div>
                                <img src = img/<?= $k['image'];?> width= "350" height= "350" class="img-fluid"/>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $k['names'];?></div>
                                <div class="portfolio-caption-subheading text-muted"><?= $k['price'];?> บาท</div><br>
                                <button type="button" class="btn btn-info view_data" id="<?= $k['id'];?>" data-bs-toggle="modal" data-bs-target="#myModal">ดูเพิ่มเติม</button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                  </div>     
            </div>
      </section>
        <?php require "viewModal.php";?>
    
    </main>


    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- ===============================================-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <!-- ===============================================-->
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script src="assets/js/theme.js"></script>
    <script src="js/scripts1.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

  <script>
  $(document).ready(function(){
    $('.view_data').click(function(){
      var id=$(this).attr("id");
      $.ajax({
        url:"select.php",
        method:"post",
        data:{id:id},
        success:function(data){
          $('#detail').html(data);
          $('#dataModal').modal('show');
        }
      });1
    });
  }); 
  </script>

</html>
