<?php session_start();

if(isset($_POST['submit'])){

    require_once('lib/connection.php');
    
    $password = sha1($_POST['password']);
    $new_password = sha1($_POST['new_password']);
    $confirm_password = sha1($_POST['confirm_password']);

    if(empty($password) || empty($new_password) || empty($confirm_password)){
        header('location:reset.php');
        die();
    }
    else{
        if(isset($_SESSION['email_address'])){

            $email_address = $_SESSION['email_address'];

            $sql = "SELECT * FROM userdata WHERE email_address = '$email_address'";
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $res = $stmt -> get_result();
            if($row = $res -> fetch_assoc()){
                if($password == $row['password']){
                    if($new_password == $confirm_password){
                        $sql2 = "UPDATE userdata SET password = '$new_password' WHERE email_address = '$email_address'";
                        $stmt2 = $conn -> prepare($sql2);
                        $stmt2 -> execute();
                        header("Location: reset.php");
                        $_SESSION['resetmeg'] = "Password Reset Successful!";
                        die();
                    }
                    else{
                        header("Location: reset.php");
                        $_SESSION['reseterr'] = "Passwords do not match";
                        die();
                    }
                }
                else{        
                    header('Location: reset.php');
                    $_SESSION["reseterror"] = "Password Incorrect. Try again";
                    die();
                }
            }
        }else{
            echo "no email";
        }
    }
}

?>