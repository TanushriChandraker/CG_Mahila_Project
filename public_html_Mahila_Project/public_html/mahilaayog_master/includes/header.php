<?php 
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['district'])) {
}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="1200;url=logout.php"/>
		<title>Chhattisgarh State Commission for Women, India</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/other.css" rel="stylesheet" type="text/css"/>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>
	<body class="fixed-left">
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
		<div id="wrapper">
			<div class="topbar">
				<div class="topbar-left">
					<a href="#" class="logo"><span>MAHILA<span> AAYOG</span></span><i class="fas fa-layer-group"></i></a>
				</div>
				<div class="navbar navbar-default" role="navigation">
					<div class="container">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<button class="button-menu-mobile open-left waves-effect">
								<i class="fa fa-bars" aria-hidden="true"></i>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		