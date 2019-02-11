<?php
require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

echo<<<_html
<html>
<style>
body {
  background-image: url("steal-background.jpg");
  background-size: 150%;
}
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

.p{
	font-size: 16px
	font-style: ariel
}

</style>

<title>Employee Mangament</title>
<body>
<div class="center">
<h1>Employee managment - create, modify or delete employees here</h1>
</div>
</body>
</html>
_html;


if(isset($_POST['delete']) && isset($_POST['Employee_ID']))
{
	$Employee_ID = get_post($conn, 'Employee_ID');
	$query = "DELETE FROM employee WHERE Employee_ID= '$Employee_ID'";
	$result = $conn->query($query);
	if(!$result) echo "DELETE failed<br>";
}

if(isset($_POST['update']) && isset($_POST['Employee_ID']) && isset($_POST['Employee_Class']))
{
	$Employee_ID = $_POST['Employee_ID'];
	$Employee_Name = $_POST['Employee_Name'];
	$Employee_Class = $_POST['Employee_Class'];
	$query = "UPDATE Employee SET Employee_Name = '$Employee_Name', Employee_Class = '$Employee_Class' WHERE Employee_ID = $Employee_ID";
	$result = $conn->query($query);


	if(!$result) echo "UPDATE failed<br>";
}

if(isset($_POST['input']) && isset($_POST['Employee_Name'])  && isset($_POST['Employee_Class'])) //if there is an Employee_ID and an Employee_Name (_POST array of Employee column)
	{
		$Employee_Name = get_post($conn, 'Employee_Name');
		$Employee_Class = get_post($conn, 'Employee_Class');
		$query = "INSERT INTO Employee VALUES" . "(DEFAULT, '$Employee_Name', '$Employee_Class')"; //default allows for auto increment

		$result = $conn->query($query);
		if(!$result) echo "INSERT failed<br>";

	}

//isset is used to see if the variable is set

echo <<<_END
<form action ="Employees.php" id="inputsql" method="post"><pre>
<strong>Employee Name</strong>   <input type="text" name="Employee_Name" placeholder="Enter Name Here">
<strong>Employee Class</strong>  <select name ="Employee_Class" method="post">
<option value="Employee">Employee</option>
<option value ="Manager">Manager</option>
</select>
<input type="submit" class="button" name ="input" value="ADD RECORD">
</pre></form>

_END;
//echo is output to screen
//<pre> allows for whitespace to be set


	$query = "SELECT * FROM employee";
	$result = $conn->query($query);
	if(!['result']) die("Access Failed");

	$rows = $result->num_rows;

	for ($j = 0; $j < $rows; ++$j)
	{
		$row = $result->fetch_array(MYSQLI_NUM);

		$r0 = $row[0];
		$r1 = $row[1];
		$r2 = $row[2];
if($r0 > 2){
echo <<<hh
		<pre>
		<p id="rcorners1">
<strong>Employee ID</strong>     $r0
<strong>Employee Name</strong>   $r1
<strong>Employee Class</strong>  $r2
		</p></pre>

		<form action ="Employees.php" method="post">
		<input type="hidden" name="Employee_ID" value="$r0">
		<input type="submit" class="button" name="delete" value="DELETE RECORD"></form>
		<form action = "Employees_Update.php" method ="post">
		<input type="hidden" name="Employee_ID" value="$r0">
		<input type="submit" class="button" name="update" value="UPDATE RECORD"></form>
hh;
}
	//when using _END there can be no whitespace in the left margin or it will not register and you will get parse error
	}
echo<<<_return
	<a href="main.php"><input type="submit" value="Return to Main Menu"</a><br><br>
_return;

	$result->close();
	$conn->close();

	function get_post($conn, $var)
	{
		return $conn->real_escape_string($_POST[$var]);
	}

 ?>
