<div class="d-flex flex-column flex-shrink-0 bg-light position-fixed" style="width: auto; height: 100%; z-index:1;">
     <ul class="nav nav-pills nav-flush flex-column mb-auto text-center ">
          <li class="nav-item">
               <a href="../index.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/house-door.svg" alt="" width="24" height="24">
               </a>
          </li>
          <li class="nav-item">
               <a href="dashboard.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/speedometer2.svg" alt="" width="24" height="24">
               </a>
          </li>
          <li class="nav-item">
               <a href="profile-info.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/person-badge.svg" alt="" width="24" height="24">
               </a>
          </li>
          <li class="nav-item">
               <div class="dropdown border-bottom">
                    <a href="" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                         <img src="assets/images/site/file-post.svg" alt="mdo" width="24" height="24">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                         <li>
                              <a class="dropdown-item" href="posts-create.php">Add Post</a>
                         </li>
                         <li>
                              <a class="dropdown-item" href="posts-index.php">Manager post</a>
                         </li>
                    </ul>
               </div>
          </li>
          <li class="nav-item">
               <div class="dropdown border-bottom">
                    <a href="" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                         <img src="assets/images/site/tag.svg" alt="mdo" width="24" height="24">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                         <li>
                              <a class="dropdown-item" href="topics-create.php">Add Topics</a>
                         </li>
                         <li>
                              <a class="dropdown-item" href="topics-index.php">Manager Topics</a>
                         </li>
                    </ul>
               </div>
          </li>
          <li class="nav-item">
               <a href="users-index.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/people.svg" alt="" width="24" height="24">
               </a>
          </li>
          <li class="nav-item">
               <a data-bs-toggle="modal" data-bs-target="#help" href="help.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/question-square.svg" alt="" width="24" height="24">
               </a>
          </li>
          <li class="nav-item">
               <a href="logout.php" class="py-3 border-bottom d-flex justify-content-center">
                    <img src="assets/images/site/door-open.svg" alt="" width="24" height="24">
               </a>
          </li>
     </ul>
     <div class="dropdown border-top">
          <a href="" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
               <img src="assets/images/site/person-fill.svg" alt="mdo" width="24" height="24" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
               <li>
                    <a class="dropdown-item" href="posts-create.php">New post</a>
               </li>
               <li>
                    <div class="dropdown-item">
                         <div class="form-check form-switch">
                              <label class="custom-control-label theme-switch" for="checkbox">Dark Mode
                                   <input type="checkbox" class="form-check-input" id="checkbox">
                              </label>
                         </div>
                    </div>
               </li>
               <li>
                    <a class="dropdown-item" href="profile-info.php">Profile</a>
               </li>
               <li>
                    <hr class="dropdown-divider">
               </li>
               <li>
                    <a class="dropdown-item" href="logout.php">Logout</a>
               </li>
          </ul>
     </div>
</div>

<div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h3 class="modal-title" id="exampleModalLabel">Help</h3>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
          <h5>Go site <img src="assets/images/site/house-door.svg" alt="" width="auto" height="auto"></h5>
       <p>Si ritorna all'index dell'utente normale dove è appunto possibile visualizzare topics e post pubblicati.</p>
     </div>
     <div class="modal-body">
          <h5>Date <img src="assets/images/site/clock.svg" alt="" width="auto" height="auto"></h5>
       <p>Widget per visualizzare l'orario per non perdere mai di vista il tempo.</p>
     </div>
     <div class="modal-body">
          <h5>Profile Info <img src="assets/images/site/person-badge.svg" alt="" width="auto" height="auto"></h5>
       <p>É possobile visualizzare le info sul proprio profilo.</p>
     </div>
     <div class="modal-body">
          <h5>Post manager <img src="assets/images/site/file-post.svg" alt="" width="auto" height="auto"></h5>
       <p>É possibile visualizzare i post attuali, modificarli, eliminarli e decidere se pubblicarli.</p>
     </div>
     <div class="modal-body">
          <h5>Topics manager <img src="assets/images/site/tag.svg" alt="" width="auto" height="auto"></h5>
       <p>É possibile visualizzare i topics attuali, modificarli e eliminarli.</p>
     </div>
     <div class="modal-body">
          <h5>Users list <img src="assets/images/site/people.svg" alt="" width="auto" height="auto"></h5>
       <p>É possibile visualizzare la lista degli utenti e alcuni dettagli, con la possibilità di eliminarli</p>
     </div>
     <div class="modal-body">
          <h5>Logout <img src="assets/images/site/door-open.svg" alt="" width="auto" height="auto"></h5>
       <p>Effettuare l'uscita dall'account</p>
     </div>
     <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     </div>
   </div>
  </div>
</div>