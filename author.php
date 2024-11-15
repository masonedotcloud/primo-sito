<?php
     session_set_cookie_params('2147483647');     //20 anni
     include "db.php";   //connection to database
     //section for seach by usser input
         if (!empty($_SESSION['nome_azienda'])){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit(0);
    }
     $posts = array();
     if (isset($_GET["t_id"])) {
          $posts = getPostsByTopicId($_GET["t_id"]);
          $postsTitle = "You searched for posts under '" . $_GET["name"] . "'";
     } elseif (isset($_POST["search-term"])) {
          $postsTitle = "You searched for '" . $_POST["search-term"] . "'";
          $posts = searchPosts($_POST["search-term"]);
     } else {
          $posts = getPublishedPosts();
     }
     //table for connect the topics
     $table = "topics";
     $topics = selectAll($table);
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
                #footer {
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                }
          </style>
     </head>
     <body>
          <!-- view page user -->
     	<?php include ('includes/header.php'); ?>
     	<main>
               <div class="container">
                    <div class="mb-5">
                         <div class="row d-lg-flex flex-lg-row flex-column">
                              <div class="col d-flex justify-content-center align-items-center">
                                   <img class="rounded-circle" src="assets/images/site/author-2.png" alt="" style="width: 200px;">
                              </div>
                              <div class="col col-sm-9">
                                   <div class="card-body">
                                        <h5 class="card-title">Chi è Alessandro Masone</h5>
                                        <p class="card-text">Studente di informatica all'<a href="https://www.itilucarelli.edu.it/">istituto tecnico industriale "G.B. Bosco Lucarelli"</a>, nel 2020 scopre l'HTML e sviluppa un suo primo sito web <a href="https://alltimenowsite.altervista.org/">All Time Now</a>. Nell' estate del 2021 grazie alle sue iniziative decide di cimentarsi nella creazione del proprio sito web dinamico <a href="https://alessandromasone.com">alessandromasone.com</a>.<br>In tre parole: Ostinato, Determinato, Testardo.</p>
                                        <p class="card-text"><small class="text-muted">An idea is nothing without execution</small></p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mb-5">
                         <div class="row d-lg-flex flex-lg-row flex-column-reverse">
                              <div class="col col-sm-9">
                                   <div class="card-body">
                                        <h5 class="card-title">Perchè</h5>
                                        <p class="card-text">Non sempre si può dare un perchè ma non è questo il caso. Andare alla scoperta di esperienze ecco cosa lo ha spinto alla creazione di un sito web. Entrare in un nuovo mondo, uscire dall'ambiente pieno di comodi e affrontare una situazione diversa. E perchè forse preferisce scrivere codici che giocare.</p>
                                        <p class="card-text"><small class="text-muted">Avverbio, congiunzione e sostantivo maschile</small></p>
                                   </div>
                              </div>
                              <div class="col d-flex justify-content-center align-items-center">
                                   <img class="rounded-circle" src="assets/images/site/author-3.png" alt="" style="width: 200px;">
                              </div>
                         </div>
                    </div>
                    <div class="mb-5">
                         <div class="row">
                              <div class="col d-flex justify-content-center align-items-center">
                                   <img class="rounded-circle" src="assets/images/site/author-1.png" alt="" style="width: 200px;">
                              </div>
                              <div class="col col-sm-9">
                                   <div class="card-body">
                                        <h5 class="card-title mb-3">Social</h5>
                                        <div class="card-text">
                                             <p class=" pb-2 border-bottom mb-2 d-flex justify-content-start"><img src="assets/images/site/instagram.svg" alt="mdo" width="24" height="24" style="margin-right: 20px;"><a class="text-decoration-none" href="https://www.instagram.com/alessandro.masone/">alessandro.masone</a></p>
                                             <p class=" pb-2 border-bottom mb-2 d-flex justify-content-start"><img src="assets/images/site/facebook.svg" alt="mdo" width="24" height="24" style="margin-right: 20px;"><a class="text-decoration-none" href="https://www.facebook.com/MasoneAlessandro/">MasoneAlessandro</a></p>
                                             <p class=" pb-2 border-bottom mb-2 d-flex justify-content-start"><img src="assets/images/site/google.svg" alt="mdo" width="24" height="24" style="margin-right: 20px;"><a class="text-decoration-none" href="mailto:masonealessandro04@gmail.com">masonealessandro04@gmail.com</a></p>
                                             <p class=" pb-2 border-bottom mb-2 d-flex justify-content-start"><img src="assets/images/site/twitter.svg" alt="mdo" width="24" height="24" style="margin-right: 20px;"><a class="text-decoration-none" href="https://twitter.com/ale_masone">@ale_masone</a></p>
                                             <p class="d-flex justify-content-start"><img src="assets/images/site/discord.svg" alt="mdo" width="24" height="24" style="margin-right: 20px;"><a class="text-decoration-none" href="https://discord.com/">Alessandro #0002</a></p>
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