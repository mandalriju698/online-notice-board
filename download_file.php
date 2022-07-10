<?php
 session_start();
 include("../inc/db.php");

if(isset($_GET['file_id']))
{
   $id=$_GET['file_id'];
   $sel="SELECT *FROM notice WHERE notice_id=$id ";
   $result=mysqli_query($con,$sel);
   $file=mysqli_fetch_assoc($result);
   $filepath='../admin/notice_file/'.$file['notice_file'];
   if(file_exists($filepath))
   {
      header('Content-Type:application/octet-stream');
      header('Content-Description:File Transfer');
      header('Content-Disposition:attachment;filename= '.basename($filepath));
      header('Expires:0');
      header('Cache-Control: must-revalidate');
      header('Pragma:public');
      header('Content-Length;'.filesize($filepath));
      readfile('../admin/notice_file/'.$file['notice_file']);
      
   }
}


	

 
?>