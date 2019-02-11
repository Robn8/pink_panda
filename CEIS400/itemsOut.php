<head>
<style>

body {
  background-image: url("steal-background.jpg");
  background-size: 150%;

}

h1 {
	font-size: 40;
	font-family: Times New Roman;
	text-align: center;
	color: black;

}

.button {
  background-color: #4CAF50;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-family: Times New Roman;
  margin: 4px 2px;
  cursor: pointer;
  position: relative;
	left: 500;
	top: 50;

</style>
<style>
.center {
	text-align: center;
	border: 3px solid black;
}
</style>

</head>
<body>
<div class="center">
	<h1>Lower Warehouse Inventory</h1>
</div class>
</head>
<body>


</body>
</html>

.<?php
require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) die("Fatal Error");

	$query = "SELECT * FROM employee, item";
	$results = $conn->query($query);
	if(!['results']) die("Access Failed");

	$rows = $results->num_rows;


	for ($j = 0; $j < $rows; ++$j)
	{
		$row = $results->fetch_array(MYSQLI_NUM);

		$r0 = $row[0];
		$r1 = $row[1];
		$r2 = $row[2];
		$r3 = $row[3];
		$r4 = $row[4];
		$r5 = $row[5];

if($r0 > 2){

echo <<<hh
		<pre>
<b>Employee ID</b>			$r0
<b>Employee Name</b>		$r1
<b>Employee Class</b>          $r2
<b>Item ID</b>				$r3
<b>Item Name</b>			$r5
		</pre>
hh;
	}
	}
?>
