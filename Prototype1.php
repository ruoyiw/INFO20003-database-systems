<html>
<head><title>Orders</title></head>
<body>
<h1> Orders </h1>
<br>

<?php

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","ruoyiw","22011992","ruoyiw");

// Check connection
if (mysqli_connect_errno()) {
	echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

echo "<form method='POST' action='insertOrder.php'>";
    
echo "Customer Details:<br>";
echo "<textarea name='CustomerDetails' cols='53' rows='7'></textarea>";
echo "<br><br>";

echo "Responsible Staff Member: ";
echo "<input type='text' name='ResponsibleStaffMember'/>";
echo "<br><br>";



$result = mysqli_query($con,"SELECT * FROM Spatula WHERE QuantityInStock > 0");

/* this lists all items that are currently in-stock */
echo "<table border='1'>";
echo "<tr>";
echo "<th>" . "Spatula ID" . "</th><th>" . Name . "</th><th>" . Type . "</th><th>" . Size . "</th><th>" . Colour . "</th><th>" . Price . "</th><th>" . "Quantity currently in stock" . "</th><th>" . "Order Quantity" . "</th>";
echo "</tr>";


while($row = mysqli_fetch_array($result)) {

	echo "<tr>";
    
	echo "<td>" . $row['idSpatula'] . "</td><td>" . $row['ProductName'] . "</td><td>" . $row['Type'] . "</td><td>" . $row['Size'] . "</td><td>" . $row['Colour'] . "</td><td>" . $row['Price'] . "</td><td>" . $row['QuantityInStock'] . "</td>";
    echo "<td>" . "<input type='numeric' name='OrderQuantity[]' value = '0'/>" . "</td>";
	echo "</tr>";
}
echo "</table>";
echo "<br>";
    
echo "<input type='submit' value='Submit'/>";
echo "</form>";
    
mysqli_close($con);
?>

</body>
</html>
