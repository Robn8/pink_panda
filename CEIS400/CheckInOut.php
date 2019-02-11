<html>
<style>
body{
	background-image: url(steal-background.jpg);
	background-size: 150% ;
}
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #black;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
	width: 40%;
margin-left: 30%;
margin-right: 30%
}

.button:hover {background-color: yellow}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

<style>
.center {
  text-align: center;
  border: 3px solid black;
}
</style>

<body>
<div class="center">
	<h1>
	Select your name and the tool you would Like to check out.
	</h1>
</div>

<?php


require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

if(isset($_POST['select']) && isset($_POST['Employee_ID']) && isset($_POST['Item_ID']))
{
	$EmployeeID = $_POST['Employee_ID'];
	$ItemID = $_POST['Item_ID'];
	$query = "UPDATE item SET Item_Employee_ID = '$EmployeeID' WHERE Item_ID = $ItemID";
	$result = $conn->query($query);


	if($result) echo "Item checked out";
	if(!$result) echo "CHECK OUT failed<br>";


}

$queryEmployee = $conn->query("SELECT * FROM Employee");
$queryItem = $conn->query("SELECT * FROM Item");

while($arrayEmployee[]=$queryEmployee->fetch_object());
while($arrayItem[]=$queryItem->fetch_object());

array_pop($arrayEmployee);
array_pop($arrayItem);

?>
<div class="center">
<form action "CheckInOut.php" id="select" method="post"><pre>
<h2>
Select Employee or Warehouse checking out/in item:
</h2>
<select name="Employee_ID" method="post">

<?php foreach ($arrayEmployee as $option) : ?>
	<option value="<?php echo $option->Employee_ID ?>"><?php echo $option->Employee_Name; ?></option>
<?php endforeach; ?>
</select>
<h2>
Select tool to be checked out/in:
</h2>
<select name="Item_ID" method="post">
<?php foreach ($arrayItem as $option) : ?>
	<option value="<?php echo $option->Item_ID ?>"><?php echo $option->Item_Name; ?></option>
<?php endforeach; ?>
</select>
</div>

<br></br>
<input type="submit" name="select" button class="button" value="Check Out Item" >
</pre> </form>
<br></br>
<a href="main.php"><input type="submit" name="select" button class="button" value="Return to Main">
</pre></form>

</body>
</html>
