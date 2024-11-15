<?php if(count($errors) > 0): ?>
     <div class="alert alert-danger d-block">
          <?php foreach ($errors as $error): ?>
               <?php echo $error; ?>
          <?php endforeach; ?>
     </div>
<?php endif; ?>
