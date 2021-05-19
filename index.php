<?php

session_start();

if(@$_POST['submit1'])

{

	$u = $_POST['text1'];

	$p = $_POST['pwd'];

	if($u =="ajay.suneja@25gmail.com" && $p=="123")

	{

	$_SESSION['luser'] = $u;

	$_SESSION['start'] = time();

	 // taking now logged in time
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; 

	// ending a session in 1  minutes from the starting time
	header('Location: HomePage.php');

	}

	else

	{

	$err= "<font color='red'>Invalid user login </font>";

	}

}

?>

<html>

<head>

	<title>Destroy Session after 1 minutes - </title>

</head>

<body>

<form name="form1" method="post">

<table align="center">

	<tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</tr>	

	<tr>

		<td>Username </td>

		<td><input type="email" name="text1"  placeholder="Enter Email" required>

		</td>

	</tr>

	<tr>

		<td>Password</td>

		<td><input type="password" name="pwd" placeholder="Enter Password" required></td>

	</tr>

	<tr>

		<td colspan="2"  align="center">

		<input type="submit" value="SignIn" name="submit1">

		</td>

	</tr>

</table>

</form>

</body>

</html>