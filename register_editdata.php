<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Edit User | Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style3.css">
	</head>

	<body>
		<?php
		if(isset($_GET['id'])){
			require_once 'connect_admin.php';
			$stmt = $conn->prepare("SELECT* FROM user WHERE id=?");
			$stmt->execute([$_GET['id']]);
			$k = $stmt->fetch(PDO::FETCH_ASSOC);
			//ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
			if($stmt->rowCount() < 1){
				header('Location: dashboard.php');
				exit();
			}
		}
		?>

		<div class="wrapper" style="background-image: url('images/bg_004.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/img_012.jpg" alt="">
				</div>
				<form action="register_editdata_db.php" method="post">
					<h3>แก้ไขข้อมูล</h3>
					<div class="form-wrapper">
						<input type="text" name="username" id="username" required value="<?= $k['username'];?>" minlength="3" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="password" id="password" required value="<?= $k['password'];?>" minlength="3" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="name" id="name" required value="<?= $k['name'];?>" minlength="3" placeholder="Your Name" class="form-control">
						<i class="zmdi zmdi-accounts"></i>
					</div>
					<input type="hidden" name="id" value="<?= $k['id'];?>">
					<button type="submit" name="register"><i class="zmdi zmdi-arrow-right"></i>   แก้ไขข้อมูล</button>
				</form>
			</div>
		</div>
	</body>
</html>