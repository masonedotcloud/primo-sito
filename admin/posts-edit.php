<?php
     include("controller-posts.php");
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
                         <a href="posts-create.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Add Post</a>
                         <a href="posts-index.php" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Manage Posts</a>
                    </div>
                    <?php include("formErrors.php"); ?>
                    <form action="posts-edit.php" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?php echo $id ?>">
                         <div class="form-row">
                              <div class="col">
                                   <div class="mb-5">
                                        <label>Title</label>
                                        <input type="text"  name="title" class="form-control border text-primary" value="<?php echo $title ?>" class="text-input">
                                   </div>
                                   <div class="mb-5">
                                        <label>Body</label>
                                        <textarea name="body" id="body" class="form-control ckeditor"><?php echo $body ?></textarea>
                                   </div>
                                   <div class="mb-5">
                                        <label>Cover Immage</label>
                                        <div class="form-group border p-3">
                                             <input type="file" name="image" class="form-control-file" class="text-input">
                                        </div>
                                   </div>
                                   <div class="mb-5">
                                        <label>Topic</label>
                                        <select name="topic_id" class="form-select border text-primary">
                                             <option value=""></option>
                                             <?php foreach ($topics as $key => $topic): ?>
                                                  <?php if (!empty($topic_id) && $topic_id == $topic['id'] ): ?>
                                                       <option selected value="<?php echo $topic['id'] ?>">
                                                            <?php echo $topic['name'] ?>
                                                       </option>
                                                  <?php else: ?>
                                                       <option value="<?php echo $topic['id'] ?>">
                                                            <?php echo $topic['name'] ?>
                                                       </option>
                                                  <?php endif; ?>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="mb-5">
                                        <?php if (empty($published) && $published == 0): ?>
                                             <label>
                                                  <div class="form-check form-switch">
                                                       <input class="form-check-input" type="checkbox" name="published">
                                                       <label class="form-check-label" for="flexSwitchCheckDefault">Publish</label>
                                                  </div>
                                             </label>
                                        <?php else: ?>
                                             <label>
                                                  <div class="form-check form-switch">
                                                       <input class="form-check-input" type="checkbox" name="published" checked>
                                                       <label class="form-check-label" for="flexSwitchCheckDefault">Publish</label>
                                                  </div>
                                             </label>
                                        <?php endif; ?>
                                   </div>
                                   <div class="mb-5">
                                        <button type="submit" name="update-post" class="btn btn-warning">Update post</button>
                                   </div>
                              </div>
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
  filebrowserUploadUrl: "upload.php"
 });
</script>
