<?php
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	if (isset($_POST['submit'])) {

		function validate($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$cased = intval($_GET['casedit']);
		$complaint = mysqli_real_escape_string($conn,$_POST['complaint']);
		$comname = mysqli_real_escape_string($conn,$_POST['comname']);
		$comadd = mysqli_real_escape_string($conn,$_POST['comadd']);
		$comtele = mysqli_real_escape_string($conn,$_POST['comtele']);
		$commob = mysqli_real_escape_string($conn,$_POST['commob']);
		$commail = mysqli_real_escape_string($conn,$_POST['commail']);
		if(isset($_POST['vicname'])){
		$vicname = mysqli_real_escape_string($conn,$_POST['vicname']);
		}else{
			$vicname = '';
		}
		if(isset($_POST['vicadd'])){
		$vicadd = mysqli_real_escape_string($conn,$_POST['vicadd']);
		}else{
			$vicadd = '';
		}
		if(isset($_POST['victele'])){
		$victele = mysqli_real_escape_string($conn,$_POST['victele']);
		}else{
			$victele = '';
		}
		if(isset($_POST['vicmob'])){
		$vicmob = mysqli_real_escape_string($conn,$_POST['vicmob']);
		}else{
			$vicmob = '';
		}
		if(isset($_POST['vicmail'])){
		$vicmail = mysqli_real_escape_string($conn,$_POST['vicmail']);
		}else{
			$vicmail = '';
		}
		// $vicadd = mysqli_real_escape_string($conn,$_POST['vicadd']);
		// $victele = mysqli_real_escape_string($conn,$_POST['victele']);
		// $vicmob = mysqli_real_escape_string($conn,$_POST['vicmob']);
		// $vicmail = mysqli_real_escape_string($conn,$_POST['vicmail']);
		$accname = mysqli_real_escape_string($conn,$_POST['accname']);
		$accadd = mysqli_real_escape_string($conn,$_POST['accuadd']);
		$acctele = mysqli_real_escape_string($conn,$_POST['acctele']);
		$accmob = mysqli_real_escape_string($conn,$_POST['accmob']);
		$accumail = mysqli_real_escape_string($conn,$_POST['accumail']);
		$subject = mysqli_real_escape_string($conn,$_POST['subject']);
		$casestatus = mysqli_real_escape_string($conn,$_POST['casestatus']);
		$casedefi = mysqli_real_escape_string($conn,$_POST['casedefi']);
		$casedeci = mysqli_real_escape_string($conn,$_POST['casedeci']);
		$note = mysqli_real_escape_string($conn,$_POST['note']);

		$updated_at = date('Y-m-d h:m:s');
		$status = 1;

		$ipaddress = $_SERVER['REMOTE_ADDR'];


		if (empty($comname)) {
			header("Location: caseedit.php?error=Complainant Name Must");
			exit();
		} else if (empty($comadd)) {
			header("Location: caseedit.php?error=Complainant Address Must");
			exit();
		} else if (empty($accname)) {
			header("Location: caseedit.php?error=Accused Name Must");
			exit();
		} else if (empty($accadd)) {
			header("Location: caseedit.php?error=Accused Address Must");
			exit();
		} else if (empty($subject)) {
			header("Location: caseedit.php?error=Subject Must");
			exit();
		} else if (empty($casestatus)) {
			header("Location: caseedit.php?error=Case Status Must");
			exit();
		} else if (empty($casedeci)) {
			header("Location: caseedit.php?error=Case Decision Must");
			exit();
		} else {
			if($complaint == "yes"){
				$query = mysqli_query($conn, "UPDATE `cases` SET `comname` = '$comname',`comadd`='$comadd',`complaint`='$complaint',`comtele`=$comtele,`commob`=$commob,`commail`='$commail',`vicname`='$comname',`vicadd`='$comadd',`victele`=$comtele,`vicmob`=$commob,`vicmail`='$commail',`accname`='$accname',`accuadd`='$accadd',`acctele`=$acctele,`accmob`=$accmob,`accumail`='$accumail',`subject`='$subject',`casestatus`='$casestatus',`casedefi`='$casedefi',`casedeci`='$casedeci',`note`='$note',`ipaddress`='$ipaddress',`Is_Active`='$status',`updated_at`='$updated_at' WHERE `id` = $cased ");
				//var_dump($query);
				// exit
				if($query){
					header("Location: caseedit.php?success=Data Updated Successfully");
				}else{
					header("Location: caseedit.php?error=OOPS Somethin Went Wrong");
				}
			}else{
				$query = mysqli_query($conn, "UPDATE `cases` SET `comname` = '$comname',`comadd`='$comadd',`complaint`='$complaint',`comtele`=$comtele,`commob`=$commob,`commail`='$commail',`vicname`='$vicname',`vicadd`='$vicadd',`victele`=$victele,`vicmob`=$vicmob,`vicmail`='$vicmail',`accname`='$accname',`accuadd`='$accadd',`acctele`=$acctele,`accmob`=$accmob,`accumail`='$accumail',`subject`='$subject',`casestatus`='$casestatus',`casedefi`='$casedefi',`casedeci`='$casedeci',`note`='$note',`ipaddress`='$ipaddress',`Is_Active`='$status',`updated_at`='$updated_at' WHERE `id` = $cased ");
				// var_dump($query);
				// exit();
				if($query){
					header("Location: caseedit.php?success=Data Updated Successfully");
				}else{
					header("Location: caseedit.php?error=OOPS Something Went Wrong");
				}
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
				<form enctype='multipart/form-data' method='post'>
					<div class="card text-center">
						<div class="card-header"><h4>Case Edit</h4></div>
								<?php if (isset($_GET['error'])) { ?>
     								<p class="error"><?php echo $_GET['error']; ?></p>
     							<?php } ?>

          						<?php if (isset($_GET['success'])) { ?>
          						    <p class="success"><?php echo $_GET['success']; ?></p>
          						<?php } ?>
							<div class="card-body">
								<?php
								if(isset($_GET['casedit'])){
							$id = intval($_GET['casedit']);
							$query="select complaint, comname, comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,accname,accuadd,acctele,accmob,accumail,year,district,crimedate,registerdate,complaintstype,subject,casestatus,casedefi,casedeci,note,files from cases where id='$id'";
							$result = mysqli_query($conn,$query);
							while($row=mysqli_fetch_array($result))
							{
							?>
								<div class="row">
									<div class="formbar">
										<div class="col-md-12">
											<lable style="color: red;">शिकायतकर्ता और पीड़ित एक ही व्यक्ति है ?(कृपया चेक करें हाँ/नहीं)</lable><br>
												<input type="radio" id="chkyes" name="complaint" value="<?php echo htmlentities($row['complaint']);?>" checked>हाँ
												&nbsp;&nbsp;&nbsp;
												<input type="radio" id="chkno" name="complaint" value="<?php echo htmlentities($row['complaint']);?>">नहीं<br><br>
											<div class="col-md-4">
												<lable>आवेदिका का नाम(Complaint)</lable>
												<input type="text" class="form-control" name="comname" value="<?php echo htmlentities($row['comname']);?>">
												<textarea style="margin-top: 10px;" name="comadd" class="form-control" rows="3"><?php echo htmlentities($row['comadd']);?></textarea>
												<input type="number" class="form-control" name="comtele" value="<?php echo htmlentities($row['comtele']);?>">
												<input type="number" class="form-control" name="commob" value="<?php echo htmlentities($row['commob']);?>">
												<input type="email" class="form-control" name="commail" value="<?php echo htmlentities($row['commail']);?>">
											</div>
											<div class="col-md-4">
												<lable>पीड़ित का नाम(Victim)</lable>
												<input type="text" class="form-control" id="vicname" name="vicname" value="<?php echo htmlentities($row['vicname']);?>" disabled="disabled">
												<textarea style="margin-top: 10px;" id="vicadd" name="vicadd" class="form-control" rows="3"  disabled="disabled"><?php echo htmlentities($row['vicadd']);?></textarea>
												<input type="number" class="form-control" id="victele" name="victele" value="<?php echo htmlentities($row['victele']);?>" disabled="disabled">
												<input type="number" class="form-control" id="vicmob" name="vicmob" value="<?php echo htmlentities($row['vicmob']);?>" disabled="disabled">
												<input type="email" class="form-control" id="vicmail" name="vicmail" value="<?php echo htmlentities($row['vicmail']);?>" disabled="disabled">
												<label>संबंध</label>
												<input type="text" class="form-control" value="<?php echo htmlentities($row['relation']);?>" disabled readonly="readonly">
											</div>
											<div class="col-md-4">
												<lable>अनावेदक का नाम(Accused)</lable>
												<input type="text" name="accname" class="form-control" value="<?php echo htmlentities($row['accname']);?>">
												<textarea style="margin-top: 10px;" name="accuadd" class="form-control" rows="3"><?php echo htmlentities($row['accuadd']);?></textarea>
												<input type="number" name="acctele" class="form-control" value="<?php echo htmlentities($row['acctele']);?>">
												<input type="number" name="accmob" class="form-control" value="<?php echo htmlentities($row['accmob']);?>">
												<input type="email" name="accumail" class="form-control" value="<?php echo htmlentities($row['accumail']);?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<label>वर्ष</label>
												<input type="text" class="form-control" value="<?php echo htmlentities($row['year']);?>" disabled readonly>
												<label>घटना का दिनाँक</label>
												<input type="date" class="form-control" value="<?php echo htmlentities($row['crimedate']);?>" disabled readonly>
												<label>केस पंजीकरण दिनांक</label>
												<input type="date" class="form-control" value="<?php echo htmlentities($row['registerdate']);?>" disabled readonly>
												<label>शिकायत के प्रकार</label>
												
												<input type="text" class="form-control" value="<?php echo htmlentities($row['complaintstype']);?>" disabled readonly>
											
												<label>विषय</label>
												<textarea style="margin-top: 10px;" name="subject" class="form-control" rows="3" ><?php echo htmlentities($row['subject']);?></textarea>
												<label>केस स्तिथि </label>
												<select name="casestatus">
													<option value="लंबित" <?= (htmlentities($row['casestatus']) == 'लंबित') ? 'selected' : '' ?> >लंबित</option>
													<option value="निरा" <?= (htmlentities($row['casestatus']) == 'निरा') ? 'selected' : '' ?> >निरा</option>
												</select>
											</div>
											<div class="col-md-6">
												<label>जिला</label>
												<input type="text" class="form-control" value="<?php echo htmlentities($row['district']);?>" disabled readonly>
												<label>संक्षिप्त विवरण</label>
												<textarea style="margin-top: 10px;" name="casedefi" class="form-control" rows="5" ><?php echo htmlentities($row['casedefi']);?></textarea>
												<label>निर्णय </label>
												<textarea style="margin-top: 10px;" name="casedeci" class="form-control" rows="5" ><?php echo htmlentities($row['casedeci']);?></textarea>
												<label>टिप्पणी </label>
												<textarea style="margin-top: 10px;" name="note" class="form-control" rows="5" ><?php echo htmlentities($row['note']);?></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<lable>दस्तावेज़ संलग्न :-&nbsp;&nbsp;&nbsp;<?php if(isset($row['files'])){
												$images = explode(",", $row['files']);
													if(count($images) == 1 ){ ?>
														<a href="upload/casefile/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
												<?php }else{ 
													foreach($images as $image){ ?>
														<a href="upload/casefile/<?= $image?>" target="_new"><?= $image?></a>, 
												<?php }} ?>
												<?php }?></lable><br><br>
												
											</div>
										</div>
										<div class="col-md-12">
											<input type="submit" class="btn" name="submit" value="Edit">
											<a href="caselist.php"><input type="button" class="btn" value="Back"></a>
										</div>
									</div>
								</div>
								<?php }
							} ?>
							</div>
						</div>
					</form>
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