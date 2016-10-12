<?php
require_once 'Connection.php';
	
$sql = "SELECT * from Admin";
$result = mysql_query($sql,$conn);								   
	if(isset($_POST['sub1']))
	{
		if(isset($_POST['userid']))
		{
			$userid = mysql_real_escape_string($_POST['userid'],$conn);		
                }
		
		if(isset($_POST['pass']))
		{
			$pass = mysql_real_escape_string($_POST['pass'],$conn);		
                        
                }
		
		while($db_field = mysql_fetch_assoc($result))					
		{
			if(($userid != "") && ($pass != ""))
			{
				if(($db_field['UserName'] == $userid) && ($db_field['Password'] == $pass))
				{
					session_start();
					$_SESSION['userid'] = $userid;						
					header("location:AfterLoginAdmin.php");					
                                        }
			}
			
		}
	}		
?>
<html>
<head>
<title> University Placement Platform</title>
</head>
<body background= "bf.jpg">
<img src = "uoh.jpg" height = "140" width = "140">
<h1 style="text-align:center ;font-size:250%">
<b> University Of Hyderabad (UoH)<br> Online Student Placement Platform </b>
</h1>
<br>

<h2> Login form </h2>
<form method = "POST" action = "">
USER ID....:
<input type = "text" name = "userid" value = "">
<br>
<br>
PASSWORD:
<input type = "password" name = "pass" value = "">
<br>
<br>
<input type = "submit" name = "sub1" value = "LOGIN">
<input type = "reset" name = "s2" value = "RESET">
<br>
								
</form>


</body>
</html>