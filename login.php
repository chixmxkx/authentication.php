<?php include_once('lib/header.php')?>

<title>Signin Page</title>

    <?php require_once('loginaction.php');
        if(isset($_SESSION['user_id'])){
            header('Location: dashboard.php');
        }
    ?>

    <div class = 'row justify-content-center'>
    <form method = "POST" action = "loginaction.php" >
        
        <?php
          if(isset($_SESSION['logerr'])){
             echo $_SESSION ['logerr'];
          session_unset();
          }
     
          if(isset($_SESSION['logerror'])){
             echo $_SESSION ['logerror'];
          session_unset();
          }
        ?>
        <div class = 'form-group'>
        <label>Email Address</label><br/>
        <input
        <?php
            if(isset($_SESSION['email_address'])){
                echo "value=" .$_SESSION['email_address'];
            }
        ?> 
        type = "email" class = 'form-control' name= "email_address" placeholder = "Email Address" required/>
        </div>
        <div class = 'form-group'>
        <label>Password</label><br/>
        <input
        <?php
            if(isset($_SESSION['password'])){
                echo "value=" .$_SESSION['password'];
            }
        ?> 
        type = "password" class = 'form-control' name= "password" placeholder = "Password" required/>
        </div>
        <div class = 'form-group'>
        <button type = "submit" class = 'btn btn-primary' name = "submit"> SIGNIN </button>
        </div>

    </form>         
</body>
<?php include_once('lib/footer1.php') ?>