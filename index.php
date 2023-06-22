<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SCP Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="scp_files/style.css">
</head>
<body class="container">

<?php include 'scp_files/connection.php' ?>

<!-- Menu Row -->
<div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

          <!-- Navbar brand -->
          <a class="navbar-brand" href="index.php">SCP Subjects</a>

          <!-- Toggler button for mobile -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Collapsible navbar content -->
          <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
              <!-- Run php loop through db and display page names here -->
              <?php foreach($result as $page): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=<?php echo $page['pg']; ?>"><?php echo $page['pg']; ?></a>
              </li>
              <?php endforeach; ?>
              <li class="nav-item">
                <a class="nav-link" href="form.php">Enter a new SCP subject</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

<!-- Database content here -->
<div class="row">
    <div class="col">
        <?php
        if (isset($_GET['page'])) {
            // Remove single quotes from page get value
            $pg = trim($_GET['page'], "'");

            // Run SQL command to select record based on get value
            $record = $connection->query("SELECT * FROM pages WHERE pg='$pg'");

            if ($record && $record->num_rows > 0) {
                // Convert $record into an array for us to echo out the individual fields on screen.
                $row = $record->fetch_assoc();

                // Create variables that hold data from all table fields
                $h1 = $row['h1'];
                $h2 = $row['h2'];
                $h3 = $row['h3'];

                $img1 = $row['img1'];
                $img2 = $row['img2'];
                $img3 = $row['img3'];

                $p1 = $row['p1'];
                $p2 = $row['p2'];
                $p3 = $row['p3'];

                // Variables to hold the update and delete URL strings
                $id = $row['id'];
                $update = "update.php?update=" . $id;
                $delete = "scp_files/connection.php?delete=" . $id;

                // Display information on screen
                echo "
                <h1>Item #: {$pg}</h1>
                <h2>Subject Name: {$h1}</h2>
                <p><img src='{$img1}'></p>
                <p>{$p1}</p>
                <p>{$p2}</p>
                <p>{$p3}</p>
                ";

                // Display update and delete buttons
                echo "
                <p>
                    <a href='{$update}' class='btn btn-warning'>Update</a>
                    <a href='{$delete}' class='btn btn-danger'>Delete</a>
                </p>
                ";
            } else {
                echo "<p>No record found for the selected page.</p>";
            }
        } else {
            // First time access to page, display content below
            echo "
            <h1>Welcome to SCP (Secure. Contain. Protect.) Database Website</h1>
            <p class='text-center'>Above links will let you view our stored database of SCP subjects.</p>
            <p class='text-center'><img src='images/SCP000.jpg'></p>
            ";
        }
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
crossorigin="anonymous"></script>
</body>
</html>
