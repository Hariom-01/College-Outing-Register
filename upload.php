<?php
session_start();
include "db_conn.php";

$sql = "SELECT * FROM leaves WHERE student_id='$_SESSION[id]' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$leaves = [];
$id=$_SESSION['id'];
if (isset($_SESSION['id']) && isset($_SESSION['registration'])) {

?>
<?php 
if(isset($_POST['submit'])){
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./image/documents/" . $filename; 
    
    $update_f="UPDATE LEAVES SET DOCU='$filename' WHERE student_id='$id' ";
    $result=mysqli_query($conn,$update_f);
    if($result){
        move_uploaded_file($tempname, $folder);
    }
}
}
?>
<form method="POST">
<input type="file" name="image">
<input type="submit" value="upload" name="submit">
</form>