<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	$act = isset($_GET['action']);
	if($act=='del'){
	$id = intval($_GET['ndel']);
	$res = "SELECT * FROM news where id=$id";
        $sql = mysqli_query($conn, $res) or die("Query failed : select");
        $row = mysqli_fetch_assoc($sql);
        // print_r($row['files']);
          $row['files'] = explode(',', $row['files']);
        foreach($row['files'] as $file){
        unlink("upload/news/".$file);  	
        }
        // die();
	$query = mysqli_query($conn, "delete from news where id = '$id'");
	if($query){
		header("Location: newslist.php?success = Record Deleted Successfuly");
	}else{
		header("Location: newslist.php?error = OOPS Something Went Wrong");
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
							<h4 class="page-title">समाचार सूचि</h4>
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
								<th>समाचार डेट</th>
								<th>समाचार हेडिंग</th>
								<th>समाचार</th>
								<th>पब्लिक</th>
								<th>फाइल</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query="select*from news";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['newsdate']);?></td>
								<td><?php echo htmlentities($row['newshed']);?></td>
								<td><?php echo htmlentities($row['news']);?></td>
								<td><?php echo htmlentities($row['public']);?></td>
								<td><?php if(isset($row['files'])){
								$images = explode(",", $row['files']);
									if(count($images) == 1 ){ ?>
										<a href="upload/news/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
								<?php }else{ 
									foreach($images as $image){ ?>
										<a href="upload/news/<?= $image?>" target="_new"><?= $image?></a>, 
								<?php }} ?>
								<?php }?></td>
								<td><a href="newsedit.php?edit=<?php echo ($row['id']);?>"><input type="button" class="btn btn-primary" value="Edit"></a>
								<a href="newslist.php?ndel=<?php echo ($row['id']);?>&action=del"><input type="button" class="btn btn-danger" value="Delete"></td>
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