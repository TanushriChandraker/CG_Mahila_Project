<?php
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

	if (isset($_POST['submit'])) {

		// image upload code
			$arrImages = $_FILES['imagefile']['name'];
			$file = array();
			$tmp_names = array();
			foreach ($arrImages as $key => $arrImage) {
				$img = $arrImage;
				$file_ext = pathinfo($img, PATHINFO_EXTENSION);
				$Filename = 'case' . "_" . rand(1000000000, 9999999999) . "." . $file_ext;
				$tmp_name = $_FILES["imagefile"]["tmp_name"][$key];
				array_push($tmp_names, $tmp_name);
				array_push($file, $Filename);
			}
			$file = implode(",",$file);
			// ----------
		function validate($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$complaint = mysqli_real_escape_string($conn,$_POST['complaint']);
		$comname = mysqli_real_escape_string($conn,$_POST['comname']);
		$comadd = mysqli_real_escape_string($conn,$_POST['comadd']);
		$comtele = mysqli_real_escape_string($conn,$_POST['comtele']);
		$commob = mysqli_real_escape_string($conn,$_POST['commob']);
		$commail = mysqli_real_escape_string($conn,$_POST['commail']);
		$vicname = mysqli_real_escape_string($conn,$_POST['vicname']);
		$vicadd = mysqli_real_escape_string($conn,$_POST['vicadd']);
		$victele = mysqli_real_escape_string($conn,$_POST['victele']);
		$vicmob = mysqli_real_escape_string($conn,$_POST['vicmob']);
		$vicmail = mysqli_real_escape_string($conn,$_POST['vicmail']);
		$relation = mysqli_real_escape_string($conn,$_POST['relation']);
		$district = mysqli_real_escape_string($conn,$_POST['district']);
		$accname = mysqli_real_escape_string($conn,$_POST['accname']);
		$accadd = mysqli_real_escape_string($conn,$_POST['accuadd']);
		$acctele = mysqli_real_escape_string($conn,$_POST['acctele']);
		$accmob = mysqli_real_escape_string($conn,$_POST['accmob']);
		$accumail = mysqli_real_escape_string($conn,$_POST['accumail']);
		$year = mysqli_real_escape_string($conn,$_POST['year']);
		$crimedate = mysqli_real_escape_string($conn,$_POST['crimedate']);
		$registerdate = mysqli_real_escape_string($conn,$_POST['registerdate']);
		$complaintstype = mysqli_real_escape_string($conn,$_POST['complaintstype']);
		$subject = mysqli_real_escape_string($conn,$_POST['subject']);
		$casestatus = mysqli_real_escape_string($conn,$_POST['casestatus']);
		$casedefi = mysqli_real_escape_string($conn,$_POST['casedefi']);
		$casedeci = mysqli_real_escape_string($conn,$_POST['casedeci']);
		$note = mysqli_real_escape_string($conn,$_POST['note']);

		$created_at = date('Y-m-d h:m:s');
		$status = 1;

		$caseid = rand(1000000000, 9999999999);

		function casepass($length = 10)
		{
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

		$casepws = casepass();

		$ipaddress = $_SERVER['REMOTE_ADDR'];


		if (empty($comname)) {
			header("Location: newcase.php?error=Complainant Name Must");
			exit();
		} else if (empty($comadd)) {
			header("Location: newcase.php?error=Complainant Address Must");
			exit();
		} else if (empty($accname)) {
			header("Location: newcase.php?error=Accused Name Must");
			exit();
		} else if (empty($accadd)) {
			header("Location: newcase.php?error=Accused Address Must");
			exit();
		} else if (empty($year)) {
			header("Location: newcase.php?error=Year Must");
			exit();
		} else if (empty($crimedate)) {
			header("Location: newcase.php?error=Crime Date Must");
			exit();
		} else if (empty($registerdate)) {
			header("Location: newcase.php?error=Regiter Date Must");
			exit();
		} else if (empty($subject)) {
			header("Location: newcase.php?error=Subject Must");
			exit();
		} else if (empty($casestatus)) {
			header("Location: newcase.php?error=Case Status Must");
			exit();
		} else if (empty($casedeci)) {
			header("Location: newcase.php?error=Case Decision Must");
			exit();
		} else {
			if($complaint == "yes"){
				$query = mysqli_query($conn, "insert into cases(caseid,casepws,complaint,comname,comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,district,accname,accuadd,acctele,accmob,accumail,year,crimedate,registerdate,complaintstype,subject,casestatus,casedefi,casedeci,note,files,ipaddress,Is_Active,created_at) values($caseid,'$casepws','$complaint','$comname','$comadd','$comtele','$commob','$commail','$comname','$comadd','$comtele','$commob','$commail','$relation','$district','$accname','$accadd','$acctele','$accmob','$accumail','$year','$crimedate','$registerdate','$complaintstype','$subject','$casestatus','$casedefi','$casedeci','$note','$file','$ipaddress','$status','$created_at')");
				if($query){
						$file = explode(",", $file);
						foreach($file as $key => $singleFile){
							move_uploaded_file($tmp_names[$key], 'upload/casefile/'.$singleFile);
							}
					header("Location: newcase.php?success=Your case Id $caseid and Case Password $casepws");
				}else{
					header("Location: newcase.php?error=OOPS Something Went Wrong");
				}
			}else{
				$query = mysqli_query($conn, "insert into cases(caseid,casepws,complaint,comname,comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,district,accname,accuadd,acctele,accmob,accumail,year,crimedate,registerdate,complaintstype,subject,casestatus,casedefi,casedeci,note,files,ipaddress,Is_Active,created_at) values($caseid,'$casepws','$complaint','$comname','$comadd','$comtele','$commob','$commail','$vicname','$vicadd','$victele','$vicmob','$vicmail','$relation','$district','$accname','$accadd','$acctele','$accmob','$accumail','$year','$crimedate','$registerdate','$complaintstype','$subject','$casestatus','$casedefi','$casedeci','$note','$file','$ipaddress','$status','$created_at')");
				if($query){
						$file = explode(",", $file);
						foreach($file as $key => $singleFile){
							move_uploaded_file($tmp_names[$key], 'upload/casefile/'.$singleFile);
							}
					header("Location: newcase.php?success=Your case Id $caseid and Case Password $casepws");
				}else{
					header("Location: newcase.php?error=OOPS Something Went Wrong");
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
						<div class="card-header"><h4>Case Entry</h4></div>
								<?php if (isset($_GET['error'])) { ?>
     								<p class="error"><?php echo $_GET['error']; ?></p>
     							<?php } ?>

          						<?php if (isset($_GET['success'])) { ?>
          						    <p class="success"><?php echo $_GET['success']; ?></p>
          						<?php } ?>
							<div class="card-body">
								<div class="row">
									<div class="formbar">
										<div class="col-md-12">
											<lable style="color: red;">शिकायतकर्ता और पीड़ित एक ही व्यक्ति है ?(कृपया चेक करें हाँ/नहीं)</lable><br>
												<input type="radio" id="chkyes" name="complaint" value="yes">हाँ
												&nbsp;&nbsp;&nbsp;
												<input type="radio" id="chkno" name="complaint" value="no">नहीं<br><br>
											<div class="col-md-4">
												<lable>आवेदिका का नाम(Complaint)</lable>
												<input type="text" class="form-control" name="comname" placeholder="आवेदिका का नाम">
												<textarea style="margin-top: 10px;" name="comadd" class="form-control" rows="3" placeholder="आवेदिका का पता"></textarea>
												<input type="number" class="form-control" name="comtele" placeholder="आवेदिका का दूरभाष">
												<input type="number" class="form-control" name="commob" placeholder="आवेदिका का मोबाईल">
												<input type="email" class="form-control" name="commail" placeholder="आवेदिका का ई-मेल">
											</div>
											<div class="col-md-4">
												<lable>पीड़ित का नाम(Victim)</lable>
												<input type="text" class="form-control" id="vicname" name="vicname" placeholder="पीड़ित का नाम" disabled="disabled">
												<textarea style="margin-top: 10px;" id="vicadd" name="vicadd" class="form-control" rows="3" placeholder=" पीड़ित का पता" disabled="disabled"></textarea>
												<input type="number" class="form-control" id="victele" name="victele" placeholder="पीड़ित का दूरभाष" disabled="disabled">
												<input type="number" class="form-control" id="vicmob" name="vicmob" placeholder="पीड़ित का मोबाईल" disabled="disabled">
												<input type="email" class="form-control" id="vicmail" name="vicmail" placeholder="पीड़ित का ई-मेल" disabled="disabled">
												<select name="relation">
													<option selected>संबंध</option>
													<?php
												$query="select*from relation";
												$result = mysqli_query($conn,$query);
												while($row=mysqli_fetch_array($result))
												{
												?>
													<option value="<?php echo htmlentities($row['relation']);?>"><td><?php echo htmlentities($row['relation']);?></option>
													<?php }?>
												</select>
											</div>
											<div class="col-md-4">
												<lable>अनावेदक का नाम(Accused)</lable>
												<input type="text" name="accname" class="form-control" placeholder="अनावेदक का नाम">
												<textarea style="margin-top: 10px;" name="accuadd" class="form-control" rows="3" placeholder="अनावेदक का पता"></textarea>
												<input type="number" name="acctele" class="form-control" placeholder="अनावेदक का दूरभाष">
												<input type="number" name="accmob" class="form-control" placeholder="अनावेदक का मोबाईल">
												<input type="email" name="accumail" class="form-control" placeholder="अनावेदक का ई-मेल">
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<label>वर्ष</label>
												<select name="year">
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
												<label>घटना का दिनाँक</label>
												<input type="date" name="crimedate" class="form-control">
												<label>केस पंजीकरण दिनांक</label>
												<input type="date" name="registerdate" class="form-control">
												<label>शिकायत के प्रकार</label>
												
												<select name="complaintstype">
													<option selected>शिकायत के प्रकार</option>
													<?php
												$query="select*from complaintstype";
												$result = mysqli_query($conn,$query);
												while($row=mysqli_fetch_array($result))
												{
												?>
												<option value="<?php echo htmlentities($row['type']);?>"><?php echo htmlentities($row['type']);?></option>
												<?php }?>
												</select>
											
												<label>विषय</label>
												<textarea style="margin-top: 10px;" name="subject" class="form-control" rows="3" ></textarea>
												<label>केस स्तिथि </label>
												<select name="casestatus">
													<option value="लंबित" selected>लंबित</option>
													<option value="निरा">निरा</option>
												</select>
											</div>
											<div class="col-md-6">
												<label>जिला</label>
												<select name="district">
													<option selected>जिला</option>
													<?php
												$query="select*from district";
												$result = mysqli_query($conn,$query);
												while($row=mysqli_fetch_array($result))
												{
												?>
													<option value="<?php echo htmlentities($row['district']);?>"><td><?php echo htmlentities($row['district']);?></option>
													<?php }?>
												</select>
												<label>संक्षिप्त विवरण</label>
												<textarea style="margin-top: 10px;" name="casedefi" class="form-control" rows="5" ></textarea>
												<label>निर्णय </label>
												<textarea style="margin-top: 10px;" name="casedeci" class="form-control" rows="5" ></textarea>
												<label>टिप्पणी </label>
												<textarea style="margin-top: 10px;" name="note" class="form-control" rows="5" ></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="col-md-6">
												<input type="file" name="imagefile[]" class="form-control" multiple="multiple">
												<label style="color: red;">Note: मल्टीपल फाइल को जोड़ने के लिए कंप्यूटर के कंट्रोल बटन को प्रेस करके फाइल को सेलेक्ट करें</label>
											</div>
										</div>
										<div class="col-md-12">
											<input type="submit" class="btn" name="submit" value="Add">
											<input type="reset" class="btn" value="Reset">
										</div>
									</div>
								</div>
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