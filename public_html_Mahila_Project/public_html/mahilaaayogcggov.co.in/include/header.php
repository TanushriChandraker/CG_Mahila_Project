<!DOCTYPE html>
<html>
  <head>
    <title>Chhattisgarh State Commission for Women, India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/lightbox.min.css"/>
    <script src="assets/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>
    <script type="text/javascript">
      $(function() {
        $("input[name = 'complaint']").click(function(){
          if($("#chkyes").is(":checked")){
            $("#vicname").attr("disabled", "disabled");
            $("#vicadd").attr("disabled", "disabled");
            $("#victele").attr("disabled", "disabled");
            $("#vicmob").attr("disabled", "disabled");
            $("#vicmail").attr("disabled", "disabled");
          }else{
            $("#vicname").removeAttr("disabled");
            $("#vicname").focus();
            $("#vicadd").removeAttr("disabled");
            $("#vicadd").focus();
            $("#victele").removeAttr("disabled");
            $("#victele").focus();
            $("#vicmob").removeAttr("disabled");
            $("#vicmob").focus();
            $("#vicmail").removeAttr("disabled");
            $("#vicmail").focus();
          }
        });
            
            });
        
    </script>
    <script>
      n =  new Date();
      y = n.getFullYear();
      m = n.getMonth() + 1;
      d = n.getDate();
      document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
    </script>
    <div class="body_container">
      <div class="blueBar">
        <div class="helpline">
          <strong>TOLL FREE Number:</strong> 18002334299
        </div>
        <div class="skype">
          <strong>Skype ID:</strong> cgmahilaayog@skype.com
        </div>
        <div class="followUsBlock">
          <div class="float_left followUsTxt">
            <strong>Follow us on :</strong>
          </div>
          <div class="float_left socialIcos">
            <a href="#"><img src="./assets/image/skypeIco.jpg" alt="" /></a>
          </div>
          <div class="float_left socialIcos">
            <a href="#"><img src="./assets/image/twIco.jpg" alt="" /></a>
          </div>
          <div class="float_left socialIcos">
            <a href="#"><img src="./assets/image/ytIco.jpg" alt="" /></a>
          </div>
        </div>
        <div>
          <h4 id="date"></h4>
        </div>
      </div>
      <div class="logo_container">
        <img src="./assets/image/logo.jpg" alt="" />
      </div>
      <nav class="navbar">
     
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <!-- USING CHECKBOX HACK -->
       <input type="checkbox" id="checkbox_toggle" />
       <label for="checkbox_toggle" class="hamburger">&#9776;</label>
       <!-- NAVIGATION MENUS -->
       <div class="menu">
         <li><a href="index.php">होमपेज</a></li>
         <li class="services">
           <a href="#">आयोग एक नज़र में</a>
           <ul class="dropdown">
             <li><a href="gathan_ka_uddeshy.php">गठन का उद्देश्य</a></li>
             <li><a href="aayog_ke_pramukh.php">आयोग के प्रमुख कार्य दायित्व</a></li>
             <li><a href="Commission's_Priorities.php">आयोग की प्राथमिकताएं</a></li>
             <li><a href="Cases_registered.php">आयोग में दर्ज प्रकरण एवं निराकरण</a></li>
             <li><a href="structure.php">संरचना</a></li>
             <li><a href="Commission_Functioning.php">आयोग की कार्यप्रणाली</a></li>
             <li><a href="how_to_complain.php">शिकायत कैसे करें</a></li>
           </ul>
         </li>
         <li class="services">
           <a href="#">मिडिया</a>
           <ul class="dropdown">
             <li><a href="photo_gallery.php">फोटो गैलरी</a></li>
             <li><a href="video_gallery.php">वीडियो गैलरी</a></li>
             <li><a href="press_prakashni.php">प्रेस प्रकाशनी</a></li>
             <li><a href="news_clips.php">समाचार कतरन</a></li>
           </ul>
         </li>
         <li class="services">
           <a href="#">शिकायते</a>
           <ul class="dropdown">
             <li><a href="complaint_registration.php">ऑनलाइन शिकायत पंजीकरण</a></li>
             <li><a href="Complaint_Status.php">दर्ज़ कराई गई शिकायत की स्थिति की जांच</a></li>
           </ul>
         </li>
         <li class="services">
           <a href="#">सूचना का अधिकार</a>
           <ul class="dropdown">
             <li><a href="more_info">अधिक जानकारी</a></li>
             <li><a href="/">ऑनलाइन आर टी आई फाइल करे</a></li>
           </ul>
         </li>
         <li><a href="contacts.php">संपर्क सूत्र</a></li>
         <li><a href="#">सुझाव भेजें</a></li>
       </div>
     </ul>
   </nav>
    </div>