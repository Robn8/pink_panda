<?php
require_once 'login.php'; //login.php stores host name, user name, password, database name
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");

echo<<<_html
<html>
<style>
#rcorners1 {
  border-radius: 25px;
  background: white;
  padding: 10px;
  width: 200px;
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
<h1>Employee managment - create, modify or delete employees here</h1>
</div>
</body>
</html>
_html;

if(isset($_POST['Pass_Ordered_ID'])){
$Ordered_ID = $_POST['Pass_Ordered_ID'];


if(isset($_POST['delete']) && isset($_POST['Item_ID']))
{
	$Item_ID = $_POST['Item_ID'];
	$query = "DELETE FROM item WHERE Item_ID= '$Item_ID'";
	$result = $conn->query($query);
	if(!$result) echo "DELETE failed<br>";
	else echo "DELETE SUCCESSFUL FOR '$Item_ID'";
}

if(isset($_POST['Add_Item']) && isset($_POST['Item_Name']))
	{
		$Item_Name = $_POST['Item_Name'];
		$query = "INSERT INTO item(Item_Employee_ID, Item_Name) VALUES (NULL, '$Item_Name')";
		$result = $conn->query($query);
		$retriveItemID = $conn->insert_id;

		$queryOrderHasItem = "INSERT INTO ordered_has_item(Ordered_Ordered_ID, Item_Item_ID) VALUES ('$Ordered_ID', '$retriveItemID')";
		$resultI = $conn->query($queryOrderHasItem);

		if(!$result) echo "INSERT failed<br>";
		else if(!$resultI) echo "Linking failed<br>";
		else echo "INSERT SUCCESSFUL FOR '$Item_Name'";

	}

echo <<<_END
<form action ="Orders_Add_Items.php" method="post"><pre>
Item Name <input type="text" name="Item_Name">
<input type="hidden" name="Pass_Ordered_ID" value='$Ordered_ID'>
<input type="submit" class="button" name="Add_Item" value="ADD ">
</pre></form>
_END;

	$query = "SELECT * FROM item
 JOIN ordered_has_item on ordered_has_item.Item_Item_ID = item.Item_ID
 JOIN ordered on ordered_has_item.Ordered_Ordered_ID = ordered.Ordered_ID
 WHERE ordered.Ordered_ID = '$Ordered_ID'";


	$resultItem = $conn->query($query);
	if(!['result']) die("Access Failed");

	$rows = $resultItem->num_rows;

	for ($j = 0; $j < $rows; ++$j)
	{
		$row = $resultItem->fetch_array(MYSQLI_NUM);

		$r0 = $row[0]; //item_ID
		$r1 = $row[1]; //Item_Employee_ID
		$r2 = $row[2]; //Item_Name
		$r3 = $row[3]; //Ordered_Ordered_ID
		$r4 = $row[4]; //Item_Item_ID
		$r5 = $row[5]; //Ordered_ID
		$r6 = $row[6]; //Ordered_Employee_ID
		$r7 = $row[7]; //Date_Ordered
		$r8 = $row[8]; //Date_Received


echo <<<hh
		<pre>
		<p id="rcorners1">
<strong>Item ID</strong>     $r0
<strong>Item Name</strong>   $r2
	</p>

		</pre>
		<form action ="Orders_Add_Items.php" method="post">

		<input type="hidden" name="Item_ID" value="$r0">
		<input type="hidden" name="Pass_Ordered_ID" value="$Ordered_ID">
		<input type="submit" class="button" name="delete" value="DELETE ITEM"></form>
hh;
	}
}
?>



<html><a href="Orders.php"><input type="submit" value="Return to Orders Menu"></a></html>
<title>Add Items to Order</title>

<?php
$resultItem->close();
$conn->close();

?>
