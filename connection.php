<?php

    // Database credentials
    $user = 'a30056470_user';
    $pw = '6uSKQgn5tMm8nzv';
    $db = 'a30056470_SCP_Files';
    
    //Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    //variable that returns all records in database
    //creates a connection object
    $result = $connection->query('SELECT * FROM SCP_Files');

//form validation for security (https://www.w3schools.com/php/php_form_validation.asp)
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

//Check if form data has been sent via post
    
if(isset($_POST['submit']))
{
    
    //create variables from post data to make VALUES easier to read
    $item = test_input($_POST['item']);
    $special = test_input($_POST['special']);
    $description = test_input($_POST['description']);
    $additional = test_input($_POST['additional']);
    $image = test_input($_POST['image']);
    
    //create a sql insert command
    $insert = "INSERT INTO SCP_Files (item, special, description, additional, image) 
                VALUES ('$item', '$special', '$description', '$additional', '$image')";
                
                
    if($connection->query($insert) === TRUE)
    {
        echo "    
        <body>  
        <link rel='stylesheet' href='style.css'>  
        <div class='mainArea'>
        <div class='scpContainer'>
        <h1>Record added successfully</h1>
        <a href='index.php'>Return to home</a>  
        </div> </div> 
        </body>     
        ";
    }
    else
    {
         echo "
        <h1>Error submitting data</h1>
        <p>{$connection->error}</p>
        <a href='index.php'>Return to home</a>
        ";
    }
}


    //delete record

    if (isset($_GET['delete'])) 
    {
        $id = $_GET['delete'];

        //delete sql command
        $del = "DELETE FROM SCP_Files WHERE item='$id'";

        if($connection ->query($del)=== TRUE)
        {
            echo "
            <style>
            body{font-family: sans-serif;}
            a{
            background-color:black;
            border:none;
            color:white;
            padding: 16px 32px;
            text-align:center;
            text-decoration: none;
            display: inline-block;
            font-size:16px;}
            </style>
            <body>  
            <link rel='stylesheet' href='style.css'>  
            <div class='mainArea'>
            <div class='scpContainer'>
            <h1>Record Deleted</h1>
            <br>
            <p><a href='index.php'>Back to index page</a></p>
            </div></div></body>
            ";
        }
        else
        {
            echo "
            <style>
            body{font-family: sans-serif;}
            a{
            background-color:black;
            border:none;
            color:red;
            padding: 16px 32px;
            text-align:center;
            text-decoration: none;
            display: inline-block;
            font-size:16px;
        }
            </style>
            <body>  
            <link rel='stylesheet' href='style.css'>  
            <div class='mainArea'>
            <div class='scpContainer'>
            <h1>Error deleting record</h1>
            <p><a href='index.php'>Back to index page</a></p>
            </div></div></body>
            ";
        }
    }

    //if database is updated
    if(isset($_POST['update']))
    {
        
        // create variables from our form post data
        $item = test_input($_POST['item']);
        $newItem = test_input($_POST['newItem']);
        $special = test_input($_POST['special']);
        $description = test_input($_POST['description']);
        $additional = test_input($_POST['additional']);        
        $image = test_input($_POST['image']);
        
        // create a sql update command
        $update = "UPDATE SCP_Files SET item='$newItem', special='$special', description='$description', additional='$additional', image='$image' WHERE item='$item'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
                 <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <body>  
                <link rel='stylesheet' href='style.css'>  
                <div class='mainArea'>
                <div class='scpContainer'>
                <h1>Record updated successfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
                </div></div></body>
            ";
        }
        else
        {
            echo "
                 <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <body>  
                <link rel='stylesheet' href='style.css'>  
                <div class='mainArea'>
                <div class='scpContainer'>
                <h1>Error updating data</h1>
                <p>{$connection->error}</p>
                <p><a href='update.php'>Return to form</a></p> 
                </div></div></body>           
            ";
        }
    }


    ?>