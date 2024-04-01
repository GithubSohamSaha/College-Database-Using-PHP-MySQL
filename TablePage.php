<?PHP
 session_start();
 if(!isset($_SESSION['loggedin'])){
    header('Location: Login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head><title>COLLEGE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
    <style>
        fieldset {
	        border: thick dotted #000;   
        }
        legend {
	        color: #FFF;
	        background: #6254aa;
	        font-size: 0.9rem;
	        padding: 5px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-position: center;
            background-color:  #f8f8f8;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        header{
            background-color: #272626;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            font-size: 2rem;
            font-weight: bolder;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        /* Button styles */
        .Option-section {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        button.option {
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button.option:hover {
            background-color: #2980b9;
        }

        #logout-button {
            background-color: #e74c3c; /* Change the background color */
            color: #fff;
            border-radius: 5px;
            padding: 15px 25px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #logout-button:hover {
            background-color: #c0392b; 

        }
    </style>
</head>
<body>
    <header>College Database Access Portal</header>
    <div class="container">
        <form method="POST" action="Table.php">
            <div class="Option-section">
                <fieldset class="Option-section">
                    <legend align="center"><h1>Here We can Do..</h1></legend>
                    <button class="option" name="create">Create New Table</button>
                    <button class="option" name="delete">Delete Table</button>
                    <button class="option" name="insert">Insert New Record</button>
                    <button class="option" name="deleterecord">Delete Record</button>
                    <button class="option" name="updaterecord">Update Record</button>
                    <button class="option" name="showtable">Show Table Record</button>
                </fieldset>
            </div>
        </form><br>
        <form method="POST" action="Logout.php">
            <button id="logout-button">Log Out</button>
        </form>
    </div>
</body>
</html>