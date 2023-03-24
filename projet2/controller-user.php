<?php 
session_start();
require "dbh.php";
$email = "";
$name = "";
$errors = array();




    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        $res=mysqli_fetch_assoc($run_sql);
        if(mysqli_num_rows($run_sql) > 0){
           
                    
                    $_SESSION['email'] = $email;
                    $_SESSION['id']=$res['id'];
                    $id=$res['id'];
                    $info="Tapez votre ancien mot de passe .";
                    $_SESSION['info']=$info;
                    header('location: reset-code.php?id='.$id.'');
                    exit();
                }else{
                   $errors['email'] = "Cette adresse mail n'existe pas!";
                }
            
        }
    

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $id=$_SESSION['id'];
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        //$check_code = "SELECT * FROM firstpsw WHERE password = '$otp_code' and id='$_SESSION['id']'";
        $check_code="select * from firstpsw where password ='$otp_code' and id='$id'";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Priere de bien créer un mot de passe sécurisé.";
            $_SESSION['info'] = $info;
            header('location: new-password.php?id='.$id.'');
            exit();
        }else{
            $errors['otp-error'] = "Mot de passe incorrecte!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $id=$_SESSION['id'];
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Vous devez tapé le même mot de passe!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
             $update_pass = "UPDATE users SET password = '$password' WHERE id =$id";
             $update_other = "UPDATE firstpsw SET password = '$password' WHERE id =$id";
             $res=mysqli_query($conn,$update_other);
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Votre mot de passe a été changé avec succès.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header("Location: login.php");
    }
?>