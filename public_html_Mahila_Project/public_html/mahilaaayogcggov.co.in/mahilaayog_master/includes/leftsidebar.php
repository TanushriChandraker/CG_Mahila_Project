<?php 
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<div class="left side-menu">
				<div class="sidebar-inner"style="overflow-y:scroll;">
					<div id="sidebar-menu">
						<ul>
							<li class="menu-title">Navigation</li>
							<li class="has_sub">
								<a href="dashboard.php"><i class="fas fa-angle-double-right"></i><span>Dashboard</span>
							</a>
						</li>
						
						<?php if ($_SESSION['role'] == 'operator') {?>
							<li class="has_sub">
							<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Cases</span><i class="fas fa-angle-down iconright"></i>
						</a>
						<ul class="list-unstyled">
							<li><a href="newcase.php">New Case File</a></li>
							<li><a href="caselist.php">Case List</a></li>
							<li><a href="uploadcases.php">Upload Case File</a></li>
						</ul>
						</li>
					<?php }else{?>
						<li class="has_sub">
							<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Cases</span><i class="fas fa-angle-down iconright"></i>
						</a>
						<ul class="list-unstyled">
							<li><a href="caselist.php">Case List</a></li>
							<li><a href="uploadcases.php">Upload Case File</a></li>
						</ul>
						</li>
						<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Operartor</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="newoperator.php">New Operartor</a></li>
							<li><a href="operatorlist.php">Operartor List</a></li>
						</ul>
					</li>
					
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Complaints</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="newcomplaintstype.php">New Type</a></li>
							<li><a href="complaintlist.php">Complaints List</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Relationship</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="relation.php">New Relation</a></li>
							<li><a href="relationlist.php">Relation List</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>District</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="newdistrict.php">New District</a></li>
							<li><a href="districtlist.php">District List</a></li>
						</ul>
					</li>
					<?php }?>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Letter Info</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="letter.php">Letter</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Photo Gallery</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="imagecategory.php">Catrgories</a></li>
							<li><a href="viewimagecategory.php">View Category</a></li>
							<li><a href="newimage.php">New Photo</a></li>
							<li><a href="imagelist.php">View Photo List</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Video Gallery</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addvid.php">Add Video</a></li>
							<li><a href="vidlist.php">Video list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Up-Event</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addup.php">Add Up-Event</a></li>
							<li><a href="uplist.php">Up-Event list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Passed-Event</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addpass.php">Add Pass-Event</a></li>
							<li><a href="passlist.php">Pass-Event list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Notice & Notification</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addnews.php">Add Notice</a></li>
							<li><a href="newslist.php">Notice list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Press Prakashni</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addpress.php">Add Press</a></li>
							<li><a href="presslist.php">Press list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>News Clips</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addclip.php">Add Clip</a></li>
							<li><a href="cliplist.php">Clip list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Counter</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="addcounter.php">Add Counter</a></li>
							<li><a href="counterlist.php">Counter list</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>Report</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="#monthlyreport.php">Monthly Report</a></li>
							<li><a href="#yearlyreport.php">Yearly Report</a></li>
						</ul>
					</li>
					<li class="has_sub">
						<a href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></i> <span>User</span><i class="fas fa-angle-down iconright"></i></a>
						<ul class="list-unstyled">
							<li><a href="changepws.php">Change Password</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>