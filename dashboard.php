<?php
      session_start();
      include_once('lib/header.php')
?>

<title>Home Page</title>

    <h1>Welcome to Your Dashboard!</h1>
    <?php 
        session_write_close();
        require_once('dashaction.php');
        require_once('lib/connection.php');
    ?>
    <?php
        if(isset($_SESSION['message'])){
            echo $_SESSION ['message'];
            unset($_SESSION['message']);
        }
    ?>
    <div class = 'container'>
    <?php
        $userID = $_SESSION['userid'];
            
        $sql = "SELECT * FROM dashcourse WHERE user_id = '$userID'";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $res = $stmt -> get_result();
    ?>
    <div class = 'row justify-content-center'>
        <table class = 'table'> 
            <thead>
                <tr>
                    <th>Track</th>
                    <th>Course</th>
                    <th colspan = '2'>Action</th>
                </tr>
            </thead> 

    <?php while($row = $res -> fetch_assoc()): ?>

            <tr>
                <td><?php echo $row['track']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td>
                    <a href = 'dashboard.php?edit=<?php echo $row['id']; ?>'
                       class = 'btn btn-info'> Edit</a>
                    <a href = 'dashaction.php?delete=<?php echo $row['id']; ?>'
                       class = 'btn btn-danger'> Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
    </div>

<?php
if(isset($_GET['edit']) || isset($_GET['delete'])){
    $id = $_GET['edit'];
}
?>
    <div class = 'row justify-content-center'>
    <form method = "POST" action = "dashaction.php">
    <?php
        if(isset($_GET['edit']) || isset($_GET['delete'])):?>
            <input type = 'hidden' name = 'id' value = '<?php echo $id; ?>' >
        <?php endif;?>
        <div class = 'form-group'>
        <label>Track</label><br/>
        <input 
        <?php
            if(isset($_SESSION['track'])){
                echo "value=" .$_SESSION['track'];
            }
        ?>
        type = "text" class = 'form-control' name = "track" value = '<?php echo $track; ?>' placeholder = "Track Name" required/>
        </div>
        <div class = 'form-group'>
        <label>Course</label><br/>
        <input
        <?php
            if(isset($_SESSION['course'])){
                echo "value=" .$_SESSION['course'];
            }
        ?> 
        type = "text" class = 'form-control' name = "course" value = '<?php echo $course; ?>' placeholder = "Course Name" required/>
        </div>
        <div class = 'form-group'>
        <?php 
            if($update == true):
        ?>
                <button type = "submit" class = 'btn btn-info' name = "update"> UPDATE </button>
        <?php
            else:
        ?>
                <button type = "submit" class = 'btn btn-primary' name = "save"> SAVE </button>
        <?php endif ?>
        </div>
        </div>

    </form>         
</body>
<?php
include_once('lib/footer2.php');
?>