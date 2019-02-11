<?php
require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

if(isset($_POST['Create_Order']) && isset($_POST['Ordered_Employee_ID'])) //if there is an Item_ID and an Item_Name (_POST array of Item column)
	{
		$Ordered_Employee_ID = $_POST['Ordered_Employee_ID'];
		$query = "INSERT INTO ordered VALUES" . "(DEFAULT, '$Ordered_Employee_ID', null, null)";
		$result = $conn->query($query);
		if(!$result) echo "INSERT failed for emloyee: $Ordered_Employee_ID<br>";

	}

if(isset($_POST['delete']) && isset($_POST['Ordered_ID']))
{
	$Ordered_ID = get_post($conn, 'Ordered_ID');

	$query = "DELETE FROM ordered WHERE Ordered_ID= $Ordered_ID";
	$result = $conn->query($query);
	if(!$result) echo "DELETE failed for Order number: $Ordered_ID<br>";

}

$queryEmployee = $conn->query("SELECT * FROM Employee");

while($arrayEmployee[]=$queryEmployee->fetch_object());

array_pop($arrayEmployee);

?>

<html>
<style>
#rcorners1 {
  border-radius: 25px;
  background: white;
  padding: 20px;
  width: 500px;
  height: 50px;
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
<h1>Ordered Managment - create, modify or delete orders here</h1>
</div>
</body>
</html>


<title>Ordered Mangament</title>


<form action ="Orders.php" id="Create_Order" method="post"><pre>
<select name="Ordered_Employee_ID" method="post">
<?php foreach ($arrayEmployee as $option) : ?>
	<option value="<?php echo $option->Employee_ID ?>"><?php echo $option->Employee_Name; ?></option>
<?php endforeach; ?>
</select>
<input type="submit" class="button" name="Create_Order" value="CREATE ORDER">
</pre></form>


	<?php $queryOrdered = "SELECT * FROM ordered"; ?>
	<?php $resultOrderd = $conn->query($queryOrdered); ?>

	<?php if(!['resultOrderd']) die("Access Failed"); ?>

	<?php $rows = $resultOrderd->num_rows; ?>



	<?php for ($j = 0; $j < $rows; ++$j){ ?>
		<?php $row = $resultOrderd->fetch_array(MYSQLI_NUM);?>

		<?php $queryEmployee = "SELECT Employee_Name FROM employee WHERE Employee_ID = '$row[1]'"; ?>
		<?php $resultEmployee = $conn->query($queryEmployee); ?>
		<?php $rows = $resultEmployee->fetch_array(MYSQLI_NUM);?>

		<?php $r0 = $row[0]; ?>
		<?php $r1 = $rows[0]; ?>
		<?php $r2 = $row[2]; ?>
		<?php $r3 = $row[3]; ?>
		<?php if($r0>0){ ?>
		<pre>
		<p id="rcorners1">
<strong>Ordered ID</strong>      <?php echo $r0?>
	<strong>Employee Name</strong>   <?php echo $r1?>
		</p>
		</pre>
		<form action ="Orders.php" method="post">
		<input type="hidden" name="Ordered_ID" value="<?php echo $r0 ?>">
		<input type="submit" class="button" name="delete" value="DELETE ORDER"></form>

		<form action = "Orders_Add_Items.php" method ="post">
		<input type="hidden" name="Pass_Ordered_ID" value="<?php echo $r0 ?>">
		<input type="submit" class="button" name="update" value="ADD ITEMS"></form>
		<?php } ?>
<?php } ?>

	<html><a href="main.php"><input type="submit" value="Return to Main Menu"></a></html>


<?php $conn->close();?>

<?php function get_post($conn, $var)
	{
		return $conn->real_escape_string($_POST[$var]);
	}
?>
