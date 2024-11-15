<?php
     include("controller-users.php");
     adminOnly();
?>
<!-- start html file -->
<!DOCTYPE html>
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
                    padding-top: 70px;
               }
               .pr-12 {
                   padding-right: 12px !important;
               }
               .mb-20 {
                   margin-bottom: 20px !important;
               }
               .b-1 {
                   border: 1px solid #ebebeb !important;
               }
               .card {
                   border: 0;
                   border-radius: 0;
                   margin-bottom: 30px;
                   -webkit-transition: .5s;
                   transition: .5s;
               }
               .card {
                   position: relative;
                   display: -ms-flexbox;
                   display: flex;
                   -ms-flex-direction: column;
                   flex-direction: column;
                   min-width: 0;
                   word-wrap: break-word;
                   background-clip: border-box;
                   border: 1px solid rgba(0,0,0,.125);
                   border-radius: .25rem;
               }
               .media {
                   padding: 16px 12px;
                   -webkit-transition: background-color .2s linear;
                   transition: background-color .2s linear;
               }
               .media {
                   display: -ms-flexbox;
                   display: flex;
                   -ms-flex-align: start;
                   align-items: flex-start;
               }
               .card-body {
                   -ms-flex: 1 1 auto;
                   flex: 1 1 auto;
                   padding: 1.25rem;
               }
               .media .avatar {
                   flex-shrink: 0;
               }
               .no-radius {
                   border-radius: 0 !important;
               }
               .avatar-xl {
                   width: 64px;
                   height: 64px;
                   line-height: 64px;
                   font-size: 1.25rem;
               }
               .avatar {
                   position: relative;
                   display: inline-block;
                   width: 36px;
                   height: 36px;
                   line-height: 36px;
                   text-align: center;
                   border-radius: 100%;
                   background-color: #f5f6f7;
                   color: #8b95a5;
                   text-transform: uppercase;
               }
               img {
                   max-width: 100%;
               }
               img {
                   vertical-align: middle;
                   border-style: none;
               }
               .mb-2 {
                   margin-bottom: .5rem!important;
               }
               .fs-20 {
                   font-size: 20px !important;
               }
               .pr-16 {
                   padding-right: 16px !important;
               }
               .ls-1 {
                   letter-spacing: 1px !important;
               }
               .fw-300 {
                   font-weight: 300 !important;
               }
               .fs-16 {
                   font-size: 16px !important;
               }
               .media-body>* {
                   margin-bottom: 0;
               }
               small, time, .small {
                   font-family: Roboto,sans-serif;
                   font-weight: 400;
                   font-size: 11px;
                   color: #8b95a5;
               }
               .fs-14 {
                   font-size: 14px !important;
               }
               .mb-12 {
                   margin-bottom: 12px !important;
               }
               .text-fade {
                   color: rgba(77,82,89,0.7) !important;
               }
               .card-footer:last-child {
                   border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
               }
               .card-footer {
                   background-color: #fcfdfe;
                   border-top: 1px solid rgba(77,82,89,0.07);
                   color: #8b95a5;
                   padding: 10px 20px;
               }
               .flexbox {
                   display: -webkit-box;
                   display: flex;
                   -webkit-box-pack: justify;
                   justify-content: space-between;
               }
               .align-items-center {
                   -ms-flex-align: center!important;
                   align-items: center!important;
               }
               .card-footer {
                   padding: .75rem 1.25rem;
                   background-color: rgba(0,0,0,.03);
                   border-top: 1px solid rgba(0,0,0,.125);
               }
               .card-footer {
                   background-color: #fcfdfe;
                   border-top: 1px solid rgba(77, 82, 89, 0.07);
                   color: #8b95a5;
                   padding: 10px 20px
               }
               .card-footer>*:last-child {
                   margin-bottom: 0
               }
               .hover-shadow {
                   -webkit-box-shadow: 0 0 35px rgba(0, 0, 0, 0.11);
                   box-shadow: 0 0 35px rgba(0, 0, 0, 0.11)
               }
               .fs-10 {
                   font-size: 10px !important;
               }
          </style>
     </head>
     <body>
          <!-- view page user -->
          <?php include('includes/sidebar-admin.php'); ?>
          <main>
               <div class="container">
                    <?php foreach ($admin_users as $key => $user): ?>
                         <div class="card b-1 hover-shadow mb-20 bg-light">
                              <div class="media card-body d-flex flex-column">
                                   <div class="media-left pr-12">
                                       <img src="../assets/images/profile/avatar/<?php echo $user['avatar']; ?>" alt="Admin" class="bi bi-person-square avatar avatar-xl rounded-circle">
                                   </div>
                                   <div class="media-body">
                                        <div class="mb-2">
                                             <span class="fs-20 pr-16"><?php echo $user['name']; ?></span>
                                        </div>
                                        <strong>ID:</strong><?php echo " ", $user['id']; ?>
                                        <br>
                                        <small class="fs-16 fw-300 ls-1 text-primary"><?php echo "email: ", $user['email']; ?></small>
                                   </div>
                              </div>
                              <footer class="card-footer flexbox align-items-center bg-dark">
                                   <div>
                                        <strong>Option</strong>
                                        <span></span>
                                   </div>
                                   <div class="card-hover-show">
                                        <div class="btn">
                                             <div class="form-check form-switch">
                                             </div>
                                        </div>
                                        <?php if (isset($user['admin']) && $user['admin'] == 1): ?>
                                             <button class="btn btn-xs fs-10 btn-bold btn-success">Admin</button>
                                        <?php endif; ?>
                                        <a href="<?php echo "mailto: ", $user['email']; ?>" class="btn btn-xs fs-10 btn-bold btn-primary" data-toggle="modal" data-target="#modal-contact">Contact</a>
                                        <?php if ($_SESSION['id'] != $user['id']): ?>
                                             <div class="btn btn-xs fs-10 btn-bold btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $user['id']; ?>">Delete</div>

                                             <div class="modal fade" id="exampleModal_<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                   </div>
                                                   <div class="modal-body">
                                                     Are you sure to eliminate <b><?php echo $user['name'] ?></b>?
                                                   </div>
                                                   <div class="modal-footer">
                                                        <a href="users-index.php?delete_id=<?php echo $user['id']; ?>" class="text-decoration-none"><button type="button" class="btn btn-danger">Delete</button></a>
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                                        <?php endif; ?>
                                   </div>
                              </footer>
                         </div>
                    <?php endforeach; ?>
               </div>
          </main>
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