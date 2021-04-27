<?php session_start();

if(isset($_POST['submit'])){

    require_once('lib/connection.php');
    
    $email_address = $_POST['email_address'];
    $password = sha1($_POST['password']);

    $_SESSION['email_address'] =  $email_address;

    if(empty($email_address) || empty($password)){
        header('Location: login.php');
        die();
    }
    else{
        $sql = 'SELECT * FROM userdata WHERE email_address = ?';
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param('s', $email_address);
        $stmt -> execute();
        $res = $stmt -> get_result();
        if($res -> num_rows == 1){
            $sql2 = 'SELECT * FROM userdata WHERE email_address = ?';
            $stmt2 = $conn -> prepare($sql2);
            $stmt2 -> bind_param('s', $email_address);
            $stmt2 -> execute();
            $res2 = $stmt2 -> get_result();
            if($row = $res2 -> fetch_assoc()){
                if($password == $row['password']){
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['username'] = $row['full_name'];
                    $_SESSION['email'] = $row['email_address'];
                    header('Location: dashboard.php');
                }
                else{        
                    header('Location: login.php');
                    $_SESSION["logerror"] = "Password Incorrect";
                }
            }
        }
        else{        
            header('Location: login.php');
            $_SESSION["logerr"] = "User does not exist";
        }
    }
}

?>