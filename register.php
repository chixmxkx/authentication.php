<?php 
    include_once('lib/header.php');
    include_once('regaction.php');
?>

    <div class = 'row justify-content-center'>
    <form method = "POST" action = "" >
        
      <?php
          if(isset($_SESSION['regerror'])){
             echo $_SESSION ['regerror'];
          session_unset();
          }
          if(isset($_SESSION['regmeg'])){
             echo $_SESSION ['regmeg'];
         session_unset();
         }  
      ?>
        <div class = 'form-group'>
        <label>Full Name</label><br/>
        <input 
        <?php
            if(isset($_SESSION['full_name'])){
                echo "value=" .$_SESSION['full_name'];
            }
        ?>
        type = "text" class = 'form-control' name = "full_name" placeholder = "Full Name" required/>
        </div>
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
        <button type = "submit" class = 'btn btn-primary' name = "submit"> SIGNUP </button>
        </div>

    </form>         
</body>
<?php include_once('lib/footer1.php') ?>