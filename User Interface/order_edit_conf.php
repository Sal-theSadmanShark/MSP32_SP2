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
    $olditemSKU = $_POST["olditemSKU"];
    $oldAmount = $_POST["oldAmount"];
    $newitemSKU = $_POST["newitemSKU"];
    $newAmount = $_POST["newAmount"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Edit Sale Confirmation</h2>";

    
        //Displays the form input
        echo "<h3>Below is the Order data you jsut edited</h3>
        <p>Order Num: $orderNum</p>
        <p>old SKU: $olditemSKU</p>
        <p>Old Amount: $oldAmount</p>
        <p>New SKU: $newitemSKU</p>
        <p>New Amount: $newAmount</p>";
 
        //Checks if the database connection is successful
        if (!$conn) {
            echo "<p>Database connection failure, try again</p>";
        } else {
            //If the connection is successful add the data to the appropirate table
            $sql_table = "custOrder";
            $query = "UPDATE $sql_table SET 
            `itemSKU`='$newitemSKU',
            `amount`='$newAmount'
            WHERE 
            `orderNum`='$orderNum';
            ";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p>An error has been encounted, please contact site developers</p>";
            } else {
                //Provide feedback to the user on the result
                echo "<p>Your result has been recorded successfully</p>";
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