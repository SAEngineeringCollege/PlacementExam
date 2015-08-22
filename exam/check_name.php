<?php

 require_once 'config.php';

 if(!empty($_POST['register_number'])  && !empty($_POST['name']) && !empty($_POST['department']) ){
     $register_number=$_POST['register_number'];
     $name=$_POST['name'];
     $department=$_POST['department'];
     $res=mysqli_query( $con, "select * from exam_attendee where id='$uid' and status=1") or die(mysql_error());
     $count=mysqli_fetch_array($res);
     if($count[0]==0){
         echo 'false';
     }else{
         echo 'true';
     }
 }
?>
