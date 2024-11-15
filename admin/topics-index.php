<?php
     include("controller-topics.php");
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
               .edit {
               	color: green !important;
               }
               .delete {
               	color: red !important;
               }
               .edit,
               .delete {
               	text-decoration: none;
               }
               .edit:hover,
               .delete:hover {
               	text-decoration: underline;
               }
          </style>
     </head>
     <body>
          <!-- view page user -->
          <?php include('includes/sidebar-admin.php'); ?>
          <main>
               <div class="container">
                    <div class="mb-5">
                         <a href="topics-create.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Add Topic</a>
                    </div>
                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Name</th>
                                   <th scope="col">Action</th>
                                   <th scope="col"></th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($topics as $key => $topic): ?>
                                   <tr>
                                        <th class="pb-3" scope="row"><?php echo $key + 1; ?></td>
                                        <td class="pb-3"><?php echo $topic['name']; ?></td>
                                        <td class="pb-3"><a href="topics-edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                                        <td class="pb-3" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $topic['id']; ?>"><a class="delete">delete</a></td>
                                        <div class="modal fade" id="exampleModal_<?php echo $topic['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure to eliminate <?php echo $topic['name']; ?>?
                                              </div>
                                              <div class="modal-footer">
                                                  <a href="topics-index.php?del_id=<?php echo $topic['id']; ?>" class="text-decoration-none"><button type="button" class="btn btn-danger">Delete</button></a>
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                         </div>
                                        </div>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
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
