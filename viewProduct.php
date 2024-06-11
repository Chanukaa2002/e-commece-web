<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="./js/bootstrap.min.js"></script>
    <title >VIew Product</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end;">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html"
                >Home </a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">View Product</a>
            </li>
          </ul>
      </nav>
</body>
</html>

<?php

    $conn = mysqli_connect("localhost", "chanuka", "Chanuka@20021004");
    mysqli_select_db($conn,"orderdb");
    $query = "SELECT Name,Price from tblproducts";
    $result = mysqli_query($conn, $query);

    echo"<div class=container>";

    while($row = mysqli_fetch_array($result)){
        echo"<div class=product>";
        echo "<div class='product-info'>";
        echo "<lable class=info>Name:     ".$row[0]."</lable><br>";
        echo "<lable class=info>Price:    ".$row[1]."$</lable><br>";
        echo"</div>";
        echo"</div>";
    }
    echo"</div>";
    mysqli_close($conn);
?>