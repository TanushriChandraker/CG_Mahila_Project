<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	$act = isset($_GET['action']);
	if($act=='del'){
	$id = $_GET['ct'];
	$query = mysqli_query($conn, "delete from complaintstype where id = '$id'");
	if($query){
		header("Location: complaintlist.php?success=Record Deleted Successfuly");
	}else{
		header("Location: complaintlist.php?error=OOPS Something Went Wrong");
	}
}
 ?>
<?php include('includes/header.php'); ?>
<?php include('includes/leftsidebar.php'); ?>
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title-box">
							<h4 class="page-title">शिकायत के प्रकार</h4>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
				<!-- <div class="card text-center">
					<div class="card-header"><h4>Search Panel</h4></div>
					<div class="card-body">
						<div class="row">
							<form>
								<div class="formbar">
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="शिकायत के प्रकार" aria-label="">
									</div>
								</div>
							</div>
							<input type="submit" class="btn" value="Search">
							<input type="submit" class="btn" value="Show All">
							<input type="reset" class="btn" value="Reset">
						</form>
					</div>
				</div> -->
				<?php if (isset($_GET['error'])) { ?>
     				<p class="error"><?php echo $_GET['error']; ?></p>
     			<?php }?>
          		<?php if (isset($_GET['success'])) { ?>
          		    <p class="success"><?php echo $_GET['success']; ?></p>
          		<?php } ?>
				<div style="overflow-x: auto;">
					<table>
						<thead>
							<tr>
								<th>क़मांक</th>
								<th>शिकायत के प्रकार</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$query="select*from complaintstype";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['type']);?></td>
								<td><a href="complaintlist.php?ct=<?php echo ($row['id']);?>&&action=del"><input type="button" class="btn btn-danger" value="Delete"></a></td>
							</tr>
							<?php
							$cnt++;
 							} ?>
						</tbody>
					</table>
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