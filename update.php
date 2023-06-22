<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCP Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="scp_files/style.css">
  </head>
  <body class="container">

  <h1>SCP Foundation</h1>
    <p><a href="index.php" class="btn btn-primary">Back to Index page</a></p>

    <h2>Use this form to update a subject record</h2>

    <?php

        include 'scp_files/connection.php';
        $id = $_GET['update'];
        $record = $connection->query("SELECT * FROM pages where id=$id") or die($connection->error());
        $row = $record->fetch_assoc();

    ?>

    <form class="form-group" method="post" action="scp_files/connection.php">
    
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Subject Number</label>
    <br>
    <input type="text" class="form-control" name="pg" value="<?php echo $row['pg']; ?>">
    <br><br>
    <label>Subject Name</label>
    <br>
    <input type="text" class="form-control" name="h1" value="<?php echo $row['h1']; ?>">
    <br><br>
    <label>Image</label>
    <br>
    <input type="text" class="form-control" name="img1" placeholder="Image">
    <br><br>
    <label>Description</label>
    <br>
    <textarea class="form-control" name="p1" rows="5" placeholder="<?php echo $row['p1']; ?>"><?php echo $row['p1']; ?></textarea>
    <br><br>
    <hr width="75%">

    <label>Subject Name</label>
    <br>
    <input type="text" class="form-control" name="h2" value="<?php echo $row['h2']; ?>">
    <br><br>
    <label>Image</label>
    <br>
    <input type="text" class="form-control" name="img2" placeholder="Image">
    <br><br>
    <label>Description</label>
    <br>
    <textarea class="form-control" name="p2" rows="5" placeholder="<?php echo $row['p2']; ?>"><?php echo $row['p2']; ?></textarea>
    <br><br>
    <hr width="75%">

    <label>Subject Name</label>
    <br>
    <input type="text" class="form-control" name="h3" value="<?php echo $row['h3']; ?>">
    <br><br>
    <label>Image</label>
    <br>
    <input type="text" class="form-control" name="img3" placeholder="Image">
    <br><br>
    <label>Description</label>
    <br>
    <textarea class="form-control" name="p3" rows="5" placeholder="<?php echo $row['p3']; ?>"><?php echo $row['p3']; ?></textarea>
    <br><br>
    <hr width="75%">

    <input type="submit" class="btn btn-warning" name="update" value="Update Subject Record">

    




    </form>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>