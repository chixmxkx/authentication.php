<?php session_start();
require_once('lib/connection.php');

$update = false;
$track = '';
$course = '';
   
if(isset($_POST['save'])){
    $userID = $_SESSION['userid'];
    $track = $_POST['track'];
    $course = $_POST['course'];
    
    $sql = "INSERT INTO dashcourse (track, course, user_id) VALUES ('$track', '$course', '$userID')";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $res = $stmt -> get_result();
    header('Location: dashboard.php');
    $_SESSION['message'] = 'Record has been saved!';
    $_SESSION['msg_type'] = 'Success';
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM dashcourse WHERE id = '$id'";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    header('Location: dashboard.php');
    $_SESSION['message'] = 'Record has been deleted!';
    $_SESSION['msg_type'] = 'Danger';
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $sql = "SELECT * FROM dashcourse WHERE id = '$id'";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $res = $stmt -> get_result();
    if($res -> num_rows == 1){
        $row = $res -> fetch_assoc();
        $track = $row['track'];
        $course = $row['course'];
    }
}

if(isset($_POST['update'])){
    $id2 = $_POST['id'];
    $track2 = $_POST['track'];
    $course2 = $_POST['course'];
    
    $sql2 = "UPDATE dashcourse SET track = ?, course = ? WHERE id = ?";
    $stmt2 = $conn -> prepare($sql2);
    $stmt2 -> bind_param('ssi', $track2, $course2, $id2);
    $stmt2 -> execute();
    header('Location: dashboard.php');
    $_SESSION['message'] = 'Record has been updated!';
    $_SESSION['msg_type'] = 'Warning';
}
?>