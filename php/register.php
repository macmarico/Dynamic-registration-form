<?php

$dbhost = "fdb26.awardspace.net"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "3390921_mac"; // the name of the database that you are going to use for this project
$dbuser = "3390921_mac"; // the username that you created, or were given, to access your database
$dbpass = "bi0hazard"; // the password that you created, or were given, to access your database

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysqli_select_db($conn,$dbname) or die("MySQL Error: " . mysql_error());






$username = $_POST['username'];
$email = $_POST['email'];

$password = md5($_POST['password']);

$myObj = new stdClass();


if(!empty($_POST['username']) && !empty($_POST['password']))
{
 
 $checkUsername = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."'");
     
    if(mysqli_num_rows($checkUsername) == 1)
    {
       $myObj->name = $username;
       $myObj->status = "username is not available";
       $myJSON = json_encode($myObj);
       echo $myJSON;
 
 }else{

     $registerquery = mysqli_query($conn,"INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
      
     if($registerquery)
        {
     
        $myObj->name = $username;
        $myObj->status = true;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    
    }else{
    
        $myObj->password = "ss";
        $myObj->status = "something went wrong";
        $myJSON = json_encode($myObj);
        echo $myJSON;  
        }
       
       }


}

?>