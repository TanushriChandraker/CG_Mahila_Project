<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

	if(isset($_POST['submit'])){

		// image upload code
			$arrImages = $_FILES['imagefile']['name'];
			// print_r($arrImages);
			// die();
			$file = array();
			$tmp_names = array();
			foreach ($arrImages as $key => $arrImage) {
				$img = $arrImage;
				$file_ext = pathinfo($img, PATHINFO_EXTENSION);
				$Filename = 'gallery' . "_" . rand(1000000000, 9999999999) . "." . $file_ext;
				$tmp_name = $_FILES["imagefile"]["tmp_name"][$key];
				array_push($tmp_names, $tmp_name);
				array_push($file, $Filename);
			}
			$file = implode(",",$file);

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$imagecat = mysqli_real_escape_string($conn,$_POST['imagecat']);
	$imahead = mysqli_real_escape_string($conn,$_POST['imahead']);
	$created_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($imagecat)) {
		header("Location: newimage.php?error=This field shuld not be blank");
	    exit();
	}else if(empty($imahead)){
		header("Location: newimage.php?error=This field shuld not be blank");
	    exit();
	}else{
		$query = mysqli_query($conn, "insert into imagegallery(imagecat,imahead,files,Is_Active,created_at) values('$imagecat','$imahead','$file','$status','$created_at')");
		if($query){
					$file = explode(",", $file);
						foreach($file as $key => $singleFile){
							move_uploaded_file($tmp_names[$key], 'upload/imagegallery/'.$singleFile);
							}
			header("Location: newimage.php?success=Data Added successfully");
		}else{
			header("Location: newimage.php?error=OOPS Something Went Wrong");
		}
	}
	}
 ?>
<?php include('includes/header.php'); ?>
<?php include('includes/leftsidebar.php'); ?>
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container"><!-- 
				<div class="row">
					<div class="col-md-12">
						<div class="page-title-box">
							<h4 class="page-title">New Operator</h4>
							<div class="clearfix"></div>
						</div>
					</div>
				</div> -->
				<!-- end row -->
				<div class="card text-center" style="margin-top: 10px;">
					<div class="card-header"><h4>चित्र गैलेरी</h4></div>
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
										<select name="imagecat">
											<option selected>चित्र प्रकार</option>
											<?php
												$query="select*from imagecategory";
												$result = mysqli_query($conn,$query);
												while($row=mysqli_fetch_array($result))
												{
												?>
											<option value="<?php echo htmlentities($row['imagecat']);?>"><?php echo htmlentities($row['imagecat']);?></option>
											<?php }?>
										</select>
									</div>
									<div class="col-sm-3">
										<input type="file" name="imagefile[]" class="form-control" multiple="multiple">
									</div>
									<div class="col-sm-5">
										<textarea style="margin-top: 10px;" name="imahead" class="form-control" rows="2" placeholder="चित्र हेडिंग" ></textarea>
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