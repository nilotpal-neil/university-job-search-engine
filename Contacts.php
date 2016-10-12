<?php
require_once 'Connection.php';
session_start();
if(isset($_POST['email']))
{
    echo $_SESSION['userid'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    
    $roll = $_SESSION['userid'];
    echo "$roll";
    $insert = "insert into Contacts values('$email','$adress','$phone','$roll')";
    if(!mysql_query($insert,$conn))
    {
        echo "Unable to insert into qualifications".  mysql_error();
    }
    header("location:AfterLogin.php");
}

?>
<html>
<head>
<title> Enter your contacts details</title>
</head>
<body background= "bf.jpg">
<img src = "uoh.jpg" height = "140" width = "140">
<h1 style="text-align:center ;font-size:250%">
<b> University Of Hyderabad (UoH)<br> Online Student Placement Platform </b>
</h1>
<br>

<h2> Enter your contacts details </h2>
<form method = "post" action = "Contacts.php" >

Email : <input name="email" type="email" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

Adress : <input name="adress" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

Phone : <input type="number" name="phone"  onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

<input type = "submit" name = "var1" value = "Submit">
<input type = "reset" name= "var2" value = "Reset">
<br>
</form>

</body>
</html>
