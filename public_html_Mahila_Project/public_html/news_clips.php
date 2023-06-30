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
				<h1 style="text-align:center ;">News Clips</h1><br><hr><br>
				<div class="photo-gallery">
  				<?php
				$query="select*from newsclips order by id desc";
				$result = mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result))
				{
				?>
			<div>
				<a href="mahilaayog_master/upload/newsclips/<?php echo htmlentities($row['files']);?>" data-title="<?php echo htmlentities($row['clipdate']);?>" data-lightbox="mygallery"><img src="mahilaayog_master/upload/newsclips/<?php echo htmlentities($row['files']);?>" alt=""></a>
			</div>
			<?php
 			} ?>
  		</div>
			</div>
			
		</div>
		  <?php
include "include/footer.php";
?>