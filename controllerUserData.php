<?php

include("db.php");



$table = 'users';

$email = "";
$name = "";
$admin = "";
$errors = array();
$avatar = "";


function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['code'] = $user['code'];
    $_SESSION['status'] = $user['status'];
    $_SESSION['avatar'] = $user['avatar'];
    return;
}

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $admin = "0";
        $avatar = "default.svg";
        $insert_data = "INSERT INTO users (name, email, password, code, status, admin, avatar)
                        values('$name', '$email', '$encpass', '$code', '$status', '$admin', '$avatar')";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            //$subject = "Email Verification Code";
            //$message = "Your verification code is $code";


            // Dati dell'email da inviare
            $data = array(
                'senderEmail' => 'alessandro@masone.cloud',
                'receiverEmail' => $email,
                'subject' => "Email Verification Code",
                'body' => "Your verification code is $code",
            );

            // URL dell'API per inviare l'email
            $apiUrl = 'https://dev.masone.cloud/mail/api.php';

            // Inizializza cURL
            $ch = curl_init($apiUrl);

            // Ignora HTTPS
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // Imposta l'opzione per inviare una richiesta POST
            curl_setopt($ch, CURLOPT_POST, 1);

            // Imposta i dati della richiesta POST
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

            // Imposta gli header personalizzati, se presenti
            if (!empty($headers)) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array_map(function ($key, $value) {
                    return "$key: $value";
                }, array_keys($headers), $headers));
            }

            // Imposta l'opzione per ricevere la risposta come stringa
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Esegui la richiesta cURL e ottieni la risposta
            $response = curl_exec($ch);

            // Verifica se ci sono errori cURL
            if (curl_errno($ch)) {
                echo 'Errore cURL: ' . curl_error($ch);
            }

            // Chiudi la sessione cURL
            curl_close($ch);

            // Decodifica la risposta JSON
            $result = json_decode($response, true);

            //return $result['success'];



            if($result['success']){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: login.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }


    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $user = selectOne($table, ['email' => $_POST['email']]);
                  loginUser($user);
                  header('location: index.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }



    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                //$subject = "Password Reset Code";
                //$message = "Your password reset code is $code";
                //$sender = "From: verify-email@alessandromasone.com";


                // Dati dell'email da inviare
                $data = array(
                    'senderEmail' => 'alessandro@masone.cloud',
                    'receiverEmail' => $email,
                    'subject' => "Password Reset Code",
                    'body' => "Your password reset code is $code",
                );

                // URL dell'API per inviare l'email
                $apiUrl = 'https://dev.masone.cloud/mail/api.php';

                // Inizializza cURL
                $ch = curl_init($apiUrl);

                // Ignora HTTPS
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                // Imposta l'opzione per inviare una richiesta POST
                curl_setopt($ch, CURLOPT_POST, 1);

                // Imposta i dati della richiesta POST
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

                // Imposta gli header personalizzati, se presenti
                if (!empty($headers)) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array_map(function ($key, $value) {
                        return "$key: $value";
                    }, array_keys($headers), $headers));
                }

                // Imposta l'opzione per ricevere la risposta come stringa
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Esegui la richiesta cURL e ottieni la risposta
                $response = curl_exec($ch);

                // Verifica se ci sono errori cURL
                if (curl_errno($ch)) {
                    echo 'Errore cURL: ' . curl_error($ch);
                }

                // Chiudi la sessione cURL
                curl_close($ch);

                // Decodifica la risposta JSON
                $result = json_decode($response, true);

                //return $result['success'];



                if($result['success']){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login.php');
    }
?>