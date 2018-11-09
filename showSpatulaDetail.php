<?php
    
$sql_string = "SELECT * FROM Spatula";
    
if (isset($_GET['ProductName'])) {
    
    //There is a movie_id in the URL
    $sql_string = $sql_string . " WHERE ProductName = '" . $_GET['ProductName'] . "'";

}

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","ruoyiw","22011992","ruoyiw");
//echo $sql_string;
    
$result = mysqli_query($con, $sql_string);

    
echo "<table border='1'>";
    
echo "<tr><td>Spatula ID</td><td>Name</td><td>Type</td><td>Size</td><td>Colour</td><td>Price</td><td>Quantity currently in stock</td></tr>";
    
    
while($row = mysqli_fetch_array($result)) {
        
    echo "<tr>";
    echo "<td>" . $row['idSpatula'] . "</td><td>" . $row['ProductName'] . "</td><td>" . $row['Type'] . "</td><td>" . $row['Size'] . "</td><td>" . $row['Colour'] . "</td><td>" . $row['Price'] . "</td><td>" . $row['QuantityInStock'] . "</td>";
    echo "</tr>";
        
}
echo "</table>";
mysqli_close($con);
    
?>
