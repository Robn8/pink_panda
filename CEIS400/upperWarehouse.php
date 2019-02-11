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
	<h1>Upper Warehouse Inventory</h1>
</div class>
</head>
<body>


</body>
</html>

<?php
require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) die("Fatal Error");

	$query = "SELECT * FROM item";
	$result = $conn->query($query);
	if(!['result']) die("Access Failed");

	$rows = $result->num_rows;


	for ($j = 0; $j < $rows; ++$j)
	{
		$row = $result->fetch_array(MYSQLI_NUM);

		$r0 = $row[0];
		$r1 = $row[1];
		$r2 = $row[2];

	if($r1 == 1)
	{
echo <<<hh
		<pre>
<b>Item ID</b>		$r0
<b>Item Name</b>	$r2

		</pre>
hh;
	}
	}
?>
