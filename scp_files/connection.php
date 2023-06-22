<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Database credentials
$user = "a30024651_scpuser"; 
$pw = "Toiohomai1234";
$db = "a30024651_SCP";

// Database connection object (address, user, pw, db)
$connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

// Create variable that stores all records from our database
$result = $connection->query("SELECT * FROM pages");

if (!$result) {
    die("Query execution failed: " . $connection->error);
}

// Check if form has been submitted with data
if (isset($_POST['submit'])) {
    // Create variables from our posted form values
    $pg = $_POST['pg'];

    $h1 = $_POST['h1'];
    $h2 = $_POST['h2'];
    $h3 = $_POST['h3'];

    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];

    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3']; 

    // Create an insert command
    $sql = "INSERT INTO pages(pg, h1, h2, h3, img1, img2, img3, p1, p2, p3)
    VALUES('$pg', '$h1', '$h2', '$h3', '$img1', '$img2', '$img3', '$p1', '$p2', '$p3')";

    // Display success or error message on screen
    if ($connection->query($sql) === TRUE) {
        echo "
        <h1>Subject record has been added successfully!!!</h1>
        <p><a href='../index.php'>Back to index page</a></p>
        ";
    } else {
        echo "
        <h1>Error!!! Record wasn't added.</h1>
        <p><a href='../index.php'>Back to index page</a></p>
        ";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Create delete SQL command
    $del = "DELETE FROM pages WHERE id=$id";

    // Run the command and then display appropriate success or error messages
    if ($connection->query($del) === TRUE) {
        echo "<p>Record successfully deleted. <a href='../index.php'>Return to Index page</a></p>";
    } else {
        echo "
        <p>There was an error deleting this record.</p>
        <p><a href='../index.php'>Back to Index page</a></p>
        ";
    }
} // end of delete

// Update form to check if update button has been clicked
if (isset($_POST['update'])) {
    // Create variables from our posted form values
    $id = $_POST['id'];
    $pg = $_POST['pg'];

    $h1 = $_POST['h1'];
    $h2 = $_POST['h2'];
    $h3 = $_POST['h3'];

    $img1 = $_POST['img1'];
    $img2 = $_POST['img2'];
    $img3 = $_POST['img3'];

    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3']; 

    // Create an update command
    $update ="
            update pages set pg='$pg', h1='$h1', h2='$h2', h3='$h3', img1='$img1', img2='$img2', img3='$img3', p1='$p1', p2='$p2', p3='$p3'
            where id='$id'
    
    ";

    // Display success or error message on screen
    if ($connection->query($update) === TRUE) {
        echo "
        <h1>Subject record has been updated successfully!!!</h1>
        <p><a href='../index.php'>Back to index page</a></p>
        ";
    } else {
        echo "
        <h1>Error!!! Record wasn't updated.</h1>
        <p><a href='../index.php'>Back to index page</a></p>
        ";
    }
}
?>
