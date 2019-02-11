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
  background-color: gray;
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
	<h1>GB Warehouse Inventory</h1>
</div class>

<form action="upperWarehouse.php">
    <input type="submit" class=button value="Upper Warehouse Inventory" />
</form>
<form action="lowerWarehouse.php">
    <input type="submit" class=button value="Lower Warehouse Inventory" />
</form>
<form action="itemsOut.php">
    <input type="submit" class=button value="Checked Out Items" />
</form>
<form action="main.php">
    <input type="submit" class=button value="Return to Main Menu" />
</form>

</body>
</html>
