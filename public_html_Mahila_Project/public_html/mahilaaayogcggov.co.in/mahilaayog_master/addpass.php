<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
	if(isset($_POST['submit'])){

		// image upload code
			$arrImages = $_FILES['imagefile']['name'];
			$file = array();
			$tmp_names = array();
			foreach ($arrImages as $key => $arrImage) {
				$img = $arrImage;
				$file_ext = pathinfo($img, PATHINFO_EXTENSION);
				$Filename = 'passed' . "_" . rand(1000000000, 9999999999) . "." . $file_ext;
				$tmp_name = $_FILES["imagefile"]["tmp_name"][$key];
				array_push($tmp_names, $tmp_name);
				array_push($file, $Filename);
			}
			$file = implode(",",$file);
			// ----------

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$passdate = mysqli_real_escape_string($conn,$_POST['passdate']);
	$passhed = mysqli_real_escape_string($conn,$_POST['passhed']);
	$public = mysqli_real_escape_string($conn,$_POST['public']);
	$created_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($passdate)) {
		header("Location: addpass.php?error=field shuld not be blank");
	    exit();
	}else if(empty($passhed)){
		header("Location: addpass.php?error=field shuld not be blank");
	    	exit();
	}else{
			$query = mysqli_query($conn, "insert into passed_event(passdate,passhed,public,files,Is_Active,created_at) values('$passdate','$passhed','$public','$file','$status','$created_at')");
			// print_r($query);
			// die();
			if($query){
				$file = explode(",", $file);
						foreach($file as $key => $singleFile){
							move_uploaded_file($tmp_names[$key], 'upload/passed-event/'.$singleFile);
							}
				header("Location: addpass.php?success=Data Added successfully");
			}else{
				header("Location: addpass.php?error=OOPS Something Went Wrong");
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
					<div class="card-header"><h4>Passed-Events</h4></div>
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
									<div class="col-sm-3">
										<input type="date" class="form-control" name="passdate" required>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" name= "passhed" placeholder="हेडिंग" aria-label="" required>
									</div><!-- 
									<div class="col-sm-5">
										<textarea style="margin-top: 10px;" name="news" class="form-control" rows="3" placeholder="समाचार" aria-label="" required></textarea>
									</div> -->
									<div class="col-sm-3">
										<select name="public">
											<option value="पब्लिक देख सकती है" selected>पब्लिक देख सकती है</option>
											<option value="पब्लिक नहीं देख सकती है">पब्लिक नहीं देख सकती है</option>
										</select>
									</div>
									<div class="col-sm-3">
										<input type="file" name="imagefile[]" class="form-control" multiple="multiple">
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