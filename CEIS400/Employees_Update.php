<?php

$employeeID = $_POST['Employee_ID'];

echo<<<_html
<html>
<style>
#rcorners1 {
  border-radius: 25px;
  background: white;
  padding: 20px;
  width: 200px;
  height: 100px;
}
.button {
  background-color: #f2f2f2;
  border: none;
  color: black;
  padding: 10px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.center{
text-align: center;
border: 3px solid black;
}
body {
 background-image: url("steal-background.jpg");
  background-size: 150%;
}
.p{
	font-size: 16px
	font-style: ariel
}

</style>

<title>Employee Mangament</title>
<body>
<div class="center">
<h1>Please enter new data to update the selected employee</h1>
</div>
</body>
</html>
_html;


echo<<<Update
	<form action ="Employees.php" id="updateSQL" method="post"><pre>
	<strong>Employee Name</strong>    <input type="text" name="Employee_Name" placeholder="Enter Name Here">
	<strong>Employee Class</strong>   <select name ="Employee_Class" method="post">
	<option value="Employee">Employee</option>
	<option value ="Manager">Manager</option>
	</select>
	<input type="hidden" name="Employee_ID" value="$employeeID">
	<input type="submit" class="button" name="update" value="UPDATE RECORD">
	</pre></form>
	<title>Update Employee Information</title>
Update;

?>
