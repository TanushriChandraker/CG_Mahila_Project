  <?php
include "include/header.php";
include "include/config.php";
?>
		<div class="row">
			<div class="col-2 col-s-3 side-menu">
				<ul>
					<li><a href="photo_gallery.php">फोटो गैलरी</a></li>
					<li><a href="video_gallery.php">वीडियो गैलरी</a></li>
					<li><a href="press_prakashni.php">प्रेस प्रकाशनी</a></li>
					<li><a href="news_clips.php">समाचार कतरन</a></li>
				</ul>
			</div>
			<div class="col-10 col-s-9" style="overflow-x: auto;">
				<h1>Press Release</h1><br><hr><br>
				<table class="contact">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Date</th>
							<th>Document Namet</th>
							<th>Attach Document</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="select*from press_prakashni order by id desc";
							$result = mysqli_query($conn,$query);
							$cnt=1;
							while($row=mysqli_fetch_array($result))
							{
							?>
						<tr>
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($row['pressdate']);?></td>
							<td><?php echo htmlentities($row['presshed']);?></td>
							<td><?php if(isset($row['files'])){
								$images = explode(",", $row['files']);
									if(count($images) == 1 ){ ?>
										<a href="mahilaayog_master/upload/press/<?= $images[0]?>" target="_new"<?= $images[0]?>>View Document</a>
								<?php }else{ 
									foreach($images as $image){ ?>
										<a href="mahilaayog_master/upload/press/<?= $image?>" target="_new"<?= $image?>>View Document</a>, 
								<?php }} ?>
								<?php }?></td>
						</tr>
						<?php
						$cnt++;
						 }?>
					</tbody>
				</table>
			</div>
			
		</div>
		  <?php
include "include/footer.php";
?>