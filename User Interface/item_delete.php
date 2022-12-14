<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to record an item in the database" />
    <meta name="author" content="Ashraful Alam Ridoy" />
    <title>GotoGrow-MRM Item Management</title>
    <!-- modified by M Salim Sadman -->
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
<h2>GotoGrow-MRM Item Management - Delete Item from Inventory</h2>
<p>This page is used to delete an item to the stock database.</p>

<?php

    
$proid = $_POST["proid"];
$propass = $_POST["propass"];
$servername = "localhost";
$user = "root";
$pwd = "";
$sql_db = "goto_gro_databases";
$sql_table = "users";
$conn = new mysqli($servername, $user, $pwd, $sql_db);
$query = "SELECT userType, userLoginName, userPassword FROM $sql_table WHERE userLoginName = '$proid'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0 || $proid === "admin" && $propass === "Pa55w.rd") {
        while($row = $result->fetch_assoc()) {
            $type = $row["userType"];
            $id = $row["userLoginName"];
            $pass = $row["userPassword"];
		}
}



if ($proid === "admin" && $propass === "Pa55w.rd" || $type == "Manager" && $id == $proid && $pass == $propass) 
    { 
        
        $result = mysqli_query($conn,"SELECT SKU, stockName, stockPrice_AUD, stockQuantity, stockCategory  FROM stock");

        echo "<table border='1'>
            <tr>
            <th>SKU</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price (AUD)</th>
            <th>Stock</th>
            </tr>";

            $lowStock = array();
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['SKU'] . "</td>";
            echo "<td>" . $row['stockName'] . "</td>";
            echo "<td>" . $row['stockCategory'] . "</td>";
            echo "<td>" . $row['stockPrice_AUD'] . "</td>";
            echo "<td>" . $row['stockQuantity'] . "</td>";
            echo "</tr>";

            if ($row['stockQuantity']<=5){
                array_push($lowStock, $row['SKU']);
            }
        }
        echo "</table>";
    
    
        echo"
    <form method='post' action='item_delete_config.php'
    <fieldset>
    <legend><strong>Item Details</strong></legend>
    <p><label for='sku'>Item Stock Keeping Unit: </label>
    <input type='text' name='sku' id='sku' pattern='[0-9]+' maxlength='11' required/></p>
    <p><label for='itemname'>Item Name: </label>
    <input type='text' name='itemname' id='itemname' maxlength='100' required/></p>
    <p><label for='itemprice'>Item Price (AUD): </label>
    <input type='text' name='itemprice' id='itemprice' maxlength='11' required/></p>
</fieldset>
        <br>

        <input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>
            
    </form>
    ";}
    else {
        echo "<p>You are not permitted to access this page, sorry!</p>";
    }
?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>
