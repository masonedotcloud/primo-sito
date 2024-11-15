<?php



   
     

     include "db.php";   //connection to database
     require_once "middleware.php";
         if (!empty($_SESSION['nome_azienda'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit(0);
    }
usersOnly();
     include "upload-avatar.php";
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
          <style>
               main {
                    margin-top: 75px;
                    margin-bottom: 75px;
               }
                #footer {
                    position: absolute;
                    width: 100%;
                }
                .btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
          </style>
     </head>
     <body>
          <!-- view page user -->
          <?php include ('includes/header.php'); ?>
          <main>
               <div class="container">
                    <div class="mb-5">
                         <a href="index.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Home</a>
                    </div>
                    <div class="row gutters-sm">
                         <div class="col-md-4 mb-3">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            
                                             <img src="assets/images/profile/avatar/<?php echo $_SESSION['avatar']; ?>" alt="Admin" width="150" height="150" class="rounded-circle" style="border-radius:25px;">
                                             <form action="profile.php" method="post" enctype="multipart/form-data" class="mt-3">
                                                 <span class="btn btn-primary btn-file ">
                                                    Select Avatar
                                                    <input type="file" name="image" class=" btn btn-primary">
                                                 </span>
                                                 <button type="submit" name="change-avatar" class="btn btn-warning">Update</button>
                                            </form>
                                             <div class="mt-3">
                                                  <h4><?php echo $_SESSION['name']; ?></h4>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-md-8">
                              <div class="card mb-3">
                                   <div class="card-body">
                                        <!-- id account -->
                                        <div class="row">
                                             <div class="col-sm-3">
                                                  <h6 class="mb-0">ID</h6>
                                             </div>
                                             <div class="col-sm-9">
                                                  <?php echo $_SESSION['id']; ?>
                                             </div>
                                        </div>
                                        <hr>
                                        <!-- name account -->
                                        <div class="row">
                                             <div class="col-sm-3">
                                                  <h6 class="mb-0">Name</h6>
                                             </div>
                                             <div class="col-sm-9">
                                                  <?php echo $_SESSION['name']; ?>
                                             </div>
                                        </div>
                                        <hr>
                                        <!-- email account -->
                                        <div class="row">
                                             <div class="col-sm-3">
                                                  <h6 class="mb-0">Email</h6>
                                             </div>
                                             <div class="col-sm-9">
                                                  <?php echo $_SESSION['email']; ?>
                                             </div>
                                        </div>
                                        <hr>
                                        <!-- status account -->
                                        <div class="row">
                                             <div class="col-sm-3">
                                                  <h6 class="mb-0">Status</h6>
                                             </div>
                                             <div class="col-sm-9">
                                                  <?php echo $_SESSION['status']; ?>
                                             </div>
                                        </div>
                                        <hr>
                                        <!-- admin status account -->
                                        <div class="row">
                                             <div class="col-sm-3">
                                                  <h6 class="mb-0">Admin</h6>
                                             </div>
                                             <div class="col-sm-9">
                                                  <?php if ($_SESSION['admin'] == 1): ?>
                                                       <?php echo "YES"; ?>
                                                  <?php else: ?>
                                                       <?php echo "NO"; ?>
                                                  <?php endif; ?>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
                
          </main>
          <?php include ('includes/footer.php'); ?>
         
          <!-- end view page user -->
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