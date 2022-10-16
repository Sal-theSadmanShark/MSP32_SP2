<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Removes members from database" />
    <meta name="author" content="Kipp STRATMANN" />
    <title>GotoGrow-MRM Member Management</title>
    </head>
<body>
    <header>
        <?php   
        /* delete_member_conf.php
        Removes members from the SQL database. 
        Author: K. Stratmann
        Last Edited: 20/09/2022
        */
        ?>
        <link href="styles/style.css" rel="stylesheet" />
    </header>
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
    $gname = $_POST["gname"];
    $fname = $_POST["fname"];
    $phone = $_POST["phone"];
    $loginid = $_POST["loginid"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Add Member Confirmation</h2>";

    //Checks that an error message doesn't exits and  increments the count value
            //Displays the results of the quiz back to the student
            echo "<h3>Below is the membership that you have just removed</h3>
            <p>Your Name: $gname $fname</p>
            <p>Your Phone Number: $phone</p>
            <p>Your Login ID & Password have not been displayed for your privacy</p>";
            //Checks if the user can have another attempts and displays the option to do so to the user
 
            //Checks if the database connection is successful
            if (!$conn) {
                echo "<p>Database connection failure, try again</p>";
			}
			
			//check if any of the input is missing
			if ($gname == '' || $fname == '' || $phone == '' || $loginid == '') {
				echo "<p>Result: Failed</p>";
				echo "<p>One or more of the input is blank</p>";
			}
			
            else {
                //If the connection is successful add the data to the appropirate table
                $sql_table_user = "users";
				
                $query = "DELETE FROM $sql_table_user WHERE userFirstName='$gname' && userLastName='$fname' && userPhone='$phone' && userLoginName='$loginid'";
				
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
