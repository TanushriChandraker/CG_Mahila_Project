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
	$relation = mysqli_real_escape_string($conn,$_POST['relation']);
	$created_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($relation)) {
		header("Location: relation.php?error=This field shuld not be blank");
	    exit();
	}else{
		$query = mysqli_query($conn, "insert into relation(relation,Is_Active,created_at) values('$relation','$status','$created_at')");
		if($query){
			header("Location: relation.php?success=Data Added successfully");
		}else{
			header("Location: relation.php?error=OOPS Something Went Wrong");
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
				<div class="card text-center" style="margin-top: 10px;">
					<div class="card-header"><h4>संबंध</h4></div>
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
										<input type="text" name="relation" class="form-control" placeholder="संबंध" aria-label="">
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