
<html>
<head>
<style>
body {
  background-image: url("steal-background.jpg");
  background-size: 150%;

}

h1 {
  color: white;
  font-size: 90;
  font-family: cursive;
  text-align: center;
}

p {
  font-family: cursive;
  font-size: 20px;
  text-align: center;
}

.btn-group button {
  background-color: gray;
  border: black;
  border-radius: 3px;
  color: white;
  padding: 15px 25px;
  font-size: 16px;
  cursor: pointer;
  float: left;
  margin: 1px 10px;
  position: relative;
    left: 20%;
}

</style>
</head>
<body>

<h1>Warehouse Main Page</h1>

<div class="btn-group">
 <form action="Employees.php">
  <button class="button">Manage Employees</button>
</form>

<form action="Orders.php">
    <button class="button">Manage Orders</button>
</form>

<form action="Inventory.php">
    <button class="button">Manage Inventory</button>
</form>

<form action="CheckInOut.php">
    <button class="button">Check in and out </button>
</form>
</div>
</div>
