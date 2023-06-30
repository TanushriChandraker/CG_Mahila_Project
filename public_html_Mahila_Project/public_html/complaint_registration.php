<?php
include "include/config.php";
    
    if (isset($_POST['submit'])) {

    // image upload code
      $arrImages = $_FILES['imagefile']['name'];
      $file = array();
      $tmp_names = array();
      foreach ($arrImages as $key => $arrImage) {
        $img = $arrImage;
        $file_ext = pathinfo($img, PATHINFO_EXTENSION);
        $Filename = 'ccase' . "_" . rand(1000000000, 9999999999) . "." . $file_ext;
        $tmp_name = $_FILES["imagefile"]["tmp_name"][$key];
        array_push($tmp_names, $tmp_name);
        array_push($file, $Filename);
      }
      $file = implode(",",$file);
      //--------------Police case file 
      $arrImages_1 = $_FILES['imagefile_1']['name'];
      $file_1 = array();
      $tmp_names_1 = array();
      foreach ($arrImages_1 as $key => $arrImage_1) {
        $img_1 = $arrImage_1;
        $file_ext_1 = pathinfo($img_1, PATHINFO_EXTENSION);
        $Filename_1 = 'pcase' . "_" . rand(1000000000, 9999999999) . "." . $file_ext_1;
        $tmp_name_1 = $_FILES["imagefile_1"]["tmp_name"][$key];
        array_push($tmp_names_1, $tmp_name_1);
        array_push($file_1, $Filename_1);
      }
      $file_1 = implode(",",$file_1);
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
    $crimedate = mysqli_real_escape_string($conn,$_POST['crimedate']);
    $year = mysqli_real_escape_string($conn,$_POST['year']);
    $complaintstype = mysqli_real_escape_string($conn,$_POST['complaintstype']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $casedefi = mysqli_real_escape_string($conn,$_POST['casedefi']);

    $created_at = date('Y-m-d h:m:s');
    $registerdate = date('Y-m-d h:m:s');
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
      header("Location: complaint_registration.php?error=Complainant Name Must");
      exit();
    } else if (empty($comadd)) {
      header("Location: complaint_registration.php?error=Complainant Address Must");
      exit();
    } else if (empty($accname)) {
      header("Location: complaint_registration.php?error=Accused Name Must");
      exit();
    } else if (empty($accadd)) {
      header("Location: complaint_registration.php?error=Accused Address Must");
      exit();
    } else if (empty($crimedate)) {
      header("Location: complaint_registration.php?error=Crime Date Must");
      exit();
    } else if (empty($subject)) {
      header("Location: complaint_registration.php?error=Subject Must");
      exit();
    } else {
      if($complaint == "yes"){
        $query = mysqli_query($conn, "insert into cases(caseid,casepws,complaint,comname,comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,district,accname,accuadd,acctele,accmob,accumail,crimedate,complaintstype,subject,casedefi,year,files,files_1,ipaddress,registerdate,Is_Active,created_at) values($caseid,'$casepws','$complaint','$comname','$comadd','$comtele','$commob','$commail','$comname','$comadd','$comtele','$commob','$commail','$relation','$district','$accname','$accadd','$acctele','$accmob','$accumail','$crimedate','$complaintstype','$subject','$casedefi','$year','$file','$file_1','$ipaddress','$registerdate','$status','$created_at')");
        if($query){
            $file = explode(",", $file);
            foreach($file as $key => $singleFile){
              move_uploaded_file($tmp_names[$key], 'mahilaayog_master/upload/casefile/'.$singleFile);
              }
          header("Location: complaint_registration.php?success=Your case Id $caseid and Case Password $casepws");
        }else{
          header("Location: complaint_registration.php?error=OOPS Somethin Went Wrong");
        }
      }else{
        $query = mysqli_query($conn, "insert into cases(caseid,casepws,complaint,comname,comadd,comtele,commob,commail,vicname,vicadd,victele,vicmob,vicmail,relation,district,accname,accuadd,acctele,accmob,accumail,crimedate,complaintstype,subject,casedefi,year,files,files_1,ipaddress,registerdate,Is_Active,created_at) values($caseid,'$casepws','$complaint','$comname','$comadd','$comtele','$commob','$commail','$vicname','$vicadd','$victele','$vicmob','$vicmail','$relation','$district','$accname','$accadd','$acctele','$accmob','$accumail','$crimedate','$complaintstype','$subject','$casedefi','$year','$file','$file_1','$ipaddress','$registerdate','$status','$created_at')");
        if($query){
            $file = explode(",", $file);
            foreach($file as $key => $singleFile){
              move_uploaded_file($tmp_names[$key], 'upload/casefile/'.$singleFile);
              }
          header("Location: complaint_registration.php?success=Your case Id $caseid and Case Password $casepws");
        }else{
          header("Location: complaint_registration.php?error=OOPS Something Went Wrong");
        }
      }
    }
  }
?>
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
            <a href="complaint_status.php"
              >दर्ज़ कराई गई शिकायत की स्थिति की जांच</a
            >
          </li>
        </ul>
      </div>
      <div class="col-10 col-s-9">
        <h1>ऑनलाइन शिकायत पंजीकरण</h1>
        <br />
        <hr />
        <br />
        <form method="post" enctype='multipart/form-data'>
          <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <div class="form-head">
              <label style="color: red; text-align: center;">शिकायतकर्ता और पीड़ित एक ही व्यक्ति है ?<br>
                <input type="radio" id="chkyes" name="complaint" value="yes" checked>हाँ&nbsp;&nbsp;&nbsp;
                <input type="radio" id="chkno" name="complaint" value="no">नहीं
              </label>
               <label style="color:red;">Note:- यदि हाँ, तब पीड़ित(Vicitim) कॉलम भरने की आवश्यकता नहीं है |</label><br><br>
            <div class="first_row_form">
              <div class="complainant">
                <label for="">आवेदिका (Complainant)</label><br><hr><br>
                <input type="text" name="comname" placeholder="आवेदिका का नाम">
                <textarea style="margin-top: 10px;" name="comadd" rows="3" placeholder="आवेदिका का पता"></textarea>
                <input type="number" name="comtele" placeholder="आवेदिका का दूरभाष">
                <input type="number" name="commob" placeholder="आवेदिका का मोबाईल">
                <input type="email" name="commail" placeholder="आवेदिका का ई-मेल">
              </div>
              <div class="victim">

                <label for="">पीड़ित (Victim)</label><br><hr><br>
                <input type="text" id="vicname" name="vicname" placeholder="पीड़ित का नाम">
                <textarea style="margin-top: 10px;" id="vicadd" name="vicadd" rows="3" placeholder=" पीड़ित का पता"></textarea>
                <input type="number" id="victele" name="victele" placeholder="पीड़ित का दूरभाष">
                <input type="number" id="vicmob" name="vicmob" placeholder="पीड़ित का मोबाईल">
                <input type="email" id="vicmail" name="vicmail" placeholder="पीड़ित का ई-मेल" >

                <select name="relation">
                          <option selected>संबंध</option>
                          <?php
                        $query="SELECT id,relation FROM relation";
                        mysqli_set_charset($conn,'utf8');
                        $result = mysqli_query($conn,$query);
                        $row=mysqli_fetch_array($result);
                        //print_r($row);
                        while($row=mysqli_fetch_array($result))
                        { 
                        ?>
                          <option value="<?php echo $row['relation'];?>"><?php echo $row['relation'];?></option>
                          <?php }?> 
  
                        </select>
                        <?php print_r($row); ?>
                        
              </div>

              <div class="accused">
                <label for=""> अनावेदक (Accused)</label><br><hr><br>
                <input type="text" name="accname" class="form-control" placeholder="अनावेदक का नाम">
                <textarea style="margin-top: 10px;" name="accuadd" class="form-control" rows="3" placeholder="अनावेदक का पता"></textarea>
                <input type="number" name="acctele" class="form-control" placeholder="अनावेदक का दूरभाष">
                <input type="number" name="accmob" class="form-control" placeholder="अनावेदक का मोबाईल">
                <input type="email" name="accumail" class="form-control" placeholder="अनावेदक का ई-मेल">   
                <select name="district">
                    <option selected>जिला</option>
                        <?php
                        $query="SELECT id,district FROM district";
                        mysqli_set_charset($conn,'utf8');
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                          <option value="<?php echo $row['district'];?>"><?php echo $row['district'];?></option>
                          <?php }?>
                        </select>
                </div>
            </div>
            <div class="second_row_form">
              <div>
                <!-- <label>वर्ष</label> -->
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
                </select><br><br>
              
              <!-- <label>शिकायत के प्रकार</label> -->
                        <select name="complaintstype">
                          <option selected>शिकायत के प्रकार</option>
                          <?php
                        $query="SELECT id,type FROM complaintstype";
                        mysqli_set_charset($conn,'utf8');
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <option value="<?php echo $row['type'];?>"><?php echo $row['type'];?></option>
                        <?php }?>
                        </select><br><br>
              <label>घटना का दिनाँक</label><br>
              <input type="date" name="crimedate">

			         <label>विषय</label>
			           <textarea style="margin-top: 10px;" name="subject" rows="3" ></textarea>

                 <label>संक्षिप्त विवरण</label>
          <textarea style="margin-top: 10px;" name="casedefi" class="form-control" rows="5" ></textarea>

        <label for="">अन्य विवरण संलग्न करे:-<br></label>
         <label style="color: red; text-align: center;"><br>अन्य कोर्ट केस /
          मुकदमा ?
           <input type="radio" id="ccyes" name="complaint_2" value="yes" checked>हाँ
           <input type="radio" id="ccno" name="complaint_2" value="no">नहीं
              </label>
        <input type="file" name="imagefile[]" accept="image/*" multiple="multiple"/> 
        <label style="color: red; text-align: center;"><br>अन्य पुलिस केस /
          मुकदमा ?
           <input type="radio" id="pcyes" name="complaint_1" value="yes" checked>हाँ
           <input type="radio" id="pcno" name="complaint_1" value="no">नहीं
              </label>
         <input type="file" name="imagefile_1[]" accept="image/*" multiple="multiple">
        <label style="color: red;">Note: मल्टीपल फाइल को जोड़ने के लिए कंप्यूटर के कंट्रोल बटन को प्रेस करके फाइल को सेलेक्ट करें</label><br><br>
       <div class="btn">
      <input type="submit" name="submit" value="Submit">
      <input type="reset" value="Cancel">
         </div>
            </div>
          </div>
      </div>
        </form>
      </div>
    </div>
    <?php
include "include/footer.php";
?>
<!-- <script type="text/javascript">
  $('#ccyes').click(function(){
  alert("hello"); 

  });

  $('.complaint').change(function()
   {
    var check;
    var check = $(this).is(':radio');
    alert("radio");

   });

</script> -->