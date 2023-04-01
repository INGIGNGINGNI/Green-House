<?php
    require_once('connect_admin.php');

    if (isset($_REQUEST['btn_update_user'])) {
        try {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
			$name = $_REQUEST['name'];

            if (!isset($errorMsg)) {
                $update_stmt = $conn->prepare("UPDATE user SET username=:username, password=:password, name=:name WHERE id=:id");
                $update_stmt->bindParam(':username', $username);
                $update_stmt->bindParam(':password', $password);
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "File update successfully...";
                    header("refresh:2;index.php");
                }
            }
            
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

?>

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
		<div class="wrapper" style="background-image: url('images/bg_004.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/img_012.jpg" alt="">
				</div>
				<form action="" method="post">
					<h3>แก้ไขข้อมูล</h3>
					<div class="form-wrapper">
						<input type="text" name="username" id="username" required value="<?= $row['username'];?>" minlength="3" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="password" id="password" required value="<?= $row['password'];?>" minlength="3" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="name" id="name" required value="<?= $row['name'];?>" minlength="3" placeholder="Your Name" class="form-control">
						<i class="zmdi zmdi-accounts"></i>
					</div>
					<input type="hidden" name="btn_update_user" value="update user">
					<button type="submit" name="register"><i class="zmdi zmdi-arrow-right"></i>   แก้ไขข้อมูล</button>
				</form>
			</div>
		</div>
	</body>
</html>