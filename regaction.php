<?php session_start();

if(isset($_POST['submit'])){

    require_once('lib/connection.php');
    
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $password = sha1($_POST['password']);

    if(empty($full_name) || empty($email_address) || empty($password)){
        header('Location: register.php');
        die();
    }
    else{
        $sql = 'SELECT * FROM userdata WHERE email_address = ?';
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param('s', $email_address);
        $stmt -> execute();
        $res = $stmt -> get_result();
        if($res -> num_rows == 1){
            header('Location: register.php');
            $_SESSION["regerror"] = "Registration Failed. User already exist";
            die();
        }  
        else{
            $sql2 = 'INSERT INTO userdata (full_name, email_address, password) VALUES (?, ?, ?)';
            $stmt2 = $conn -> prepare($sql2);
            $stmt2 -> bind_param('sss', $full_name, $email_address, $password);
            $stmt2 -> execute();
            $res2 = $stmt2 -> get_result();
            if($res2 -> num_rows == 0){
                header('Location: register.php');
                $_SESSION["regmeg"] = "Registration Successful! You can now signin";
                die();
            }
        }
   }
}
?>