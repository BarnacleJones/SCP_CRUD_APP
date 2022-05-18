<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Subject Files</title>
    <!-- this sylesheet is from w3 schools to get the hamburger menu  -->
    <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_mobile_navbar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">


   
    <!-- Script for page-->
    <script src="script.js" defer></script>  
</head>
<body>
<?php include "connection.php" ?>
    <!-- Navigation pane -->
<div class="topnav" id="home">
    <a href="index.php"><img id="logoSVG" src="./images/scp-logo.svg"></img></a>
    <div id="myLinks">
    <!-- Create the link for each item -->
      
    <?php foreach($result as $link): ?>
    <a href="index.php?link='<?php echo $link['item']; ?>'" onclick='myFunction()'><?php echo $link['item']; ?></a>
    <?php endforeach; ?>
    <a href="#form" onclick='addRecord()'>ADD RECORD</a>        
    </div>
    <!-- Hamburger menu code -->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</div>
   
<div class="mainArea">
    <div id="mainAreaID">
    <br><br>
    <h1>Welcome to the SCP Foundation</h1>
    <h2>Please note: This information is CLASSIFIED</h2>  
    
    <?php
        //telling server - if there is a get value 'link', this is what we want it to do
        //echo out the entire record
        if(isset($_GET['link']))
        {
            $item = trim($_GET['link'], "'");
            
            //run sql command to retrieve record based on GET value
            $record = $connection->query("SELECT * FROM SCP_Files WHERE item='$item'");
            
            
            //turn record into an associative array
            $array = $record->fetch_assoc();
            
            //variables to hold our update and delete url strings
            $id = $array['item'];
            $update = "update.php?update=" . $id;
            $delete = "connection.php?delete=" . $id;     

            echo "
            <div id='{$array['item']}' class='scpContainer'>            
            <h1>{$array['item']}</h1>
            <h2>Special Containment Procedures</h2>
            <p>{$array['special']}</p>
            <h2>Description</h2>
            <p>{$array['description']}</p>
            <h2>Additional Information</h2>
            <p>{$array['additional']}</p>   
            <img src='{$array['image']}' id='scpImage'></img><br> 
            <img id='logoSVG' src='./images/scp-logo.svg'></img>
            <br>
            <p>
                <a href='{$update}'>Update Record</a>
                
                <a href='{$delete}'>Delete Record</a>
            </p>
            <a href='#home'id='homeLink'>TOP</a>        
            </div>
            <br>            
            ";
        }
        else
        {
            //Default view that the user sees
            echo
            "<p><img src='images/scp-logo.svg' width='100px'></p>
            <p>Click on the links in menu to view/update/delete an SCP Subject File</p>";
        }
        
        ?>
        </div>
    
<!-- Div for the add a record form -->
<div id="form" style="display:none;">
 <h1>Use the form below to create a record in the SCP database</h1>
    
 <button id="formButton" onclick='formButton()'>Close Form</button>

    <!--  
    Method is HTTP request method. The way the HTTP protocol sends/receives data to servers
    POST you can not see https://www.w3schools.com/tags/ref_httpmethods.asp
    Action is where the form data goes to
    -->
    <form method="post" action="connection.php">
        <label>Enter SCP Record Item ID</label>
        <br>
        <input type="text" name="item" placeholder="SCP-###" required>
        <br><br>
        
        <label>Enter Special Containment Procedures</label>
        <br>
        <input type="text" name="special" placeholder="SCP..." required>
        <br><br>
        
        <label>Enter Description</label>
        <br>
        <input type="text" name="description" placeholder="Relevant information..." required>
        <br><br>
        
        <label>Enter Additional Information</label>
        <br>
        <input type="text" name="additional" placeholder="Additional Info..." required>
        <br><br>
        
        <label>Enter Image Address</label>
        <br>
        <input type="text" name="image" placeholder="/images/010.jpg" >
        <br><br>
        <input type="submit" name="submit" value="Submit Record" class="formButton">
        
    </form>


</div>

</div>   




</body>
</html>