<!DOCTYPE html>
<html>
<head>
    <title>QR Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body onload="switchCam()">

    <!-- <h1>JQuery HTML5 QR Code Scanner </h1> -->
    <div>
        <button onclick="switchCam()">Open Scanner </button><br>
    </div> 
    <!-- <div class="form-group col-sm-12"> -->
        <div>
            <br>
            <center>
                <video id="preview" width="500" height="360"></video>
            </center>
            
        </div>
        <!-- </div> -->
        <script type="text/javascript">
            // switchCam();
            var camID=0;
            function switchCam() {
            // if (camID==2) { 
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                scanner.addListener('scan', function (content) {
                    alert(content);
                    // scanner.close(camID);
                    window.open(content);
                    // switchCam();
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        var selectedCam = cameras[0];
                        $.each(cameras, (i, c) => {
                            if (c.name.indexOf('back') != -1) {
                                selectedCam = c;
                                return false;
                            }
                        });
                        camID=selectedCam;
                        scanner.start(selectedCam);
                        // scanner.start(cameras[2]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
                camID=0;
            // }else{
            //  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            //  scanner.addListener('scan', function (content) {
            //      alert(content);
            //      window.open(content);
            //  });
            //  Instascan.Camera.getCameras().then(function (cameras) {
            //      if (cameras.length > 0) {
            //          var selectedCam = cameras[0];
            //          $.each(cameras, (i, c) => {
            //              if (c.name.indexOf('back') != -1) {
            //                  selectedCam = c;
            //                  return false;
            //              }
            //          });

            //          scanner.start(selectedCam);
            //          // scanner.start(cameras[0]);
            //      } else {
            //          console.error('No cameras found.');
            //      }
            //  }).catch(function (e) {
            //      console.error(e);
            //  });
            //  camID=2;
            // }
        }

    </script>

</body>
</html>