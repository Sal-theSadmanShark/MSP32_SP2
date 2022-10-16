<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to record a sale in the database" />
    <meta name="author" content="M Salim Sadman & Ashraful Alam Ridoy" />
    <title>GotoGrow-MRM Order Management</title>
    <link href="styles/style.css" rel="stylesheet" />
</head>
<body>

<h1>GotoGrow-MRM Website</h1>
<nav>
    <ul>
        <li class="menu"><a href="index.php">Home</a></li>
        <li class="menu"><a href="add_order.php">Order items</a></li>
        <li class="menu"><a href="check_edit_order.php">Edit order</a></li>
        <li class="menu"><a href="check_delete_order.php">Delete order</a></li>
        <li class="menu"><a href="check_add.php">Add Member</a></li>
        <li class="menu"><a href="check_edit.php">Edit Member</a></li>
        <li class="menu"><a href="check_delete.php">Delete Member</a></li>
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item</a></li>
        <br>
        <br>
        <li class="menu"><a href="check_item_delete.php">Delete item</a></li>
    </ul>		
</nav>

<hr> 

<?php
    //Starts the session
    session_start();

    //Delcearse the rest of the vairables to be used
    $orderNum = $_POST["orderNum"];
    $itemSKU = $_POST["itemSKU"];
    $amount = $_POST["amount"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>delete Order Confirmation</h2>";

   
        //Displays the form input
        echo "<h3>Below is the Order Data you want to remove</h3>
        <p>Order Number: $orderNum</p>
        <p>Item SKU: $itemSKU</p>
        <p>Amount: $amount</p>
        ";
 
        //Checks if the database connection is successful
        if (!$conn) {
            echo "<p>Database connection failure, try again</p>";
        } else {
            //If the connection is successful add the data to the appropirate table
            $sql_table = "custOrder";
            $query = 
            "DELETE FROM $sql_table WHERE 
            `orderNum`='$orderNum' &&
            `itemSKU`='$itemSKU' &&
            `amount`='$amount';
            ";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                //Provide feedback to the user on the result
                echo "<p>An error has been encounted, please contact site developers</p>";    
            } else {
                echo "<p>Sales record deleted successfully</p>";    
            }
            //Close the connection
            $conn->close();
        }
?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>