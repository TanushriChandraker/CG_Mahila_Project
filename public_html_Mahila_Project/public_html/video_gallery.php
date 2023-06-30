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
			<div class="col-10 col-s-9">
				<h1 style="text-align:center ;">Video Gallery</h1><br><hr><br>
				<div class="video-gallery">
				<?php
              $query="select*from video_gallery order by id desc";
              $result = mysqli_query($conn,$query);
              while($row=mysqli_fetch_array($result))
              {
              ?>
					<iframe src="https://www.youtube.com/embed/<?php echo htmlentities($row['vid']);?>" allowfullscreen> </iframe>
				<?php
      } ?>
				</div>
			</div>
			
		</div>
		  <?php
include "include/footer.php";
?>