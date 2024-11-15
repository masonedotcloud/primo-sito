<?php


if(isset($_POST['change-avatar'])){

    $old_avatar = $_SESSION['avatar'];

     $image_name = time() . '_' . $_FILES['image']['name'];
     $destination = "../assets/images/profile/avatar/" . $image_name;
     $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

     $email = $_SESSION['email']; //getting this email using session
     $update_avatar = "UPDATE users SET avatar = '$image_name' WHERE email = '$email'";
     $run_query = mysqli_query($conn, $update_avatar);
     $_SESSION['avatar'] = $image_name;
     
     if ($old_avatar == "default.svg") {
         // code...
     }
     else {
         $status=unlink("../assets/images/profile/avatar/" . $old_avatar);    
     }
     header('Location: profile-info.php');
     exit();

}
?>