<?php
 
session_start();
 
if(!isset($_SESSION['luser']))
 
{
 
    echo "<p align='center'>Please Login again ";
 
    echo "<a href='index.php'>Click Here to Login</a></p>";
 
}
 
else
 
{
 
    $now = time();
 // checking the time now when home page starts
 
    if($now > $_SESSION['expire'])
 
    {
 
        session_destroy();
 
        echo "<p align='center'>Your session has expire ! <a href='index.php'>Login Here</a></p>";
 
    }
 
    else
 
    {
 //starting this else one [else1]
 
?>
 
 
 
<html>
 
<head>
 
	<title>Destroy Session after 1 minutes </title>
 
</head>
 
<body>
 
<p>
 
		Welcome <?php echo $_SESSION['luser']; ?> 
 
        <span style="float:right"><a href='logout.php'>LogOut</a></span>
 
  <p style="padding-top:20px;background:#CCCCCC; height:400px; text-align:center">
 
  	<span style="color:red;text-align:center">Your Session Will destroy after 1 minutes You will  
redirected on next page</span>
 
  <br/><br/>
 
  <span>if you want to logout before 1 minuts click on logout link </span>
 
  </p>   
 
</p>
 
<?php
 
 }
 
}
 
?>
 
</body>
 
</html>