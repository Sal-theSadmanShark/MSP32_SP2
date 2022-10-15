<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to delete members from database" />
    <meta name="author" content="Kipp STRATMANN" />
    <!-- edited by M Salim Sadman & Ashraful Alam to add new features -->
    <title>GotoGrow-MRM Member Management</title>
</head>
<body>
    <header>
        <link href="styles/style.css" rel="stylesheet" />
    </header>
    <h1>GotoGrow-MRM Website</h1>
<nav>
    <ul>
        <li class="menu"><a href="index.php">Home</a></li>
        <li class="menu"><a href="add_order.php">Order items</a></li>
        <li class="menu"><a href="check_add.php">Add Member</a></li>
        <li class="menu"><a href="check_edit.php">Edit Member</a></li>
        <li class="menu"><a href="check_delete.php">Delete Member</a></li>
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item</a></li>
        <li class="menu"><a href="check_item_delete.php">Delete item</a></li>
    </ul>		
</nav>
<hr> 
	<h2>GotoGrow-MRM Home Page</h2>
    <p>Welcome to the GotoGrow-MRM Website. Please use the navagation tabs above to complete tasks. The membership database and stock database can be access and various actions taken. <br><b>Please note certain actions can only be undertaken by authorised users. Unauthorised access is prohibited and individuals will be prosecuted!</b></p>

    <?php
        $servername = "localhost";
        $user = "root";
        $pwd = "";
        $sql_db = "goto_gro_databases";
        //Makes the connection to the database
        $con = new mysqli($servername, $user, $pwd, $sql_db);
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT SKU, stockName, stockPrice_AUD, stockQuantity, stockCategory  FROM stock");

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

        $withComma = implode(",", $lowStock);
        echo "<p>Items With Low Stock: $withComma</p>";

        mysqli_close($con);
    ?>


<footer>

        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
