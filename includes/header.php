<header class="border-bottom fixed-top">
     <div class="container-fluid d-flex align-items-center justify-content-between pt-2 pb-2">
          <div class="d-flex justify-content-start">
               <!-- logo -->
               <a href="index.php">
                    <img class="me-2" src="assets\images\site/logo.png" width="40" height="40" alt="">
               </a>
               <!-- end logo -->
               <!-- seach bar -->
                    <form action="index.php" method="post" class="w-100">
                      <input type="text" name="search-term" class="form-control rounded-pill border" placeholder="Search...">
                    </form>
               <!-- end seach bar -->
          </div>
          <div class="d-flex justify-content-spacebetween">
               <!-- avatar button -->
               <div class="me-1 d-flex align-items-center">
                    <?php if (isset($_SESSION['id'])): ?>
                         <span class="me-3 d-none d-sm-block"><?php echo "Benvenuto, ", $_SESSION['name']; ?></span>
                    <?php else: ?>
                         <span class="me-3 d-none d-sm-block"><?php echo "Accedi"; ?></span>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['id'])): ?>
                         <?php if($_SESSION['admin'] == 1): ?>
                              <a href="admin/dashboard.php" class="text-decoration-none">
                         <?php else: ?>
                              <a href="profile.php" class="text-decoration-none">
                         <?php endif; ?>
                    <?php else: ?>
                         <a href="login.php" class="text-decoration-none">
                    <?php endif; ?>
                         <?php if (isset($_SESSION['id'])): ?>
                         <img src="assets/images/profile/avatar/<?php echo $_SESSION['avatar']; ?>" width="40" height="40" alt="" class="rounded-circle">
                    <?php else: ?>
                         <img src="assets/images/profile/avatar/default.svg" width="40" height="40" alt="" class="rounded-circle">
                    <?php endif; ?>
                    </a>
               </div>
               <!-- end avatar button -->
               <!-- dropdown menu -->
               <div class="dropdown">
                    <img src="assets/images/site/gear.svg" width="40" height="40" alt=""  data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="mt-3 dropdown-menu">
                         <li>
                              <?php if (isset($_SESSION['id'])): ?>
                                   <?php if($_SESSION['admin'] == 1): ?>
                                        <a class="dropdown-item" href="admin/dashboard.php">Dashboard</a>
                                   <?php else: ?>
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                   <?php endif; ?>
                              <?php else: ?>
                              <a class="dropdown-item" href="login.php">Login</a>
                              <?php endif; ?>
                         </li>
                         <!--
                         <li>
                              <hr class="dropdown-divider">
                         </li>
                         <li>
                              <a class="dropdown-item" href="#">Feedback</a>
                         </li>
                         -->
                         <li>
                              <hr class="dropdown-divider">
                         </li>
                         <li>
                              <span class="dropdown-item">
                                   <div class="form-check form-switch">
                                        <label class="custom-control-label theme-switch" for="checkbox">Dark Mode
                                             <input type="checkbox" class="form-check-input" id="checkbox">
                                        </label>
                                   </div>
                              </span>
                         </li>
                         <?php if (isset($_SESSION['id'])): ?>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li>
                                   <a class="dropdown-item" href="logout.php">Logout</a>
                              </li>
                         <?php endif; ?>
                    </ul>
               </div>
               <!-- end dropdown menu -->
          </div>
     </div>
</header>