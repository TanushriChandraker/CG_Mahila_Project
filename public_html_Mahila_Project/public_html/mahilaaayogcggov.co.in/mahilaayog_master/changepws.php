<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

	if(isset($_POST['submit']))
	{

		function validate($data){
    	   	   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}

		$oldpws = mysqli_real_escape_string($conn,$_POST['oldpws']);
		$newpws = mysqli_real_escape_string($conn,$_POST['newpws']);
		$conpws = mysqli_real_escape_string($conn,$_POST['conpws']);
		$updated_at=date('Y-m-d h:m:s');   
		$status=1;


		if (empty($oldpws)) {
			header("Location: changepws.php?error=Old password Must");
	    		exit();
	   	}else if(empty($newpws)){
	   		header("Location: changepws.php?error=New password Must");
	   		exit();
	   	}else if($newpws !== $conpws){
	   		header("Location: changepws.php?error=The confirmation password  does not match");
	   		exit();
	   	}else{
			// hashing the password
	   		$oldpws = md5($oldpws);
        		$newpws = md5($newpws);
        		$id = $_SESSION['id'];

        		$sql = "SELECT password FROM users WHERE id='$id' AND password='$oldpws'";
        		$result = mysqli_query($conn, $sql);
        			if(mysqli_num_rows($result) === 1){
        				$query = mysqli_query($conn , "UPDATE users SET password='$newpws' WHERE id='$id'");
        				if($query){
        					header("Location: changepws.php?success=Password Changed successfully");
						exit();
					}else{
						header("Location: changepws.php?error=OOPS Something Went Wrong");
						exit();
					}
				}
			}
		}

?>
<?php include('includes/header.php'); ?>
<?php include('includes/leftsidebar.php'); ?>
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<!-- end row -->
				<div class="card text-center" style="margin-top: 10px;">
					<div class="card-header"><h4>Change Password</h4></div>
					<div class="card-body">
						<div class="row">
							<form method="post">
								<?php if (isset($_GET['error'])) { ?>
     								<p class="error"><?php echo $_GET['error']; ?></p>
     							<?php } ?>

          						<?php if (isset($_GET['success'])) { ?>
          						    <p class="success"><?php echo $_GET['success']; ?></p>
          						<?php } ?>
								<div class="formbar">
									<div class="col-sm-3">
										<input type="password" name="oldpws" class="form-control" placeholder="Old Password" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="password" name="newpws" class="form-control" placeholder=" New Password" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="password" name="conpws" class="form-control" placeholder="Confirm New Password" aria-label="">
									</div>
								</div>
							</div>
							<input type="submit" class="btn" name="submit" value="Change">
							<input type="reset" class="btn" value="Reset">
						</form>
					</div>
				</div>
			</div>
			
			</div> <!-- container -->
			</div> <!-- content -->
		</div>
	<?php include('includes/footer.php'); ?>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>