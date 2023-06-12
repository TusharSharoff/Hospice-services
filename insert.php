<?php
$name=$_POST["name"]; 
$age=$_POST["age"]; 
$gender=$_POST["gender"]; 
$doa=$_POST["doa"]; 
$phone=$_POST["phone"];
$mysql = mysqli_connect("localhost", "root") 
or die("Can't connect to DB"); 
mysqli_select_db($mysql, "hospice") 
or die("Can't select DB"); 
mysqli_query($mysql, "insert into p_data values('$name',' 
$age',' $gender','$phone', '$doa')") 
or die("Query failed to insert"); 
$result = mysqli_query($mysql,"select * from p_data"); 
?>

<html>
<head><title>PHP and MYSQL</title></head>
<body bgcolor="aabbcc">
<h3>Patient Details</h3>
<table border="1">
<tr>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Phone no.</th>
<th>Date of appointment</th>

</tr>
<?php

while($array=mysqli_fetch_row($result)): 
echo
"<tr>
<td>$array[0]</td>
<td>$array[1]</td>
<td>$array[2]</td>
<td>$array[3]</td>
<td>$array[4]</td>
</tr>"; 
endwhile; 
?>
<?php
mysqli_free_result($result);
mysqli_close($mysql);
?>
</table>
</body>
</html>