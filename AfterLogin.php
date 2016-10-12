<?php
session_start();
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

<h2>Welcome </h2>
<?php
echo $_SESSION['userid'];
?>
<br><br>

<a href='search.php'>Click Here to Search for Jobs</a><br>
<a href='Logout.php'>Click Here to Logout</a>
</body>
</html>