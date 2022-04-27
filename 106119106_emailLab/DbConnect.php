<?php
    $servername='localhost';
    $username='root';
    $password='123456';
    $dbname = "emailVerify";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect to MySql :' .mysql_error());
        }
?>