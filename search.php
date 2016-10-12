
<?php
$search='';
 
require_once 'Connection.php';

//search variable = data in search box or url
if(isset($_GET['search']))
{
$search = $_GET['search'];
}

//trim whitespace from variable

$search = trim($search);
$search = preg_replace('/\s+/', ' ', $search);

//seperate multiple keywords into array space delimited
$keywords = explode(" ", $search);

//Clean empty arrays so they don't get every row as result
$keywords = array_diff($keywords, array(""));

//Set the MySQL query
if ($search == NULL or $search == '%'){
} else {
for ($i=0; $i<count($keywords); $i++) {
$query = "SELECT * FROM Job " .
"WHERE CompanyName LIKE '%".$keywords[$i]."%'".
" OR JobTitle LIKE '%".$keywords[$i]."%'" .
" OR Location LIKE '%".$keywords[$i]."%'" .
" ORDER BY CompanyName";
}

//Store the results in a variable or die if query fails
$result = mysql_query($query,$conn) or die(mysql_error());
}
if ($search == NULL or $search == '%'){
} else {
//Count the rows retrived
$count = mysql_num_rows($result);
}

echo "<html>";
echo "<head>";
echo "<title>Your Title Here</title>";
echo "</head>";
echo "<body onLoad=\"self.focus();document.searchform.search.focus()\">";
echo "<center>";
echo "<br /><form name=\"searchform\" method=\"GET\" action=\"search.php\">";
echo "<input type=\"text\" name=\"search\" size=\"20\" TABINDEX=\"1\" />";
echo " <input type=\"submit\" value=\"Search\" />";
echo "</form>";
//If search variable is null do nothing, else print it.
if ($search == NULL) {
} else {
echo "You searched for <b><FONT COLOR=\"blue\">";
foreach($keywords as $value) {
   print "$value ";
}
echo "</font></b>";
}
echo "<p> </p><br />";
echo "</center>";

//If users doesn't enter anything into search box tell them to.
if ($search == NULL){
echo "<center><b><FONT COLOR=\"red\">Please enter a search parameter to continue.</font></b><br /></center>";
} elseif ($search == '%'){
echo "<center><b><FONT COLOR=\"red\">Please enter a search parameter to continue.</font></b><br /></center>";
//If no results are returned print it
} elseif ($count <= 0){
echo "<center><b><FONT COLOR=\"red\">Your query returned no results from the database.</font></b><br /></center>";
//ELSE print the data in a table
} else {
//Colors for alternation of row color on results table
$color1 = "#d5d5d5";
$color2 = "#e5e5e5";
//While there are rows, print it.
while($row = mysql_fetch_array($result))
{
//Row color alternates for each row
$row_count=0;

$row_color = ($row_count % 2) ? $color1 : $color2;
//table background color = row_color variable
echo "<center><table bgcolor=".$row_color.">";
echo "<tr>";
echo "<td>".$row['JobId']."</td>";
echo "<td>".$row['CompanyName']."</td>";
echo "<td>".$row['JobTitle']."</td>";
echo "<td>".$row['Location']."</td>";
echo "<td>".$row['Criteria']."</td>";
echo "<td>".$row['Timing']."</td>";
echo "</tr>";
echo "</table></center>";
$row_count++;
//end while
}
//end if
}

echo "</body>";
echo "</html>";
if ($search == NULL or $search == '%') {
} else {
//clear memory
mysql_free_result($result);
}
?>