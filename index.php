<?php
include_once('fb-config.php');
// $actuallink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actuallink = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actuallink;
if (isset($_SESSION['fbUserId']) and $_SESSION['fbUserId'] != "") {
	header('location: ' . $actuallink . 'bienvenida.php');
	exit;
}
$permissions = array('email'); // Permiso Opcional
$loginUrl = $helper->getLoginUrl('' . $actuallink . 'fb-callback.php', $permissions);
?>
<!DOCTYPE html>
<html lang="es-CL">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loguear con Facebook utilizando PHP SDK- Login</title>
	<link rel="shortcut icon" href="https://learncodeweb.com/demo/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style>
		.card {
			padding: 1.5em 0.5em 0.5em;
			/* border-radius: 2em; */
			text-align: center;
		}

		.card img {
			width: 65%;
			border-radius: 50%;
			margin: 0 auto;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		.card .card-title {
			font-weight: 700;
			font-size: 1.5em;
		}
	</style>
</head>

<body>

	<!-- Topbar -->
	<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow p-5" style="border-top: 4px solid #17a2b8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<i class="fab fa-facebook text-info" style="font-size: 35px;"></i>
				</div>
			</div>
		</div>

	</nav>
	<!-- End of Topbar -->

	<div class="container">

		<div class="row justify-content-center">
			<div class="col-xl-4 col-sm-12">
				<div class="card shadow-sm" style="background-image: url(img/fondo.jpg);">
					<img src="img/miperfil.png" class="card-img-top" alt="">
					<div class="card-body">
						<h5 class="card-title">FAGV <small style="font-size: 10px;">Dev</small></h5>
						<p class="card-text" style="font-weight:400">"Cree en ti mismo y en lo que eres. Se consciente de que hay algo en tu interior
							que es más grande que cualquier obstáculo."
						</p>
					</div>
					<!-- <div class="card-footer border-0 bg-transparent">
						<p class="card-text" style="font-weight: 300;">"Cree en ti mismo y en lo que eres. Se consciente de que hay algo en tu interior
							que es más grande que cualquier obstáculo."
						</p>
					</div> -->
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-4 col-sm-12">
				<div class="border p-5 mt-2 shadow-sm">
					<h1 class="text-center">Login</h1>
					<div class="form-group">
						<a href="<?php echo htmlspecialchars($loginUrl); ?>" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Logueate con Facebook!</a>
					</div>
					<div class="form-group">
						<a href="javascript:void(0);" onclick="Descargar();" class="btn btn-danger btn-block"><i class="fas fa-download"></i> Descargar proyecto</a>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="row">
			<div class="col-xl-4 col-sm-12">
				<div class="card shadow-sm">
					<div class="card-body">
						<h6 class="text-center">Descargar proyecto</h6>

					</div>
				</div>
			</div>
		</div> -->
	</div>
	<!--/.container-->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script>
	    
		function Descargar(){
			// console.log("HAH " + filename);
			//Set the File URL.
			var filename = "LoginFB.zip";
			var url = "LoginFB.zip";
	
			//Create XMLHTTP Request.
			var req = new XMLHttpRequest();
			req.open("GET", url, true);
			req.responseType = "blob";
			req.onload = function () {
				//Convert the Byte Data to BLOB object.
				var blob = new Blob([req.response], { type: "application/octetstream" });
	
				//Check the Browser type and download the File.
				var isIE = false || !!document.documentMode;
				if (isIE) {
					window.navigator.msSaveBlob(blob, fileName);
				} else {
					var url = window.URL || window.webkitURL;
					link = url.createObjectURL(blob);
					var a = document.createElement("a");
					a.setAttribute("download", filename);
					a.setAttribute("href", link);
					document.body.appendChild(a);
					a.click();
					document.body.removeChild(a);
				}
			};
			req.send();
		}  
		</script>

</body>

</html>