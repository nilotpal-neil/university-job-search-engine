<?php
session_start();
require_once 'Connection.php';
if(isset($_POST['var1']))
{
    echo $_SESSION['userid'];
    $highsc = $_POST['highsc'];
    $boardsc = $_POST['boardsc'];
    $scmarks = $_POST['scmarks'];
    $scperc = $_POST['scperc'];
    $grad = $_POST['grad'];
    $graduni = $_POST['graduni'];
    $gradmarks = $_POST['gradmarks'];
    $gradperc = $_POST['gradperc'];
    $pg = $_POST['pg'];
    $pguni = $_POST['pguni'];
    $pgmarks = $_POST['pgmarks'];
    $cgpa = $_POST['cgpa'];
    $roll = $_SESSION['userid'];
    echo "$roll";
    
    $insert = "insert into Qualifications values('$highsc','$boardsc','$scmarks','$scperc','$grad','$graduni','$gradmarks','$gradperc','$pg','$pguni','$pgmarks','$cgpa
        ','$roll')";
    if(!mysql_query($insert,$conn))
    {
        echo "Enable to insert into qualifications".  mysql_error();
    }
    header("location:Contacts.php");
}
?>
<html>
<head>
<title> Enter your Qualification</title>
</head>
<body background= "bf.jpg">

<h1 style="text-align:center ;font-size:250%"><br>
<b> University Of Hyderabad (UoH)<br> Online Student Placement Platform </b>
</h1>
<br>

<h2> Enter your Qualification </h2>
<form method = "post" action = "Qualifications.php" >
High School : <input name="highsc" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
Board School : <input name="boardsc" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
School Marks : <input name="scmarks" type="number" step="0.01" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
School percentage : <input name="scperc" type="number" step="0.01" min="0" max="100" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />%
<br>
<br>
Graduation : <input name="grad" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
G.University : <input name="graduni" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
G.Marks : <input name="gradmarks" type="number" step="0.01" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
G.Percentage : <input name="gradperc" type="number" step="0.01" min="0" max="100" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />%
<br>
<br>
Post Graduate : <input name="pg" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
PG.University : <input name="pguni" type="text" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
PG.Marks : <input name="pgmarks" type="number" step="0.01" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>
CGPA : <input name="cgpa" type="number" min="0" max="10" step="0.01" onkeypress="return submitOnEnter(event, 'CreateForm:continue')" />
<br>
<br>

<br>
<br>

<input type = "submit" name = "var1" value = "Submit">
<input type = "reset" name= "var2" value = "Reset">
<br>
</form>

</body>
</html>

