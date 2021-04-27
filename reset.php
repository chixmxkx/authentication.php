<?php include_once('lib/header.php')?>

<title>Password Reset Page</title>

    <?php require_once('resetaction.php') ?>
    <div class = 'row justify-content-center'>
    <form method = "POST" action = "resetaction.php" >
        
        <?php
          if(isset($_SESSION['resetmeg'])){
              echo $_SESSION ['resetmeg'];
                unset($_SESSION ['resetmeg']);
          }

          if(isset($_SESSION['reseterr'])){
              echo $_SESSION ['reseterr'];
              unset($_SESSION ['reseterr']);

          }
     
          if(isset($_SESSION['reseterror'])){
              echo $_SESSION ['reseterror'];
              unset($_SESSION ['reseterror']);

          }
        ?>
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
        <label>New Password</label><br/>
        <input
        <?php
            if(isset($_SESSION['new_password'])){
                echo "value=" .$_SESSION['new_password'];
            }
        ?> 
        type = "password" class = 'form-control' name= "new_password" placeholder = "New Password" required/>
        </div>
        <div class = 'form-group'>
        <label>Confirm Password</label><br/>
        <input
        <?php
            if(isset($_SESSION['confirm_password'])){
                echo "value=" .$_SESSION['confirm_password'];
            }
        ?> 
        type = "password" class = 'form-control' name= "confirm_password" placeholder = "Confirm Password" required/>
        </div>
        <div class = 'form-group'>
        <button type = "submit" class = 'btn btn-primary' name = "submit"> RESET PASSWORD </button>
        </div>

    </form>         
</body>
<?php include_once('lib/footer2.php') ?>