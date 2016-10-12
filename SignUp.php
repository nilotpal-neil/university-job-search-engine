<?php
require_once 'Connection.php';
if(isset($_POST['var1']))
{
    $fname = $_POST['firstName'];
    $mname = $_POST['middleName'];
    $roll = $_POST['roll'];
    $lname = $_POST['lastName'];
    $bday = $_POST['bday'];
    $phpdate = strtotime($bday);
    $mysqldate = date('Y-m-d',$phpdate);
    $gender = $_POST['gender'];
    $passwd = $_POST['password'];
    $conpass = $_POST['confirmPassword'];
    echo "$roll";
    if($_POST['password'] != $_POST['confirmPassword'])
    {
        die("Passwords are not matching");
    }
    $sql = "select * from Student";
    $result = mysql_query($sql, $conn);
    while($row =  mysql_fetch_array($result))
    {
        if($row['RollNo'] == $roll)
        {
            die ("User already exist");
        }
    }
    $insertSt = "insert into Student values('$roll','$fname','$mname','$lname','$gender','$mysqldate')";
    $insertAu = "insert into Authetication values('$roll','$passwd')";
    if(!mysql_query($insertSt,$conn) || !mysql_query($insertAu,$conn)) 
    {
            echo "enable to insert data ";
    }
    else
    {
        session_start();
        $_SESSION['userid']=$roll;
        header("location:Qualifications.php");
    }
}

?>
<html>
<head>
<title> University Placement Platform</title>
</head>

<body background= "bf.jpg">

    <h1 style="text-align:center ;font-size:250%"><br>
<b> University Of Hyderabad (UoH)<br> Online Student Placement Platform </b>
</h1>

<h2> Sign Up </h2>
<form method = "post" action = "SignUp.php" >

RollNo : <input type="text" name="roll">
<br>
<br>

FirstName : <input name="firstName" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

MiddleName : <input name="middleName" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

LastName : <input name="lastName" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

Birthday: <input type="text" name="bday" placeholder="m/d/y" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

Gender :
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male<br>
<br>
<br>

Password :<input name="password" type="password" onkeypress="return submitOnEnter(event, 'CreateForm:continue')"/>
<br>
<br>

Confirm Password : <input name="confirmPassword" type="password" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

<input type = "submit" name = "var1" value = "Submit">
<input type = "reset" name= "var2" value = "Reset">
<br>
</form>

</body>
</html>
