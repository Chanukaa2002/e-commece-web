
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="./js/bootstrap.min.js"></script>
    <title>Add Product</title>
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
              <a class="nav-link" href="#">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewProduct.php">View Product</a>
            </li>
          </ul>
    </nav>
        <div class="registration-form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-icon" >
                    <span><i class="icon icon-user"></i></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="username" name="pId" placeholder="Product ID">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control item" name="price" placeholder="Price($)">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control item"name="img" placeholder="Image">
                </div>
                <div class="form-group">
                    <button type="submit" name="btnSave" class="btn btn-block create-account">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST["btnSave"])) {
    $id = $_POST["pId"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $img = $_FILES["img"]["name"];
    $temp = $_FILES["img"]["tmp_name"]; // Updated input name
    
    // Database connection
    $conn = mysqli_connect("localhost", "chanuka", "Chanuka@20021004", "orderdb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Use prepared statements to prevent SQL injection
    $query = $conn->prepare("INSERT INTO tblproducts (pId, Name, Price, img) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssds", $id, $name, $price, $img);
    
    if ($query->execute()) {
        $path = "images/" . $img;
        if (move_uploaded_file($temp, $path)) {
            echo "<script> alert(Product saved successfully!) </script>";
        } else {
            echo "Failed to upload image!";
        }
    } else {
        echo "Error: " . $query->error;
    }
    
    // Close connection
    $query->close();
    mysqli_close($conn);
}
?>
