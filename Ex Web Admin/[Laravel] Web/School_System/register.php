<?php
// Create connection to the database
$conn = mysqli_connect("localhost","root","","system_school");
//check for database connection error
if($conn->connect_errno >0)
{
    die("Unable to connection to dababase
    [".$conn->connect_error."]");
}else 
echo"";
$Error ='';
session_start();
if(isset($_POST["save"]))
{
    //variables declaration
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(trim($username)!=""and trim($password)!= "")
    {
        //Sanitizes whatever is entered
        $username=stripcslashes($username);
        $password=stripcslashes($password);
        $username=strip_tags($_POST["username"]);
        $password=strip_tags($_POST["password"]);
        
        $username= mysqli_real_escape_string($conn,$username);
        $password= mysqli_real_escape_string($conn,$password);
        //SQL Query
        $query = mysqli_query($conn,"SELECT * FROM `dashboard_admin` WHERE 
        username='$username' AND password ='$password'");
        //applay mysqli
        $numrows= mysqli_num_rows($query);
        if($numrows >0)
        {
            $_SESSION["username"]= $username;
            header("location: Dashboard.php");
        }
        else
        {
            $Error = '<div class="alert alert-danger text-center" role="alert">Wrong username/password</div>';
        }      
   }
}
?>
