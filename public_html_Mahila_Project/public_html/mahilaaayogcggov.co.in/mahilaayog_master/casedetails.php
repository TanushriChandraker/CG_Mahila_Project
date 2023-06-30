<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {


 ?>
<?php include('includes/header.php'); ?>
<?php include('includes/leftsidebar.php'); ?>
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<div class="row">
				</div>
				<!-- end row --><?php
							if(isset($_GET['casedetail'])){
							$id = intval($_GET['casedetail']);
							$query="select id, caseid,casepws,ipaddress,comname, comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,accname,accuadd,acctele,accmob,accumail,year,district,crimedate,registerdate,complaintstype,subject,casestatus,casedefi,casedeci,note,files from cases where id='$id'";
							$result = mysqli_query($conn,$query);
							while($row=mysqli_fetch_array($result))
							{
							?>
				<div class="card text-center">
					<div class="card-header"><h4>केस का विवरण</h4></div>
					<div class="card-body">
						<div class="row">
						<div class="col-md-12">
							<lable><strong>केस क़मांक:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['id']);?>&nbsp;&nbsp;&nbsp;&nbsp;केस आईडी: <?php echo htmlentities($row['caseid']); ?>&nbsp;&nbsp;&nbsp;&nbsp;केस पासवर्ड: <?php echo htmlentities($row['casepws']); ?>&nbsp;&nbsp;&nbsp;&nbsp;IP Address: <?php echo htmlentities($row['ipaddress']); ?></strong></lable><br>
							<div class="col-md-4 cased">
								<lable><strong>आवेदिका का नाम(Complaint)</strong></lable><br><br>
								<lable>आवेदिका का नाम:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['comname']); ?></lable><br>
								<lable>आवेदिका का पता:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['comadd']); ?></lable><br>
								<lable>आवेदिका का दूरभाष:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['comtele']); ?></lable><br>
								<lable>आवेदिका का मोबाईल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['commob']); ?></lable><br>
								<lable>आवेदिका का ई-मेल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['commail']); ?></lable><br>
							</div>
							<div class="col-md-4 cased">
								<lable><strong>पीड़ित का नाम(Victim)</strong></lable><br><br>
								<lable>पीड़ित का नाम:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['vicname']); ?></lable><br>
								<lable>पीड़ित का पता:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['vicadd']); ?></lable><br>
								<lable>पीड़ित का दूरभाष:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['victele']); ?></lable><br>
								<lable>पीड़ित का मोबाईल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['vicmob']); ?></lable><br>
								<lable>पीड़ित का ई-मेल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['vicmail']); ?></lable><br>
								<lable>संबंध:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['relation']); ?></lable><br>
							</div>
							<div class="col-md-4 cased">
								<lable><strong>अनावेदक  का नाम(Accused)</strong></lable><br><br>
								<lable>अनावेदक का नाम:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['accname']); ?></lable><br>
								<lable>अनावेदक का पता:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['accuadd']); ?></lable><br>
								<lable>अनावेदक का दूरभाष:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['acctele']); ?></lable><br>
								<lable>अनावेदक का मोबाईल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['accmob']); ?></lable><br>
								<lable>अनावेदक का ई-मेल:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['accumail']); ?></lable><br>
								<lable>जिला :-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['district']); ?></lable><br>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6 cased">
								<lable>वर्ष:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['year']); ?></lable><br>
								<lable>घटना का दिनाँक:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['crimedate']); ?></lable><br>
								<lable>केस पंजीकरण दिनांक:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['registerdate']); ?></lable>
							</div>
							<div class="col-md-6 cased">
								<lable>शिकायत के प्रकार:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['complaintstype']); ?></lable><br>
								<lable>विषय:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['subject']); ?></lable><br>
								<lable>केस स्तिथि:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['casestatus']); ?></lable>
							</div>
						</div>
						<div class="col-md-12">
							<lable>संक्षिप्त विवरण:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['casedefi']); ?></lable><br>
							<lable>निर्णय:-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['casedeci']); ?></lable><br>
							<lable>टिप्पणी :-&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['note']); ?></lable><br>
							<lable>दस्तावेज़ संलग्न :-&nbsp;&nbsp;&nbsp;<?php if(isset($row['files'])){
								$images = explode(",", $row['files']);
									if(count($images) == 1 ){ ?>
										<a href="upload/casefile/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
								<?php }else{ 
									foreach($images as $image){ ?>
										<a href="upload/casefile/<?= $image?>" target="_new"><?= $image?></a>, 
								<?php }} ?>
								<?php }?></lable><br>
						</div>
						<a href="caselist.php"><input type="button" class="btn" value="Back"></a>
					</div>
				</div>
			</div>
			<?php }
		} ?>
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