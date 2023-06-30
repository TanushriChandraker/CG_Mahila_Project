<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	$act = isset($_GET['action']);
	if($act=='del'){
	$id = intval($_GET['del']);
	$res = "SELECT * FROM press_prakashni where id=$id";
        $sql = mysqli_query($conn, $res) or die("Query failed : select");
        $row = mysqli_fetch_assoc($sql);
        // print_r($row['files']);
          $row['files'] = explode(',', $row['files']);
        foreach($row['files'] as $file){
        unlink("upload/press/".$file);  	
        }
        // die();
	$query = mysqli_query($conn, "delete from press_prakashni where id = '$id'");
	if($query){
		header("Location: presslist.php?success = Record Deleted Successfuly");
	}else{
		header("Location: presslist.php?error = OOPS Something Went Wrong");
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
							<h4 class="page-title">Press-Prakashni List</h4>
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
									<div class="col-sm-3"><h4> दिनांक से</h4>
										<input type="date" class="form-control" aria-label="">
									</div>
									<div class="col-sm-3"><h4>दिनांक तक</h4>
										<input type="date" class="form-control" aria-label="">
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
				<div style="overflow-x: auto;">
					<table >
						<thead>
							<tr>
								<th>क़मांक</th>
								<th>डेट</th>
								<th>हेडिंग</th>
								<th>पब्लिक</th>
								<th>फाइल</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query="select*from press_prakashni";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['pressdate']);?></td>
								<td><?php echo htmlentities($row['presshed']);?></td>
								<td><?php echo htmlentities($row['public']);?></td>
								<td><?php if(isset($row['files'])){
								$images = explode(",", $row['files']);
									if(count($images) == 1 ){ ?>
										<a href="upload/press/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
								<?php }else{ 
									foreach($images as $image){ ?>
										<a href="upload/press/<?= $image?>" target="_new"><?= $image?></a>, 
								<?php }} ?>
								<?php }?></td>
								<td><a href="pressedit.php?edit=<?php echo ($row['id']);?>"><input type="button" class="btn btn-primary" value="Edit"></a>
								<a href="presslist.php?del=<?php echo ($row['id']);?>&action=del"><input type="button" class="btn btn-danger" value="Delete"></td>
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