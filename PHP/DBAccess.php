<?php 
  class DBAccess{
      function initConnection(){
         $connection=@mysql_connect("localhost", "user", "passwd") or die ("Server Error " . mysql_error());
         $database=mysql_select_db("medicalforum",$connection) or die ("Database Error " . mysql_error());
         return $connection; 
      }      
  }  
?>