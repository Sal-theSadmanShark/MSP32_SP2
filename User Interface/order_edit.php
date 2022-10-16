<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to record a sale in the database" />
    <meta name="author" content="M Salim Sadman & Ashraful Alam ridoy" />
    <title>GotoGrow-MRM Sales Management</title>
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
<h2>GotoGrow-MRM Order Management - Edit order</h2>
<p>This page is used to edit a order from the order database.</p>

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
    { echo"
    <form method='post' action='order_edit_conf.php'
        <fieldset>
            <legend><strong>Old order Details</strong></legend>
            <p><label for='orderNum'>Order Number: </label>
            <input type='text' name='orderNum' id='orderNum' maxlength='30\2' pattern='[0-9,]+' required/></p>
            <p><label for='olditemSKU'>old Item SKU: </label>
            <input type='text' name='olditemSKU' id='olditemSKU' maxlength='30\2' pattern='[0-9,]+' required/></p>
            <p><label for='oldAmount'>old Order Amount: </label>
            <input type='text' name='oldAmount' id='oldAmount' maxlength='32' required/></p>
            </p>
        </fieldset>
        <fieldset>
            <legend><strong>New Order Details</strong></legend>
            <p><label for='newitemSKU'>new Item SKU: </label>
            <input type='text' name='newitemSKU' id='newitemSKU' maxlength='30\2' pattern='[0-9,]+' required/></p>
            <p><label for='newAmount'>new Order Amount: </label>
            <input type='text' name='newAmount' id='newAmount' maxlength='32' required/></p>
            </p>
        </fieldset>
        <br>

        <input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>
            
    </form>
    ";}
    else {
        echo "<p>You are not premitted to access this page, sorry!</p>";
    }
?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>