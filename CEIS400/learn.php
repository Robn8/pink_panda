

<html>
	<head>
		<title>HTML Cheat Sheet</title>
	</head>
	
	<body>
	<h1>Heading One</h1>
	<h2>Heading TWO</h2>
	<h3>Heading Three</h3>
	<h4>Heading Four</h4>
	<h5>Heading Five</h5>
	<h6>Heading Six</h6>
	<!--paragraph-->
	<p>
	text for paragraph output <strong>Bold</strong> highlight <em>itallyc</em> highlight 
	</p>
	<p>
	<a href="http://google.com">google</a> link open<br>
	<a href="http://google.com" target="_blank">google</a> link open new tab
	</p>
	<!--list-->
	<ul>
		<li>List Item1</li>
		<li>List Item2</li>
		<li>List Item3</li>
		<li>List Item4</li>
	</ul>
	
	<ol>
	<li>List Item1</li>
		<li>List Item2</li>
		<li>List Item3</li>
		<li>List Item4</li>
	</ol>
	<!--Table-->
	<table>
		<thead>
			<tr>
				<th>name</th>
				<th>Email</th>
				<th>Age</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>jeff</td>
				<td>email</td>
				<td>37</td>
			</tr>
			<tr>
				<td>bill</td>
				<td>email</td>
				<td>38</td>
			</tr>
			<tr>
				<td>alice</td>
				<td>email</td>
				<td>39</td>
			</tr>
	</table>
	<br><hr><br>		
	<!--Form-->
	<form action="main.php" method="POST">
		<div>
			<lable>First Name</lable>
			<input type="text" name="firstName" placeholder="Enter first name">
		</div>
		<div>
			<lable>Last	Name</lable>
			<input type="text" name="lastName">
		</div>
		<div>
			<lable>Email</lable>
			<input type="email" name="email">
		</div>
		<div>
			<lable>Message</lable>
			<textarea name="message"></textarea>
		</div>
		<div>
			<lable>Select Gender</lable>
			<select name="binary">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		<div>
		<lable>Age:</lable>
		<input type="number" name="age" value="30">
		</div>
		<div>
			<lable>Birthday:</lable>
			<input type="date" name="birthday">
		</div>
		<input type="submit" name="submit" value="Submit">		
	</form>
	
	<button>Click Me</button> <!--need php-->
	
	<!--image-->
	<br>
	<a href="Sample-Image.jpg">
	<img src="Sample-Image.jpg" alt="bird description" width="200">
	</a>
	
	<p>The <abbr title="World Wide Web">www</abbr> is awesome</p>
	
	
	
	</body>
</html>

































