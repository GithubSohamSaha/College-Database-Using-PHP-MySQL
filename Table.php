<?PHP
 session_start();
 if(!isset($_SESSION['loggedin'])){
    header('Location: Login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
	        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	        margin: 0;
	        padding: 0;
	        display: flex;
	        justify-content: center;
	        align-items: center;
	        height: 100vh;
            background-color: #b3ffff;
        }
        form{
            background-color: white;
        }
        fieldset {
	        border: thick dotted #000;   
        }
        legend {
	        color: #FFF;
	        background: #000;
	        font-size: 1.5em;
	        padding: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text align: left;
        }
        th {
            background-color: #00997a;
            color: white;
        }
        tr:nth child(even) {
            background color: #f9f9f9;
        }
        #InsertColValue {
            width: 90%; /* Set the width to make it larger */
            resize: none; /* Prevent resizing */
            word-wrap: break-word;
        }
        input[type="text"],input[type="number"],select,input[type="submit"] {
	        margin: 2px 0;
	        padding: 10px;
	        width: 150px;
	        border: none;
	        border-bottom: 1px solid #ccc;
	        outline: none;
	        font-size: 16px;
	        transition: border-bottom 0.3s;
        }
        input[type="text"]:focus,input[type="number"]:focus,select:focus,input[type="submit"]:focus {
	        border-bottom: 1px solid #3498db;
        }
        input[type="text"][readonly] {
            text-align: center;
            padding: 2px 3px 0px 55px /* Adjust padding as needed */
        }
        input[type="submit"] {
        	background-color: #3498db;
            color: #fff;
        	cursor: pointer;
        	border-radius: 5px;
        	transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
        	background-color: #2980b9;
        }
        .message {
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            max-width: 100%;
            margin: 0 auto;
        }

        /* Style for the button */
        .main-button {
            display: inline-block;
            padding: 7px 10px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #1a75ff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .main-button a {
            color: #fff; /* Change text color */
            text-decoration: none; /* Remove underline from links */
        }
        /* Hover effect for the button */
        .main-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<?php
        $con = mysqli_connect('localhost', 'root', '', 'nac_cmsa_sem5_23');
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }

        function ShowTable($con, $table){
            $sql = "SELECT * FROM $table"; // Changed "&" to "*" in the SQL query
            $result = mysqli_query($con, $sql);
            if (!$result) {
                // Query failed, handle error
                echo "Error: " . mysqli_error($con);
            } else {
                echo "<b>Table: $table</b>";
                echo "<table>";
                while ($fieldInfo = mysqli_fetch_field($result)) {
                    echo "<th>{$fieldInfo->name}</th>"; // Use ->name to get the field name
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }

        if(isset($_POST["create"])){
            echo'<form method="POST">';
            echo'<fieldset>';
            echo'<legend align="center">::Create Table::</legend>';
            echo'Enter the Table name: <input type="text" name="tablename"><br><br>';
            echo'Enter the number of columns: <input type="number" name="colnumber"><br><br>';
            echo'<input type="submit" name="proceed" value="Proceed">';
            echo'</fieldset>';
            echo'</form>';
        }
        if(isset($_POST["proceed"])){
            if($_POST["tablename"] !== null && $_POST["colnumber"] !== null){
                $tablename=$_POST["tablename"];
                $colnumber=$_POST["colnumber"];
                if($colnumber == 7){
                    echo'<form method="POST">';
                    echo'<fieldset>';
                    echo'<center><input type="text" value="Student" name="tablename" readonly></center>';
                    echo'&emsp;&emsp;<b>Coloumn name</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Data type</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Length</b><br><br>';
                    echo'<input type="text" name="attribute1"> &nbsp;<select name="datatype1"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize1"><br><br>';
                    echo'<input type="text" name="attribute2"> &nbsp;<select name="datatype2"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize2"><br><br>';
                    echo'<input type="text" name="attribute3"> &nbsp;<select name="datatype3"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize3"><br><br>';
                    echo'<input type="text" name="attribute4"> &nbsp;<select name="datatype4"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize4"><br><br>';
                    echo'<input type="text" name="attribute5"> &nbsp;<select name="datatype5"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize5"><br><br>';
                    echo'<input type="text" name="attribute6"> &nbsp;<select name="datatype6"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize6"><br><br>';
                    echo'<input type="text" name="attribute7"> &nbsp;<select name="datatype7"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize7"><br><br>';
                    echo'<input type="submit" value="CREATE" name="createtable1">';
                    echo'</fieldset>';
                    echo'</form>';
                }
                else if($colnumber == 4){
                    $tablename=$_POST["tablename"];
                    echo'<form method="POST">';
                    echo'<fieldset>';
                    echo'<center><input type="text" value="Department" name="tablename" readonly></center>';
                    echo'&emsp;&emsp;<b>Coloumn name</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Data type</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Length</b><br><br>';
                    echo'<input type="text" name="attribute1"> &nbsp;<select name="datatype1"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize1"><br><br>';
                    echo'<input type="text" name="attribute2"> &nbsp;<select name="datatype2"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize2"><br><br>';
                    echo'<input type="text" name="attribute3"> &nbsp;<select name="datatype3"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize3"><br><br>';
                    echo'<input type="text" name="attribute4"> &nbsp;<select name="datatype4"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize4"><br><br>';
                    echo'<input type="submit" value="CREATE" name="createtable2">';
                    echo'</fieldset>';
                    echo'</form>';
                }
                else if($colnumber == 5){
                    $tablename=$_POST["tablename"];
                    echo'<form method="POST">';
                    echo '<fieldset>';
                    echo'<center><input type="text" value="Library" name="tablename" readonly></center>';
                    echo'&emsp;&emsp;<b>Coloumn name</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Data type</b>&emsp;&emsp;&emsp;&emsp;&emsp;<b>Length</b><br><br>';
                    echo'<input type="text" name="attribute1"> &nbsp;<select name="datatype1"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize1"><br><br>';
                    echo'<input type="text" name="attribute2"> &nbsp;<select name="datatype2"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize2"><br><br>';
                    echo'<input type="text" name="attribute3"> &nbsp;<select name="datatype3"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize3"><br><br>';
                    echo'<input type="text" name="attribute4"> &nbsp;<select name="datatype4"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize4"><br><br>';
                    echo'<input type="text" name="attribute5"> &nbsp;<select name="datatype5"><option value="int">int</option><option value="varchar">varchar</option><option value="char">char</option><option value="date">date</option></select> &nbsp;<input type="number" name="datasize5"><br><br>';
                    echo'<input type="submit" value="CREATE" name="createtable3">';
                    echo'</fieldset>';
                    echo'</form>';
                }
            }else{
                echo"Please enter both Table name and number of columns.";
            }  
        }
        if(isset($_POST["createtable1"]) && isset($_POST["tablename"])){
            $t = $_POST["tablename"];
            $at1 = $_POST["attribute1"];
            $at2 = $_POST["attribute2"];
            $at3 = $_POST["attribute3"];
            $at4 = $_POST["attribute4"];
            $at5 = $_POST["attribute5"];
            $at6 = $_POST["attribute6"];
            $at7 = $_POST["attribute7"];
            $dt1 = $_POST["datatype1"];
            $dt2 = $_POST["datatype2"];
            $dt3 = $_POST["datatype3"];
            $dt4 = $_POST["datatype4"];
            $dt5 = $_POST["datatype5"];
            $dt6 = $_POST["datatype6"];
            $dt7 = $_POST["datatype7"];
            $ds1 = $_POST["datasize1"];
            $ds2 = $_POST["datasize2"];
            $ds3 = $_POST["datasize3"];
            $ds4 = $_POST["datasize4"];
            $ds5 = $_POST["datasize5"];
            $ds6 = $_POST["datasize6"];
            $ds7 = $_POST["datasize7"];
            $sql = "create table ".$t." ( ".$at1." ".$dt1."(".$ds1.") primary key, ".$at2." ".$dt2."(".$ds2."), ".$at3." ".$dt3."(".$ds3."), ".$at4." ".$dt4."(".$ds4."), ".$at5." ".$dt5.", ".$at6." ".$dt6."(".$ds6."), ".$at7." ".$dt7."(".$ds7."));";
            mysqli_query($con, $sql);
            mysqli_query($con, "commit");

            echo'<div class="message">
                <b>The Table '.$t.' is succesfully Created with the mentioned columns</b><br><br>
                <button class="main-button"><a href="TablePage.php">To the main page</a></button>
            </div>';
        }
        if(isset($_POST["createtable2"]) && isset($_POST["tablename"])){
            $t = $_POST["tablename"];
            $at1 = $_POST["attribute1"];
            $at2 = $_POST["attribute2"];
            $at3 = $_POST["attribute3"];
            $at4 = $_POST["attribute4"];
            $dt1 = $_POST["datatype1"];
            $dt2 = $_POST["datatype2"];
            $dt3 = $_POST["datatype3"];
            $dt4 = $_POST["datatype4"];
            $ds1 = $_POST["datasize1"];
            $ds2 = $_POST["datasize2"];
            $ds3 = $_POST["datasize3"];
            $ds4 = $_POST["datasize4"];
            $sql = "create table ".$t." ( ".$at1." ".$dt1."(".$ds1.") primary key, ".$at2." ".$dt2."(".$ds2."), ".$at3." ".$dt3."(".$ds3."), ".$at4." ".$dt4."(".$ds4."));";
            mysqli_query($con, $sql);
            mysqli_query($con, "commit");

            echo'<div class="message">
                <b>The Table '.$t.' is succesfully Created with the mentioned columns</b><br><br>
                <button class="main-button"><a href="TablePage.php">To the main page</a></button>
            </div>';
        }
        if(isset($_POST["createtable3"]) && isset($_POST["tablename"])){
            $t = $_POST["tablename"];
            $at1 = $_POST["attribute1"];
            $at2 = $_POST["attribute2"];
            $at3 = $_POST["attribute3"];
            $at4 = $_POST["attribute4"];
            $at5 = $_POST["attribute5"];
            $dt1 = $_POST["datatype1"];
            $dt2 = $_POST["datatype2"];
            $dt3 = $_POST["datatype3"];
            $dt4 = $_POST["datatype4"];
            $dt5 = $_POST["datatype5"];
            $ds1 = $_POST["datasize1"];
            $ds2 = $_POST["datasize2"];
            $ds3 = $_POST["datasize3"];
            $ds4 = $_POST["datasize4"];
            $ds5 = $_POST["datasize5"];
            $sql = "create table ".$t." ( ".$at1." ".$dt1."(".$ds1.") primary key, ".$at2." ".$dt2."(".$ds2."), ".$at3." ".$dt3."(".$ds3."), ".$at4." ".$dt4."(".$ds4."), ".$at5." ".$dt5."(".$ds5."));";
            mysqli_query($con, $sql);
            mysqli_query($con, "commit");

            echo'<div class="message">
                <b>The Table '.$t.' is succesfully Created with the mentioned columns</b><br><br>
                <button class="main-button"><a href="TablePage.php">To the main page</a></button>
            </div>';
        }

        if(isset($_POST["insert"])){
            echo'<form method="POST">
            <fieldset>
                <legend align="center">::Insert data in Table::</legend>
                <label for="table">Enter The Table Name:</label><br><br>
                <input type="text" name="tablenameforinsert" id="table"><br><br>
                <input type="submit" value="Next Step" name="insertdata">
            </fieldset>
            </form>';
        }
        if(isset($_POST["insertdata"])){
            if(isset($_POST["tablenameforinsert"]) && $_POST["tablenameforinsert"] == "Student"){
                echo '<form method="POST">';
                echo '<input type="text" value="Student" name="tablenameforinsert" class="textbox" readonly><br><br>';
                echo '<table>';
                echo '<tr><td>Roll:</td><td><input type="number" name="data1"></td></tr>';
                echo '<tr><td>Name:</td><td><input type="text" name="data2"></td></tr>';
                echo '<tr><td>Address:</td><td><input type="text" name="data3"></td></tr>';
                echo '<tr><td>Gender:</td><td><input type="text" name="data4"></td></tr>';
                echo '<tr><td>DOB:</td><td><input type="date" name="data5"></td></tr>';
                echo '<tr><td>Phone:</td><td><input type="number" name="data6"></td></tr>';
                echo '<tr><td>Email:</td><td><input type="text" name="data7"></td></tr>';
                echo '</table>';
                echo '<input type="submit" name="inputrecord1">';
                echo '</form>';
            }
            else if(isset($_POST["tablenameforinsert"]) && $_POST["tablenameforinsert"] == "Department"){
                echo '<form method="POST">';
                echo '<input type="text" value="Department" name="tablenameforinsert" class="textbox" readonly><br><br>';
                echo '<table>';
                echo '<tr><td>Did:</td><td><input type="number" name="data1"></td></tr>';
                echo '<tr><td>DName:</td><td><input type="text" name="data2"></td></tr>';
                echo '<tr><td>Room:</td><td><input type="number" name="data3"></td></tr>';
                echo '<tr><td>HOD:</td><td><input type="text" name="data4"></td></tr>';
                echo '</table>';
                echo '<input type="submit" name="inputrecord2">';
                echo '</form>';
            }
            else if(isset($_POST["tablenameforinsert"]) && $_POST["tablenameforinsert"] == "Library"){
                echo '<form method="POST">';
                echo '<input type="text" value="Library" name="tablenameforinsert" class="textbox" readonly><br><br>';
                echo '<table>';
                echo '<tr><td>BookId:</td><td><input type="number" name="data1"></td></tr>';
                echo '<tr><td>BName:</td><td><input type="text" name="data2"></td></tr>';
                echo '<tr><td>Author:</td><td><input type="text" name="data3"></td></tr>';
                echo '<tr><td>Publisher:</td><td><input type="text" name="data4"></td></tr>';
                echo '<tr><td>Price:</td><td><input type="number" name="data5"></td></tr>';
                echo '</table>';
                echo '<input type="submit" name="inputrecord3">';
                echo '</form>';
            }
        }
        if(isset($_POST["inputrecord1"]) && isset($_POST["tablenameforinsert"])){
            $data_1 = $_POST["data1"];
            $data_2 = $_POST["data2"];
            $data_3 = $_POST["data3"];
            $data_4 = $_POST["data4"];
            $data_5 = $_POST["data5"];
            $data_6 = $_POST["data6"];
            $data_7 = $_POST["data7"];
            $tableName = $_POST["tablenameforinsert"];
            $result = mysqli_query($con,"SHOW TABLES LIKE '$tableName'");
            if($result->num_rows == 0){
                echo "Table does not exist,Create it first<br>";
            }
            else{
                $sql = "INSERT INTO ".$tableName." VALUES (".$data_1.",'".$data_2."','".$data_3."','".$data_4."','".$data_5."',".$data_6.",'".$data_7."')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo'<div class="message">';
                    echo "Values inserted successfully<br>";
                    $sql="SELECT * FROM $tableName";
                    $result = mysqli_query($con,$sql);
                    ShowTable($con,$tableName);
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
                else{
                    echo'<div class="message">';
                    echo "Error inserting values: ".mysqli_error($con)."<br>";
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
            }
        }
        else if(isset($_POST["inputrecord2"]) && isset($_POST["tablenameforinsert"])){
            $data_1 = $_POST["data1"];
            $data_2 = $_POST["data2"];
            $data_3 = $_POST["data3"];
            $data_4 = $_POST["data4"];
            $tableName = $_POST["tablenameforinsert"];
            $result = mysqli_query($con,"SHOW TABLES LIKE '$tableName'");
            if($result->num_rows == 0){
                echo "Table does not exist,Create it first<br>";
            }
            else{
                $sql = "INSERT INTO ".$tableName." VALUES (".$data_1.",'".$data_2."',".$data_3.",'".$data_4."')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo'<div class="message">';
                    echo "Values inserted successfully<br>";
                    $sql = "SELECT * FROM $tableName";
                    $result = mysqli_query($con,$sql);
                    ShowTable($con,$tableName);
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
                else{
                    echo'<div class="message">';
                    echo "Error inserting values: ".mysqli_error($con)."<br>";
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
            }
        }
        else if(isset($_POST["inputrecord3"]) && isset($_POST["tablenameforinsert"])){
            $data_1 = $_POST["data1"];
            $data_2 = $_POST["data2"];
            $data_3 = $_POST["data3"];
            $data_4 = $_POST["data4"];
            $data_5 = $_POST["data5"];
            $tableName = $_POST["tablenameforinsert"];
            $result = mysqli_query($con,"SHOW TABLES LIKE '$tableName'");
            if($result->num_rows == 0){
                echo "Table does not exist,Create it first<br>";
            }
            else{
                $sql = "INSERT INTO ".$tableName." VALUES (".$data_1.",'".$data_2."','".$data_3."','".$data_4."',".$data_5.")";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo'<div class="message">';
                    echo "Values inserted successfully<br>";
                    $sql = "SELECT * FROM $tableName";
                    $result = mysqli_query($con,$sql);
                    ShowTable($con,$tableName);
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
                else{
                    echo'<div class="message">';
                    echo "Error inserting values: ".mysqli_error($con)."<br>";
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
            }
        }

        if(isset($_POST["delete"])){
            echo'<form method="POST">';
            echo'<fieldset>';
            echo'<legend align="center">::Delete Table::</legend>';
            echo'Enter the Table name: <input type="text" name="tablenamefordelete"><br><br>';
            echo'<input type="submit" name="deletetable" value="Delete Table">';
            echo'</fieldset>';
            echo'</form>';
        }
        else if(isset($_POST["deletetable"]) && isset($_POST["tablenamefordelete"])){
            $tableName=$_POST["tablenamefordelete"];
            $sql="DROP TABLE $tableName;";
            $result = mysqli_query($con,$sql);
            if($result){
                echo'<div class="message">
                    <b>The Table '.$tableName.' is succesfully Droped from the database</b><br><br>
                    <button class="main-button"><a href="TablePage.php">To the main page</a></button>
                </div>';
            }
            else{
                echo "Error deleting table: ".mysqli_error($con)."<br>";
                echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
            }
        }

        if (isset($_POST["deleterecord"])) {
            echo'<form method="POST">';
            echo'<fieldset>';
            echo'<legend align="center">::Delete the record form table::</legend>';
            echo'<label for="table">Table Name: </label>';
            echo'<input type="text" name="tablenamefordelrec" id="table"><br><br>';
            echo'<label for="colName">Primary Data Key Names: </label>';
            echo'<input type="text" name="PrimaryKeyName" id="colName"><br><br>';
            echo'<label for="colValue">Primary Data Key Values: </label>';
            echo'<input type="text" name="PrimaryKeyValue" id="colValue"><br><br>';
            echo'<input type="submit" value="Delete Record" name="DeleteTheRecord">';
            echo'</fieldset>';
            echo'</form>';
        } else if(isset($_POST["DeleteTheRecord"]) && isset($_POST["tablenamefordelrec"])) {
            $tableName=$_POST["tablenamefordelrec"];
            $PrimaryKeyValue=$_POST["PrimaryKeyValue"];
            $PrimaryKeyName=$_POST["PrimaryKeyName"];

            $result = mysqli_query($con,"SHOW TABLES LIKE '$tableName'");
            if($result->num_rows==0){
                echo "Table does not exist,Create it first<br>";
            }
            else{
                $sql="DELETE FROM $tableName WHERE $PrimaryKeyName=$PrimaryKeyValue;";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo'<div class="message">';
                    echo "Record deleted successfully<br>";
                    $sql="SELECT * FROM $tableName";
                    $result = mysqli_query($con,$sql);
                    ShowTable($con,$tableName);
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
                else{
                    echo'<div class="message">';
                    echo "Error deleting record: ".mysqli_error($con)."<br>";
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
            }
        }

        if (isset($_POST["updaterecord"])) {
            echo'<form method="POST">
            <fieldset>
            <legend align="center">::Update The Data of table::</legend>
            <label for="table">Table Name: </label>
            <input type="text" name="tableforupdrec" id="table"><br><br>
            <label for="pcolName">Primary Key Names: </label>
            <input type="text" name="PrimaryKeyName" id="pcolName">
            <label for="pcolValue">Primary Key Values: </label>
            <input type="text" name="PrimaryKeyValue" id="pcolValue"><br><br>
            <label for="colName">Enter the column name: </label>
            <input type="text" name="UpdateKeyName" id="colName"><br><br>
            <label for="colValue">Enter the data you want to update: </label>
            <input type="text" name="UpdateKeyValue" id="colValue"><br><br>
            <input type="submit" value="Update Record" name="UpdateTheRecord">
            </fieldset>
            </form>';
        } else if (isset($_POST["UpdateTheRecord"]) && isset($_POST["tableforupdrec"])){
            $tableName=$_POST["tableforupdrec"];
            $primaryKeyName=$_POST["PrimaryKeyName"];
            $primaryKey=$_POST["PrimaryKeyValue"];
            $colName=$_POST["UpdateKeyName"];
            $colValue=$_POST["UpdateKeyValue"];
            $result = mysqli_query($con,"SHOW TABLES LIKE '$tableName'");
            if($result->num_rows==0){
                echo "Table does not exist,Create it first<br>";
            }
            else{
                if(gettype($colValue)=="string"){
                    $sql="UPDATE ".$tableName." SET ".$colName."=".$colValue." WHERE ".$primaryKeyName."=".$primaryKey.";";
                }

                $result = mysqli_query($con,$sql);
                if($result){
                    echo'<div class="message">';
                    echo "Record updated successfully<br>";
                    $sql="SELECT * FROM $tableName";
                    $result = mysqli_query($con,$sql);
                    ShowTable($con,$tableName);
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
                else{
                    echo'<div class="message">';
                    echo "Error updating record: ".mysqli_error($con)."<br>";
                    echo'<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                    echo'</div>';
                }
            }
        }

        if (isset($_POST["showtable"])) {
            // Display the form to enter the table name
            echo '<form method="POST">';
            echo '<fieldset>';
            echo '<legend align="center">::Show The table::</legend>';
            echo '<label for="table">Table Name: </label>';
            echo '<input type="text" name="tablenameforshow" id="table"><br><br>';
            echo '<input type="submit" value="Show Table" name="showthetable"><br><br>';
            echo '</fieldset>';
            echo '</form>';
        } else if (isset($_POST["showthetable"]) && isset($_POST["tablenameforshow"])) {
            $tableName = $_POST["tablenameforshow"];
            $result = mysqli_query($con, "SHOW TABLES LIKE '$tableName'");
            if ($result->num_rows == 0) {
                echo "Table does not exist, Create it first<br>";
            } else {
                echo '<div class="message">';
                ShowTable($con, $tableName);
                echo '<button class="main-button"><a href="TablePage.php">To the main page</a></button>';
                echo '</div>';
            }
        }
    ?> 
</body>
</html>
