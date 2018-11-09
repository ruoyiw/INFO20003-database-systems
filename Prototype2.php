<html>
<head><title>Browse</title></head>
<body>
<h1> Browse </h1>
<br>

<?php

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","ruoyiw","22011992","ruoyiw");
    
// Check connection
if (mysqli_connect_errno()) {
    echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}
    
echo "<form method='POST' action='showSpatulaName.php'>";
    
echo "Spatula name: ";
echo "<input type='text' name='ProductName' >";
echo "<br><br>";
    
$result = mysqli_query($con,"SELECT DISTINCT Type FROM Spatula");
echo "<select name='Type'>";
    
echo "<option value='default'>-- select type --</option>";
while($row = mysqli_fetch_array($result)) {
        
    echo "<option value='" . $row['Type'] . "'>";
    echo $row['Type'];
    echo "</option>";
        
}
  
echo "</select>";
echo "<br><br>";
    
echo "Size: ";
echo "<input type='text' name='Size'/>";
echo "<br><br>";
    
echo "Colour: ";
echo "<input type='text' name='Colour'/>";
echo "<br><br>";
    
echo "Price(&#36AU): ";
echo "<input type='text' name='Price'/>";
echo "<br><br>";
    
echo "<input type='submit' value='Search...' />";
echo "</form>";
    
mysqli_close($con);
?>


</body>
</html>
