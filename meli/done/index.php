<?php
session_start('meliexpress');
if($_SESSION['MELI_the_token']==""){
  header("location: /meli");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="simpleoauth">
  <title>simpleoauth</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="../../assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="../../assets/tether/tether.min.css">
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="../../assets/theme/css/style.css">
  <link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css" type="text/css">
  
  <meta name="robots" content="noindex">
  
</head>
<body>
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-3" style="background-image: url(../../assets/images/mbr-2000x1333.jpg);">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1">¡LISTO!</h1>
                    <p class="mbr-section-lead lead">Hola, <?php echo $_SESSION['MELI_nickname'];?>, tu token único es:</p>
                    <p class="mbr-section-lead lead"><?php echo $_SESSION['MELI_the_token']; ?></p></br>
                    <p style="color:white">Ahora puedes recuperar tu <strong>access_token</strong> siempre renovado desde:</p>
                    <p><a style="color:white" href="https://simpleoauth.com/api/meli/get_token/?token=<?php echo $_SESSION['MELI_the_token']; ?>">https://simpleoauth.com/api/meli/get_token/?token=<?php echo $_SESSION['MELI_the_token']; ?></a></p>
                    <p style="color:white;">Recuerda guardar este token único de forma segura.</p>
                    <div class="mbr-section-btn"><a class="btn btn-lg btn-danger" href="/api/meli/delete/?token=<?php echo $_SESSION['MELI_the_token']; ?>">ELIMINAR TOKEN</a> </div>
                    <div class="mbr-section-btn"><a class="btn btn-lg btn-primary" href="/meli/">VOLVER</a> </div>
                    
                </div>
            </div>
        </div>
    </div>


</section>
<?php
$_SESSION['MELI_the_token']="";
$_SESSION['MELI_nickname'] ="";
 ?>

  <section class="engine"><script src="../../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../../assets/tether/tether.min.js"></script>
  <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="../../assets/jarallax/jarallax.js"></script>
  <script src="../../assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="../../assets/theme/js/script.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>