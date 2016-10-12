<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'Connection.php';
if(isset($_POST['jobid']) && isset($_POST['companyname']) && isset($_POST['jobtitle']) && isset($_POST['location']) && isset($_POST['criteria']) && isset($_POST['timing']))
{
    
    $jobid=$_POST['jobid'];
    $companyname=$_POST['companyname'];
    $jobtitle=$_POST['jobtitle'];
    $location=$_POST['location'];
    $criteria=$_POST['criteria'];
    $timing=$_POST['timing'];
    $insert = "insert into job values('$jobid','$companyname','$jobtitle','$location','$criteria','$timing')";
    if(!mysql_query($insert,$conn))
        echo "Error in Insert";
}
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta nameport" content="width=device-width, initial-scale=1.0">
    </head>
    <body background= "bf.jpg">
        <img src = "uoh.jpg" height = "140" width = "140">
        <h1 style="text-align:center ;font-size:250%">
        <b> University Of Hyderabad (UoH)<br> Online Student Placement Platform </b>
        </h1>
        <h2>Post new job</h2>
        <form action="PostJob.php" method="post">
            Job Id : <input type="text" name="jobid"><br/><br/>
            Company Name : <input type="text" name="companyname"><br/><br/>
            Job Title : <input type="text" name="jobtitle"><br/><br/>
            Location : <input type="text" name="location"><br/><br/>
            Criteria : <input type="text" name="criteria"><br/><br/>
            Timing : <input type="text" name="timing"><br/><br/>
            <input type='submit' value='Submit'>
            <input type='reset' value='Reset'>
        </form>
        <a href='Logout.php'><h3>Logout</h3></a>
        
 

    </body>
</html>
