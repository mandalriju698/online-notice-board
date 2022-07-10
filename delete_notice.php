<?php
session_start();
if (!($_SESSION['aemail'])) {
  header("location:form.php");
}
include("../inc/db.php");
$del=$_GET['del_id'];

$sel="SELECT * FROM notice WHERE notice_id='$del'";
$rs=$con->query($sel);
while ($row=$rs->fetch_assoc()) {
  unlink("notice_file/".$row['notice_file']);
  // code...
}


$delete="DELETE FROM notice WHERE notice_id='$del'";
$con->query($delete);
header('location:dashboard.php');
?>

