<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
	
</head>
<body>
<section class="form-01">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              
              <form method="post" action="">
              <div class="form-group">
                  <input id="email" name="mail" class="form-control" type="text" placeholder="Enter Email" required="">
              </div>

              <div class="form-group">                                              
                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
              </div>

                  <button class="form-control btn btn-success" type="submit" name="submit">Login</button>

                </form>
                
                 
    	
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>
</body>
</html>
<?php 
	if ((isset($_POST['submit']))){
		$mail = $_POST['mail'];
		$password = $_POST['password'];

		include('dbcon.php');
		$sql = "SELECT * FROM user WHERE email = '$mail' AND password = '$password'";
		$exe = mysqli_query($con,$sql);
		$result = mysqli_fetch_assoc($exe);
		$check = mysqli_num_rows($exe);
		$id = $result['id'];
		if($check == 0){
			$sql = "SELECT * FROM admin WHERE email = '$mail' AND password = '$password'";
			$exe = mysqli_query($con,$sql);
			$result = mysqli_fetch_assoc($exe);
			$id = $result['id'];
			$check = mysqli_num_rows($exe);
			if($check == 0){
			?>
			<script>
	           swal("Error!!","User name And Password is not matched Please try again","error");
	        </script>
	        <?php
			}else{
				session_start();
				$_SESSION['admin_email'] = $mail;
				$_SESSION['id'] = $id;
				echo "<script>
						window.open('admins/index.php?id=$id','_self');
				</script>";
			}
		}else{
			
			session_start();
				$_SESSION['email'] = $mail;
				$_SESSION['id'] = $id;
				echo "<script>
						window.open('users/index.php?id=$id','_self');
				</script>";
			}
		}
	
 ?>