<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

	if(isset($_POST['submit'])){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$ctype = mysqli_real_escape_string($conn,$_POST['complaint_type']);
	$created_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($ctype)) {
		header("Location: newcomplaintstype.php?error=This field shuld not be blank");
	    exit();
	}else{
		$query = mysqli_query($conn, "insert into complaintstype (type,Is_Active,created_at) values('$ctype','$status','$created_at')");
		if($query){
			header("Location: newcomplaintstype.php?success=Data Added successfully");
		}else{
			header("Location: newcomplaintstype.php?error=OOPS Somethin Went Wrong");
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
					<div class="card-header"><h4>शिकायत का नया प्रकार</h4></div>
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
										<input type="text" name="complaint_type" class="form-control" placeholder="शिकायत के प्रकार" aria-label="">
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