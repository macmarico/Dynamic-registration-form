<?php

$dbhost = "fdb26.awardspace.net"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "3390921_mac"; // the name of the database that you are going to use for this project
$dbuser = "3390921_mac"; // the username that you created, or were given, to access your database
$dbpass = "bi0hazard"; // the password that you created, or were given, to access your database

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysqli_select_db($conn,$dbname) or die("MySQL Error: " . mysql_error());






$username = $_POST['username'];

$password = md5($_POST['password']);

$myObj = new stdClass();


if(!empty($_POST['username']) && !empty($_POST['password']))
{

   
 $checklogin = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
    
       $myObj->name = $username;
       
        $myObj->status = true;
       
      
       $myJSON = json_encode($myObj);

       echo $myJSON;
 
 
 }else{


   $checkUser = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."'");
     
    if(mysqli_num_rows($checkUser) == 1){
    
        
        $myObj->name = $username;
        $myObj->status = "wrong password";
        $myJSON = json_encode($myObj);
         echo $myJSON;
    
    }else{
    
        $myObj->password = "ss";
        $myObj->status = "username available";
        $myJSON = json_encode($myObj);
        echo $myJSON;  }
       
       }


}

?>