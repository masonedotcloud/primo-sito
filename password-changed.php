<?php
     require_once "controllerUserData.php"; //controller insert data
         if (!empty($_SESSION['nome_azienda'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit(0);
    }
     if($_SESSION['info'] == false){
          header('Location: login.php');
     }
?>
<!-- start html file -->
<!DOCTYPE html>
<html lang="en">
<!-- Head section -->
     <head>
          <meta charset="utf-8">
          <link rel="shortcut icon" href="assets/images/site/favicon.ico" type="image/x-icon">  
          <meta name=viewport content="width=device-width, initial-scale=1">
          <link id="pageStyle" rel="stylesheet" href="statics\css\bootstrap_default.min.css">
          <title>Alessandromasone.com</title>
     </head>
     <body>
          <!-- view page user -->
          <div class="contianer mt-5">
               <div class="row d-flex justify-content-center m-0">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm col form login-form">
                         <div class="d-flex flex-column p-4 rounded-3">
                              <?php if(isset($_SESSION['info'])){ ?>
                                   <div class="alert alert-success text-center">
                                        <?php echo $_SESSION['info']; ?>
                                   </div>
                              <?php } ?>
                              <form action="login.php" method="POST" autocomplete="">
                                   <div class="d-flex justify-content-center form-group mb-3">
                                        <input class="form-control btn-success" type="submit" name="login-now" value="Login Now">
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <!-- end view page user -->
          <!-- script for bootstra bundle -->
     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
          <!-- script for darkmode & save in local the preference -->
          <script>
               const currentTheme = localStorage.getItem('theme');
                    if (currentTheme === 'dark') {
                         document.getElementById("pageStyle").setAttribute('href', "statics\\css\\bootstrap_darkly.min.css");
                    }
               toggleSwitch.addEventListener('change', switchTheme, false);
          </script>
     </body>
</html>