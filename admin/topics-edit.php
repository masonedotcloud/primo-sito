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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
          <title>alessandromasone.com</title>
          <style>
               main {
                    margin-left: 70px;
                    padding-top: 70px;
               }
          </style>
     </head>
     <body>
          <!-- view page user -->
          <?php include('includes/sidebar-admin.php'); ?>
          <main>
               <div class="container">
                    <div class="mb-5">
                         <a href="topics-index.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Manage Topics</a>
                    </div>
                    <?php include("formErrors.php"); ?>
                    <form action="topics-edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <div class="mb-5">
                            <label>Name</label>
                            <input type="text" class="form-control border text-primary" name="name" value="<?php echo $name; ?>" class="text-input">
                        </div>
                        <div class="mb-5">
                            <label>Description</label>
                            <textarea name="description" id="body"><?php echo $description; ?></textarea>
                        </div>

                        <div>
                            <button type="submit" name="update-topic" class="btn btn-warning">Update Topic</button>
                        </div>
                    </form>
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
<script>
 CKEDITOR.replace( 'body', {
  height: 800,
 });
</script>