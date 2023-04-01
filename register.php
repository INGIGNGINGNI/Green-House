<?php
    include "connect_admin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register | Green House</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style3.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg_004.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/img_012.jpg">
				</div>
				<form action="register_db.php" method="post">
					<?php if (isset($_SESSION['error'])) : ?>
        				<div class="error">
                			<h3>
                    			<?php 
									echo $_SESSION['error'];
									unset($_SESSION['error']);
                    			?>
                			</h3>
            			</div>
        			<?php endif ?>
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<input type="text" name="username" placeholder="Username" class="form-control" data-validate="Please input username">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password" class="form-control" data-validate="Please input password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="name" placeholder="Your Name" class="form-control" data-validate="Please input name">
						<i class="zmdi zmdi-accounts"></i>
					</div>
					<button type="submit" name="register"><i class="zmdi zmdi-arrow-right"></i>   Register</button>
				</form>
			</div>
		</div>
		
	</body>
</html>