<?php
     include "../db.php";     //connection to database
     require_once "middleware.php";     //for check session admin
     adminOnly();
?>
<!-- start html file -->
<!doctype html>
<html lang="en">
     <!-- Head section -->
     <head>
          <meta charset="utf-8">
          <link rel="shortcut icon" href="../assets/images/site/favicon.ico" type="image/x-icon">  
          <meta name=viewport content="width=device-width, initial-scale=1">
          <link id="pageStyle" rel="stylesheet" href="statics\css\bootstrap_default.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <title>alessandromasone.com</title>
          <style>
               main {
                    margin-left: 70px;
                    padding-top: 0px;
               }
          </style>
     </head>
     <body>
          <!-- view page user -->
          <?php include('includes/sidebar-admin.php'); ?>
          <main>
          	<div class="container">
                    <div class="row">
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="../index.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/house-door.svg" alt="" width="24" height="24">
                                   <h3>Go Site</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <div class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/clock.svg" alt="" width="24" height="24">
                                   <h4><div class="digital-clock text-center"></div></h4>
                              </div>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="profile-info.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/person-badge.svg" alt="" width="24" height="24">
                                   <h3>Profile Info</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="posts-index.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/file-post.svg" alt="mdo" width="24" height="24">
                                   <h3>Post Manager</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="topics-index.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/tag.svg" alt="mdo" width="24" height="24">
                                   <h3>Topics Manager</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="users-index.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/people.svg" alt="" width="24" height="24">
                                   <h3>Users List</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a data-bs-toggle="modal" data-bs-target="#help" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/question-square.svg" alt="" width="24" height="24">
                                   <h3>Help</h3>
                              </a>
                         </div>
                         <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center pt-3">
                              <a href="logout.php" class="d-flex justify-content-center align-items-center btn btn-light flex-column" style="height: 260px; width: 100%; border-radius:25px;">
                                   <img src="assets/images/site/door-open.svg" alt="" width="24" height="24">
                                   <h3>Logout</h3>
                              </a>
                         </div>
                    </div>
               </div>
          </main>
          <!-- end view page user -->
          <!-- script for see date -->
          <script type="module" src="statics\js\clock.js"></script>
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