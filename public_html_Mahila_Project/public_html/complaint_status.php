<?php
include "include/header.php";
?>
    <div class="row">
      <div class="col-2 col-s-3 side-menu">
        <ul>
          <li>
            <a href="complaint_registration.php">ऑनलाइन शिकायत पंजीकरण</a>
          </li>
          <li>
            <a href="Complaint_Status.php">दर्ज़ कराई गई शिकायत की स्थिति की जांच</a>
          </li>
        </ul>
      </div>
      <div class="col-10 col-s-9">
        <h1>दर्ज़ कराई गई शिकायत की स्थिति की जांच</h1>
        <br />
        <hr />
        <br />
          <div class="form-head">
            <!-- search form start -->
            <form method="post" enctype='multipart/form-data'>
              <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
              <?php } ?>
              <?php if (isset($_GET['success'])) { ?>
                  <p class="success"><?php echo $_GET['success']; ?></p>
              <?php } ?>
            <div class="first_row_form">
              <div class="complainant">
                <label>केस आईडी डालें</label><br>
                <input type="text" name="caseid">
                <label>केस पासवर्ड डालें</label><br>
                <input type="text" name="casepws">
                <div class="btn">
                    <input type="submit" name="submit" value="Search">
                </div>
              </div>
            </div>
          </form><br><br><hr><br>
          <!-- search form end -->

          <!-- fetch data from database -->
          <?php
            include "include/config.php";
            if(isset($_POST['submit'])){
            
                function validate($data){
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
                }
                $casid = mysqli_real_escape_string($conn,$_POST['caseid']);
                $caspws = mysqli_real_escape_string($conn,$_POST['casepws']);
            
                $res = "SELECT * FROM cases where caseid = '$casid' AND casepws = '$caspws'";
                $sql = mysqli_query($conn,$res) or die("Query failed : select");
                if(mysqli_num_rows($sql)>0){
                    while($row = mysqli_fetch_array($sql)){ ?>
                           <label style="text-align: center;">केस स्तिथि :&nbsp;<?php echo htmlentities($row['casestatus']);?></label><br>
                           <label style="text-align: center;">शिकायत के प्रकार :&nbsp;<?php echo htmlentities($row['complaintstype']);?></label><br>
          
            <div class="first_row_form">
              <!-- complaint data -->
              <div class="complainant">
                <label>आवेदिका (Complainant)</label><br><hr><br>
                <label>आवेदिका का नाम </label><br>
                <input type="text" value="<?php echo htmlentities($row['comname']);?>" READONLY>
                <label>आवेदिका का पता </label><br>
                <textarea style="margin-top: 10px;" READONLY><?php echo htmlentities($row['comadd']);?></textarea>
                <label>आवेदिका का दूरभाष </label><br>
                <input type="text" value="<?php echo htmlentities($row['comtele']);?>" READONLY>
                <label>आवेदिका का मोबाईल </label><br>
                <input type="text" value="commob" READONLY>
                <label>आवेदिका का ई-मेल </label><br>
                <input type="text" value="<?php echo htmlentities($row['commail']);?>" READONLY>
              </div>
              <!-- --------------- -->
              <!-- victim data -->
              <div class="victim">
                <label>पीड़ित (Victim)</label><br><hr><br>
                <label>पीड़ित का नाम</label><br>
                <input type="text" value="<?php echo htmlentities($row['vicname']);?>" READONLY>
                <label>पीड़ित का पता</label><br>
                <textarea style="margin-top: 10px;" READONLY><?php echo htmlentities($row['vicadd']);?></textarea>
                <label>पीड़ित का दूरभाष</label><br>
                <input type="text" value="<?php echo htmlentities($row['victele']);?>" READONLY>
                <label>पीड़ित का मोबाईल</label><br>
                <input type="text" value="<?php echo htmlentities($row['vicmob']);?>" READONLY>
                <label>पीड़ित का ई-मेल</label><br>
                <input type="text" value="<?php echo htmlentities($row['vicmail']);?>" READONLY>
                <label>संबंध : &nbsp;<?php echo htmlentities($row['relation']);?></label><br>
              </div>
              <!-- ------------------ -->
              <!-- accused data -->
              <div class="accused">
                <label>अनावेदक (Accused)</label><br><hr><br>
                <label>अनावेदक का नाम</label><br>
                <input type="text" value="<?php echo htmlentities($row['accname']);?>" READONLY>
                <label>अनावेदक का पता</label><br>
                <textarea style="margin-top: 10px;"rows="3" READONLY><?php echo htmlentities($row['accuadd']);?></textarea>
                <label>अनावेदक का दूरभाष</label><br>
                <input type="text" value="<?php echo htmlentities($row['acctele']);?>" READONLY>
                <label>अनावेदक का मोबाईल</label><br>
                <input type="text" value="<?php echo htmlentities($row['accmob']);?>" READONLY>
                <label>अनावेदक का ई-मेल</label><br>
                <input type="text" value="<?php echo htmlentities($row['accumail']);?>" READONLY>
                <label>जिला : &nbsp;<?php echo htmlentities($row['district']);?></label><br>
                </div>
                <!-- ------------------ -->
            </div>
            <div class="second_row_form">
              <div>
                <label>घटना का दिनाँक</label><br>
                <input type="text" value="<?php echo htmlentities($row['crimedate']);?>" READONLY>

                <label>केस पंजीकरण दिनांक</label><br>
                <input type="text" value="<?php echo htmlentities($row['registerdate']);?>" READONLY>

                <label>विषय</label>
                <textarea style="margin-top: 10px;"rows="5" READONLY><?php echo htmlentities($row['subject']);?></textarea>

                <label>संक्षिप्त विवरण</label>
                <textarea style="margin-top: 10px;" rows="10" READONLY><?php echo htmlentities($row['casedefi']);?></textarea>

                <label>निर्णय : </label>
                <textarea style="margin-top: 10px;" rows="10" READONLY><?php echo htmlentities($row['casedeci']);?></textarea>

                <label>अन्य विवरण: &nbsp;<?php if(isset($row['files'])){
                $images = explode(",", $row['files']);
                  if(count($images) == 1 ){ ?>
                    <a href="mahilaayog_master/upload/casefile/<?= $images[0]?>" target="_new"><?= $images[0]?></a>
                <?php }else{ 
                  foreach($images as $image){ ?>
                    <a href="mahilaayog_master/upload/casefile/<?= $image?>" target="_new"><?= $image?></a>, 
                <?php }} ?>
                <?php }?></label>
              </div>
            </div>
            <?php
                        }
                    }else{
                       echo "इनवैलिड केस आईडी और केस पासवर्ड";
                    }
                }
            ?>
          <!----------------------------->
              
        </div>
      </div>
    </div>
    <?php
include "include/footer.php";
?>