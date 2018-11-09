<?php
    
$con = mysqli_connect("info20003db.eng.unimelb.edu.au","ruoyiw","22011992","ruoyiw");
    
// Check connection
if (mysqli_connect_errno()) {
    echo "Could not connect to MySQL for the following reason: " . mysqli_connect_error();
}

    
$sql_string = "INSERT INTO `Order` (RequestedTime, ResponsibleStaffMember, CustomerDetails) VALUES (NOW(), '" . $_POST['ResponsibleStaffMember']."', '" . $_POST['CustomerDetails']."')";
    
if (mysqli_query($con, $sql_string)) {
    $idOrder = mysqli_insert_id($con);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

  
$result = mysqli_query($con,"SELECT * FROM Spatula WHERE QuantityInStock > 0");
    
$OrderQuantity = $_POST['OrderQuantity'];
$index = 0;
$insertOrder = TRUE;
    
    
while($row = mysqli_fetch_array($result)) {
    
    $idSpatula[$index] = $row['idSpatula'];
    $QuantityInStock[$index] = $row['QuantityInStock'];
        
    if($OrderQuantity[$index] <= $QuantityInStock[$index]){
        
        $leftStockQuantity[$index] = $QuantityInStock[$index] - $OrderQuantity[$index];
        $sql_update = "UPDATE Spatula SET QuantityInStock = $leftStockQuantity[$index] WHERE idSpatula = $idSpatula[$index]";
        
        if (mysqli_query($con, $sql_update)) {
            echo "Update Spatula ". $idSpatula[$index] . " stock successfully";
            echo "<br>";
        } else {
            echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
            echo "<br>";
        }
        
        $sql_insert = "INSERT INTO OrderLineItem VALUES ($idSpatula[$index], $idOrder, $OrderQuantity[$index])";
        
        if (mysqli_query($con, $sql_insert)) {
            echo "Insert Spatula ". $idSpatula[$index] . " for order successfully, " . $OrderQuantity[$index] . " ordered.";
            echo "<br><br>";
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
            echo "<br><br>";
        }
        
    } else {
        $insertOrder = FALSE;
        echo "Unsuccessful order: Spatula ". $idSpatula[$index] . " are understock.";
        echo "<br><br>";
    }
    
    $index = $index + 1;
}


// Order successfully if all the items are in stock
if ($insertOrder == TRUE) {
    echo "Order has been successfully placed.";
    echo "<br>";
    echo "Order ID: " . $idOrder;
    echo "<br>";
    echo "Responsible staff member: " . $_POST['ResponsibleStaffMember'];
    echo "<br>";
    echo "Customer details: " . $_POST['CustomerDetails'];
    echo "<br>";
}
    
mysqli_close($con);
?>
