<?php
include "include/config.php";
include "include/header.php";
?>
    <div class="corosal_container">
      <div class="slider">
        <div class="slide active">
          <img src="assets/image/images1.png" alt="" />
        </div>
        <div class="slide">
          <img src="assets/image/images2.png" alt="" />
        </div>
        <div class="slide">
          <img src="assets/image/images3.png" alt="" />
        </div>
        <div class="slide">
          <img src="assets/image/images4.png" alt="" />
        </div>
        <div class="slide">
          <img src="assets/image/images5.png" alt="" />
        </div>
        <div class="navigation">
          <i class="fas fa-chevron-left prev-btn"></i>
          <i class="fas fa-chevron-right next-btn"></i>
        </div>
        <div class="navigation-visibility">
          <div class="slide-icon active"></div>
          <div class="slide-icon"></div>
          <div class="slide-icon"></div>
          <div class="slide-icon"></div>
          <div class="slide-icon"></div>
        </div>
      </div>
    </div>

    <div class="about_container">
      <div class="about-text">
        <h1>छत्तीसगढ़ राज्य महिला आयोग, रायपुर</h1>
        <p style="text-align:justify; margin: 1.8rem;">
          समृद्ध व सशक्त समाज की परिकल्पना महिला के उत्थान के बिना नही की जा सकती नवम्बर 2000 में छत्तीसगढ़ राज्य के गठन के उपरांत प्रदेश सरकार ने महिलाओं के हित में अनेक फैसले लिए है। प्रदेश में महिलाओं को सशक्त बनाने महिलाओं के हितों की देखभाल व उनका संरक्षण करने महिलाओं के प्रति भेदभाव व्यवस्था को समाप्त करने, हर क्षेत्र में उन्हें विकास के सामान अवसर दिलाने एवं महिलाओं पर होने वाले अत्याचारों, अपराधों पर त्वरित कार्यवाही करने के लिए प्रदेश में राज्य महिला आयोेग की स्थापना 24.03.2001 को किया गया है।
        </p>
      </div>
      <div class="about-image">
        <img src="./assets//image/image.jpeg" alt="" />
      </div>
    </div>

    <div class="event_container">
      <div class="cont1">
        <div class="up-board">
          <h3>Upcoming Events</h3>
          <div class="news-roller">
            <marquee
              onMouseOver="this.stop()"
              onMouseOut="this.start()"
              direction="up">
        <?php
        $query="select*from upcoming_event where public = 'पब्लिक देख सकती है' order by id desc";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
              <p>
                <a href="mahilaayog_master/upload/upcoming-event/<?php echo htmlentities($row['files']);?>" target="_blank">
                  <span
                    ><h5><?php echo htmlentities($row['up_date']);?></h5><?php echo htmlentities($row['uphed']);?>
                  </span>
                </a>
              </p>
              <?php
      } ?>
            </marquee>
          </div>
        </div>
      </div>
      <div class="cont2">
        <div class="pass-board">
          <h3>Passed Events</h3>
          <div class="news-roller">
            <marquee
              onMouseOver="this.stop()"
              onMouseOut="this.start()"
              direction="up">
            <?php
        $query="select*from passed_event where public = 'पब्लिक देख सकती है' order by id desc";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
              <p>
                <a href="mahilaayog_master/upload/passed-event/<?php echo htmlentities($row['files']);?>" target="_blank">
                  <span
                    ><h5><?php echo htmlentities($row['passdate']);?></h5><?php echo htmlentities($row['passhed']);?>
                  </span>
                </a>
              </p>
              <?php
      } ?>
            </marquee>
          </div>
        </div>
      </div>
      <div class="cont3">
        <div class="notice-board">
          <h3>Notice & Notifications</h3>
          <div class="news-roller">
            <marquee
              onMouseOver="this.stop()"
              onMouseOut="this.start()"
              direction="up"
            ><?php
        $query="select*from news where public = 'पब्लिक देख सकती है' order by id desc";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
              <p>
                <a href="mahilaayog_master/upload/news/<?php echo htmlentities($row['files']);?>" target="_blank">
                  <span
                    ><h5><?php echo htmlentities($row['newsdate']);?></h5><?php echo htmlentities($row['newshed']);?>
                  </span>
                </a>
              </p>
              <?php
      } ?>
            </marquee>
          </div>
        </div>
      </div>
    </div>

    <div class="counter_container">
      <div class="counter-up">
        <div class="content">
          <?php
              $query="select*from counter";
              $result = mysqli_query($conn,$query);
              while($row=mysqli_fetch_array($result))
              {
              ?>
          <div class="box">
            <div class="count" data-target="<?php echo htmlentities($row['cmorg']);?>"><?php echo htmlentities($row['cmorg']);?></div>
            <div class="text">Number of camps organised</div>
          </div>
          <div class="box">
            <div class="count" data-target="<?php echo htmlentities($row['cashnld']);?>"><?php echo htmlentities($row['cashnld']);?></div>
            <div class="text">Number of cases handled</div>
          </div>
          <div class="box">
            <div class="count" data-target="<?php echo htmlentities($row['cassol']);?>"><?php echo htmlentities($row['cassol']);?></div>
            <div class="text">Number of cases solved</div>
          </div>
          <?php
          } ?>
        </div>
      </div>
    </div>

    <div class="social_media_container">
      <div class="ad-image">
        <div
          class="bg-color-white card-shadow padding-20"
          style="height: 400px; overflow: hidden"
        >
          <div
            class="font-24 bottom-border-2 padding-bottom-12 margin-bottom-20 text-color-grey-600"
          >
            Facebook
          </div>
          <div
            class="fb-page"
            data-href="https://www.facebook.com/UGI.UniversalChandigarh"
            data-tabs="timeline"
            data-width="1800"
            data-height="500"
            data-small-header="false"
            data-adapt-container-width="true"
            data-hide-cover="false"
            data-show-facepile="true"
          >
            <blockquote
              cite="https://www.facebook.com/UGI.UniversalChandigarh"
              class="fb-xfbml-parse-ignore"
            >
              <a href="https://www.facebook.com/UGI.UniversalChandigarh"
                >UGI- Universal Group of Institutions</a
              >
            </blockquote>
          </div>
          <div id="fb-root"></div>
          <script
            async
            defer
            crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0"
            nonce="n6WfsaQf"
          ></script>
        </div>
      </div>
      <div class="ad-image">
        <div
          class="bg-color-white card-shadow padding-20"
          style="height: 400px; overflow: hidden"
        >
          <div
            class="font-24 bottom-border-2 padding-bottom-12 margin-bottom-20 text-color-grey-600"
          >
            Twitter
          </div>
          <a
            class="twitter-timeline"
            data-lang="en"
            data-height="500"
            data-dnt="true"
            href="https://twitter.com/UGICollege?ref_src=twsrc%5Etfw"
            >Tweets by UGI
          </a>
          <script
            async
            src="https://platform.twitter.com/widgets.js"
            charset="utf-8"
          ></script>
        </div>
      </div>
    </div>

    <div class="photo_container">
      <div class="heading">Photo Gallery</div>
      <main class="photo_grid">
        <?php
        $query="select*from imagegallery order by id desc LIMIT 8";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <article>
          <img src="mahilaayog_master/upload/imagegallery/<?php echo htmlentities($row['files']);?>" alt="Image Gallery" />
          <button onclick="location.href = 'photo_gallery.php'" >View Gallery</button>
        </article>
        <?php
      } ?>
      </main>
    </div>

    <div class="video_container">
      <div class="heading">Video Gallery</div>
      <div class="video-container-container">
        <?php
              $query="select*from video_gallery order by id desc LIMIT 6";
              $result = mysqli_query($conn,$query);
              while($row=mysqli_fetch_array($result))
              {
              ?>
        <div class="video">
          <iframe
            src="https://www.youtube.com/embed/<?php echo htmlentities($row['vid']);?>" allowfullscreen>
          </iframe>
        </div>
        <?php
      } ?>
      </div>
    </div>

    <div class="map_container">
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d118992.11064952934!2d81.5596002!3d21.2515299!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28dd93c7a3719f%3A0xabe5d9499f1beab7!2sState%20Commission%20For%20Women!5e0!3m2!1sen!2sin!4v1658985899357!5m2!1sen!2sin"
          width="100%"
          height="420"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>
    </div>
  <?php
include "include/footer.php";
?>
