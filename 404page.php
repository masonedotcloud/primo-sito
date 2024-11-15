<?php
     header("HTTP/1.0 404 Not Found");
     include "db.php";   //connection to database
         if (!empty($_SESSION['nome_azienda'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <link rel="shortcut icon" href="assets/images/site/favicon.ico" type="image/x-icon">  
     	<meta name=viewport content="width=device-width, initial-scale=1">
          <link id="pageStyle" rel="stylesheet" href="statics\css\bootstrap_default.min.css">
     	<title>Alessandromasone.com</title>
          <style>
          main {
               width: 100%;
          }
          .error-h1 {
               font-size: 60px;
          }
          .error-p {
               font-size: 20px;
          }
          </style>
     </head>
     <body>
          <?php include ('includes/header.php'); ?>
          <main>
               <div class="container d-flex justify-content-center mt-5 pt-5">
                    <div class="d-flex flex-column">
                         <div class="d-flex justify-content-center mb-4 pb-4">
                              <img src="assets/images/site/dart-Fener.png" alt="" width="202">
                         </div>

                         <h1 class="text-center text-muted error-h1"><strong>404 ERROR</strong></h1>
                         <p class="text-center text-muted error-p">You underestimate the power of dark site</p>
                         <div class="d-flex justify-content-center">
                              <div onclick="window.history.go(-1)" class="btn btn-danger w-25">
                                   Go Back
                              </div>
                         </div>

                    </div>

               </div>
          </main>
          <?php include ('includes/footer.php'); ?>
          <!-- script for bootstra bundle -->
     	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
          <!-- script for darkmode & save in local the preference -->
          <script>
               const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
               const currentTheme = localStorage.getItem('theme');
               if (currentTheme) {
                    document.documentElement.setAttribute('data-theme', currentTheme);
                    if (currentTheme === 'dark') {
                         toggleSwitch.checked = true;
                         document.getElementById("pageStyle").setAttribute('href', "statics\\css\\bootstrap_darkly.min.css");
                    }
               }

               function switchTheme(e) {
                    if (e.target.checked) {
                         localStorage.setItem('theme', 'dark');
                         document.getElementById("pageStyle").setAttribute('href', "statics\\css\\bootstrap_darkly.min.css");
                    } else {
                         localStorage.setItem('theme', 'light');
                         document.getElementById("pageStyle").setAttribute('href', "statics\\css\\bootstrap_default.min.css");
                    }
               }
               toggleSwitch.addEventListener('change', switchTheme, false);
          </script>
     </body>
</html>