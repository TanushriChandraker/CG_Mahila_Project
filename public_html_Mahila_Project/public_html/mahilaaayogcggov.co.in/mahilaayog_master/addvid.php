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
	$vid = mysqli_real_escape_string($conn,$_POST['vid']);
	$created_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($vid)) {
		header("Location: addvid.php?error=field shuld not be blank");
	    exit();
	}else{
			$query = mysqli_query($conn, "insert into video_gallery(vid,Is_Active,created_at) values('$vid','$status','$created_at')");
			// print_r($query);
			// die();
			if($query){
				header("Location: addvid.php?success=Data Added successfully");
			}else{
				header("Location: addvid.php?error=OOPS Something Went Wrong");
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
					<div class="card-header"><h4>Video Gallery</h4></div>
					<div class="card-body">
						<div class="row">
							<form method="post" enctype='multipart/form-data'>
								<?php if (isset($_GET['error'])) { ?>
     								<p class="error"><?php echo $_GET['error']; ?></p>
     							<?php } ?>

          						<?php if (isset($_GET['success'])) { ?>
          						    <p class="success"><?php echo $_GET['success']; ?></p>
          						<?php } ?>
								<div class="formbar">
									<div class="col-sm-11">
										<textarea style="margin-top: 10px;" name="vid" class="form-control" rows="3" placeholder="Enter Video Link" aria-label="" required></textarea>
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