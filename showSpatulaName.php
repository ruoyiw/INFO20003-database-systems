<?php
    
$sql_string = "SELECT ProductName FROM Spatula";
    
$wa = FALSE;
    
function whereAnd() {
    global $wa;
    if ($wa == FALSE) {
        $wa = TRUE;
        return " WHERE ";
    } else {
        return " AND ";
    }
}
    
    if (!empty($_POST['ProductName'])) {
        $sql_string = $sql_string . whereAnd() . "ProductName = '" . $_POST['ProductName'] . "'";
    }
    if ($_POST['Type'] !== 'default') {
        $sql_string = $sql_string . whereAnd() . "Type = '" . $_POST['Type'] . "'";
    }
    if (!empty($_POST['Size'])) {
        $sql_string = $sql_string . whereAnd() . "Size = '" . $_POST['Size'] . "'";
    }
    if (!empty($_POST['Colour'])) {
        $sql_string = $sql_string . whereAnd() . "Colour = '" . $_POST['Colour'] . "'";
    }
    if (!empty($_POST['Price'])) {
        $sql_string = $sql_string . whereAnd() . "Price = '" . $_POST['Price'] . "'";
    }

    

//replace the following with your details. Dbname is your username by default.
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","ruoyiw","22011992","ruoyiw");
//echo $sql_string;
    
echo "<form method='GET' action='showSpatulaDetail.php'>";
$result = mysqli_query($con, $sql_string);

    
echo "<table border='1'>";

// Just show the spatula names matching the search
echo "<tr><td>Spatula Name</td></tr>";
    
while($row = mysqli_fetch_array($result)) {
    
    echo "<tr>";
    echo "<td><a href='showSpatulaDetail.php?ProductName=" . $row['ProductName'] . "'>". $row['ProductName'] ."</a ></td>";
    echo "</tr>";
        
}
echo "</table>";
echo "</form>";
mysqli_close($con);
    
?>
