<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Update a record</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
  </head>
  <body >
    <div class="mainArea">
    <div class="scpContainer">
    <h1>Update SCP Record</h1>
    
    <p><a class="btn btn-primary" href="index.php">Back to Index</a></p>
    
    
    <?php
    
    include "connection.php";
    
    $id = $_GET['update'];
    
    $record = $connection->query("SELECT * FROM SCP_Files WHERE item='$id'");
    $row = $record->fetch_assoc(); 
    
    
    ?>
    
    <!--  
    Method is HTTP request method. The way the HTTP protocol sends/receives data to servers
    POST you can not see https://www.w3schools.com/tags/ref_httpmethods.asp
    Action is where the form data goes to
    -->
    <form method="post" action="connection.php" >
        
        <input type='hidden' name="item" value="<?php echo $row['item']; ?>"> 
        
        <label>SCP Item</label>
        <br>
        <input type="text" name="newItem" placeholder="SCP Item ID..." value="<?php echo $row['item']; ?>">
        <br><br>
        
        <label>Special Containment Procedures</label>
        <br>
        <input type="text" name="special" placeholder="SCP's..." value="<?php echo $row['special']; ?>">
        <br><br>
        
        <label>Description</label>
        <br>
        <input type="text" name="description" placeholder="Description..."  value="<?php echo $row['description']; ?>">
        <br><br>
        
        <label>Additional Information</label>
        <br>
        <input type="text" name="additional" placeholder="Additional Information.." value="<?php echo $row['additional']; ?>">
        <br><br>
        
        <label>Image Address</label>
        <br>
        <input type="text" name="image" placeholder="/images/yourimage.jpg" value="<?php echo $row['image']; ?>">
        <br><br>
        <input type="submit" name="update" value="Update Record" class='buttonStyle'>
        
    </form>
    </div></div>
    
    
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
