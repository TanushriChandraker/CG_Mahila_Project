<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	$act = isset($_GET['action']);
	if($act=='del'){
	$id = intval($_GET['oopdel']);
	$query = mysqli_query($conn, "delete from users where id = '$id'");
	if($query){
		header("Location: operatorlist.php?success = Record Deleted Successfuly");
	}else{
		header("Location: operatorlist.php?error = OOPS Something Went Wrong");
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
							<h4 class="page-title">Operator List</h4>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
				<!-- <div class="card text-center">
					<div class="card-header"><h4>Search Panel</h4></div>
					<div class="card-body">
						<div class="row">
							<form action="#">
								<div class="formbar">
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="Operator Id" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="Operator Name" aria-label="">
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
								<th>Role</th>
								<th>Operator Id</th>
								<th>Operator Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query="select*from users";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['role']);?></td>
								<td><?php echo htmlentities($row['username']);?></td>
								<td><?php echo htmlentities($row['name']);?></td>
								<td><a href="operatoredit.php?edit=<?php echo ($row['id']);?>"><input type="button" class="btn btn-primary" value="Edit"></a>
								<a href="operatorlist.php?oopdel=<?php echo ($row['id']);?>&action=del"><input type="button" class="btn btn-danger" value="Delete"></a></td>
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