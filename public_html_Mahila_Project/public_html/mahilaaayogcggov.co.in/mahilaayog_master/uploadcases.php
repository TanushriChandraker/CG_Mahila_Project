<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	$act = isset($_GET['action']);
	if($act=='del'){
	$id = intval($_GET['cdel']);
	$res = "SELECT * FROM cases where id=$id";
        $sql = mysqli_query($conn, $res) or die("Query failed : select");
        $row = mysqli_fetch_assoc($sql);

        unlink("upload/casefile/" . $row['files']);
	$query = mysqli_query($conn, "delete from cases where id = '$id'");
	if($query){
		header("Location: caselist.php?success=Record Deleted Successfuly");
	}else{
		header("Location: caselist.php?error=OOPS Something Went Wrong");
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
							<h4 class="page-title">केस सूचि</h4>
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
										<input type="text" class="form-control" placeholder="क़मांक" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="date" class="form-control" placeholder="केस पंजीकरण दिनांक सॆ" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="date" class="form-control" placeholder="केस पंजीकरण दिनांक तक" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="आवेदिका का नाम" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="अनावेदक का नाम" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="निर्णय" aria-label="">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder=" केस आईडी" aria-label="">
									</div>
									<div class="col-sm-3">
										<select aria-label="">
											<option selected> वर्ष</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
										</select>
									</div>
									<div class="col-sm-3">
										<select aria-label="">
											<option selected>शिकायत के प्रकार</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
									</div>
									<div class="col-sm-3">
										<select aria-label="">
											<option selected> केस स्तिथि</option>
											<option value="1"> लंबित</option>
											<option value="2">निरा</option>
										</select>
									</div>
									<div class="col-sm-3">
										<select aria-label="">
											<option selected>जिला</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
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
								<th>केस आईडी</th>
								<th>केस पासवर्ड</th>
								<th>वर्ष</th>
								<th>केस पंजीकरण दिनांक </th>
								<th>जिला</th>
								<th>आवेदिका का नाम</th>
								<th>केस स्तिथि</th>
								<th>IP Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query="select*from cases order by id desc";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php echo htmlentities($row['caseid']);?></td>
								<td><?php echo htmlentities($row['casepws']);?></td>
								<td><?php echo htmlentities($row['year']);?></td>
								<td><?php echo htmlentities($row['registerdate']);?></td>
								<td><?php echo htmlentities($row['district']);?></td>
								<td><?php echo htmlentities($row['accname']);?></td>
								<td><?php echo htmlentities($row['casestatus']);?></td>
								<td><?php echo htmlentities($row['ipaddress']);?></td>
								<td><a href="caseedit.php?casedit=<?php echo ($row['id']);?>"><input type="button" class="btn btn-primary" value="Edit Case"></a>
								<a href="caselist.php?cdel=<?php echo ($row['id']);?>&action=del"><input type="button" class="btn btn-danger" value="Delete Case"></a>
							<a href="casedetails.php?casedetail=<?php echo ($row['id']);?>"><input type="button" class="btn btn-info" value="View Case"></a></td>
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