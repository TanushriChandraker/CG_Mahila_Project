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
		$edit = intval($_GET['edit']);
		$operatorid = mysqli_real_escape_string($conn,$_POST['id']);
		$operatorname = mysqli_real_escape_string($conn,$_POST['name']);
		$updated_at=date('Y-m-d h:m:s');  
		$status=1;


		if (empty($operatorid)) {
			header("Location: operatoredit.php?error= Id Must");
	    		exit();
	   	}else if(empty($operatorname)){
	   		header("Location: operatoredit.php?error= Name Must");
	   		exit();
	   	}else{
		
			$query = mysqli_query($conn, "update users set username='$operatorid', name='$operatorname',Is_Active='$status',updated_at='updated_at' where id='$edit'");
			if($query){
				header("Location: operatoredit.php?success=Data Edit successfully");
			}else{
				header("Location: operatoredit.php?error=OOPS Something Went Wrong");
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
					<div class="card-header"><h4>Edit Operator</h4></div>
					<div class="card-body">
						<?php if (isset($_GET['error'])) { ?>
     						<p class="error"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

          				<?php if (isset($_GET['success'])) { ?>
         					    <p class="success"><?php echo $_GET['success']; ?></p>
    						<?php } ?>
						<div class="row">
							<?php
							if(isset($_GET['edit'])){
                        			$id = intval($_GET['edit']);
                        			//var_dump($id);
                   				$query = mysqli_query($conn, "Select username, name from users where Is_Active=1 and id='$id'");
              					while ($row = mysqli_fetch_array($query)) {
                 				?>
							<form method="post">
								
								<div class="formbar">
									
									<div class="col-sm-3">
										<input type="text" name="id" class="form-control" value="<?php echo htmlentities($row['username']); ?>">
									</div>
									<div class="col-sm-3">
										<input type="text" name="name" class="form-control" value="<?php echo htmlentities($row['name']); ?>">
									</div>
								</div>
								
							</div>
							<input type="submit" class="btn" name="submit" value="Edit">
							<input type="reset" class="btn" value="Reset">
						</form>
						<?php }
						}
						 ?>
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