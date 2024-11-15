<?php
     include "db.php";   //connection to database
         if (!empty($_SESSION['nome_azienda'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit(0);
    }
     if (isset($_GET['id'])) {
          $post = selectOne('posts', ['id' => $_GET['id']]);
     }
     $topics = selectAll('topics');
     $posts = selectAll('posts', ['published' => 1]);
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
                    margin-bottom: 200px;
               }
               #tornasu{
                    position: fixed;
                    bottom: 0px;
                    right: 0px;
                    display: none;
                    padding:10px;
                }
          </style>
     </head>
     <body>
         
     

             

          <!-- view page user -->
          <a id="inizio"></a>
          <?php include ('includes/header.php'); ?>
    
          <main>
               <div class="container">
                    <div class="mb-5">
                         <a href="index.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Home</a>
                    </div>
                    <h1><?php echo $post['title']; ?></h1>
                    <p><?php echo html_entity_decode($post['body']); ?></p>
               </div>
          </main>
          
          <?php include ('includes/footer.php'); ?>
                       <a href="#inizio" id="tornasu">

<img src= "assets/images/site/arrow-up-circle.svg" class="tornasu btn-warning rounded-circle p-1" width="50px" height="50px">

</a>
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
          <script>

     window.addEventListener ("scroll",function(){

     if (window.pageYOffset>300) {
     document.getElementById ("tornasu").style.display= "block";
     }

     else if (window.pageYOffset<300) {
     document.getElementById ("tornasu").style.display= "none";
     }

     val[0].innerHTML= "PageYOffset = "+window.pageYOffset
     },!1);

</script>
     </body>
</html>