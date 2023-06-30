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
	$edit = intval($_GET['edit']);
	$pressdate = mysqli_real_escape_string($conn,$_POST['pressdate']);
	$presshed = mysqli_real_escape_string($conn,$_POST['presshed']);
	$public = mysqli_real_escape_string($conn,$_POST['public']);
	$updated_at=date('Y-m-d h:m:s');   
	$status=1;

	if (empty($pressdate)) {
		header("Location: pressedit.php?error=Date field shuld not be blank");
	    exit();
	}else if(empty($presshed)){
		header("Location: pressedit.php?error=Heading field shuld not be blank");
	    	exit();
	}else{
			$query = mysqli_query($conn, "update press_prakashni set pressdate='$pressdate', presshed='$presshed',public='$public',Is_Active='$status',updated_at='updated_at' where id='$edit'");
			if($query){
				header("Location: pressedit.php?success=Record Updated successfully");
			}else{
				header("Location: pressedit.php?error=OOPS Something Went Wrong");
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
					<div class="card-header"><h4>Press-Prakashni</h4></div>
					<div class="card-body">
						<div class="row">
							
							<form method="post" enctype='multipart/form-data'>
								<?php if (isset($_GET['error'])) { ?>
     								<p class="error"><?php echo $_GET['error']; ?></p>
     							<?php } ?>

          						<?php if (isset($_GET['success'])) { ?>
          						    <p class="success"><?php echo $_GET['success']; ?></p>
          						<?php } ?>
          						<?php
							if(isset($_GET['edit'])){
                        			$id = intval($_GET['edit']);
                        			//var_dump($id);
                   				$query = mysqli_query($conn, "Select pressdate,presshed,public,files from press_prakashni where Is_Active=1 and id='$id'");
              					while ($row = mysqli_fetch_array($query)) {
                 				?>
								<div class="formbar">
									<div class="col-sm-3">
										<input type="date" class="form-control" name="pressdate" value="<?php echo htmlentities($row['pressdate']); ?>" aria-label="" required>
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" name= "presshed" value="<?php echo htmlentities($row['presshed']); ?>" aria-label="" required>
									</div>
									<div class="col-sm-3">
										<select name="public">
											<option value="पब्लिक देख सकती है" <?= (htmlentities($row['public']) == 'पब्लिक देख सकती है') ? 'selected' : '' ?>>पब्लिक देख सकती है</option>
											<option value="पब्लिक नहीं देख सकती है" <?= (htmlentities($row['public']) == 'पब्लिक नहीं देख सकती है') ? 'selected' : '' ?>>पब्लिक नहीं देख सकती है</option>
										</select>
									</div>
									<div class="col-sm-3">
										<lable>फाइल :-&nbsp;&nbsp;&nbsp;<?php if(isset($row['files'])){
												$images = explode(",", $row['files']);
													if(count($images) == 1 ){ ?>
														<a href="upload/press/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
												<?php }else{ 
													foreach($images as $image){ ?>
														<a href="upload/press/<?= $image?>" target="_new"><?= $image?></a>, 
												<?php }} ?>
												<?php }?></lable><br><br>
									</div>
								</div>
							</div>
							<input type="submit" class="btn" name="submit" value="Edit">
							<input type="reset" class="btn" value="Reset">
							<?php }
						}
						 ?>
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