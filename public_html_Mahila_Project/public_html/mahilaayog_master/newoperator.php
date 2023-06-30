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

	$operatorid = mysqli_real_escape_string($conn,$_POST['oopid']);
	$operatorname = mysqli_real_escape_string($conn,$_POST['oopname']);
	$operatorpws = mysqli_real_escape_string($conn,$_POST['ooppws']);
	$role = mysqli_real_escape_string($conn,$_POST['role']);
	$created_at=date('Y-m-d h:m:s');  
	$status=1;


	if (empty($operatorid)) {
			header("Location: newoperator.php?error=Operator Id Must");
	    exit();
	   }else if(empty($operatorname)){
	   		header("Location: newoperator.php?error=Operator Name Must");
	   		exit();
	   }else if(empty($operatorpws)){
	   		header("Location: newoperator.php?error=Operator Password Must");
	   		exit();
	   }else{
			// hashing the password
        	$pass = md5($operatorpws);
        
		$query = mysqli_query($conn, "insert into users(username, name, password,role,Is_Active,created_at) values('$operatorid','$operatorname','$pass','$role','$status','created_at')");
		if($query){
			header("Location: newoperator.php?success=Data Added successfully");
		}else{
			header("Location: newoperator.php?error=OOPS Something Went Wrong");
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
					<div class="card-header"><h4>New Operator</h4></div>
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
										<input type="text" name="oopid" class="form-control" placeholder="Operator Id" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" name="oopname" class="form-control" placeholder="Operator Name" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="password" name="ooppws" class="form-control" placeholder="Operator Password" aria-label="">
									</div>
									<div class="col-sm-3">
										<select aria-label="" name="role">
											<option selected value="operator">Operator</option>
										</select>
									</div>
								</div>
							</div>
							<input type="submit" class="btn" name="submit" value="Add">
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