// farmer_profile.php
<?php
  // Connect to database
  $conn = mysqli_connect("localhost", "username", "password", "database");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Register farmer
  if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $farm_name = $_POST['farm_name'];
    $address = $_POST['address'];

    $query = "INSERT INTO farmers (name, email, password, farm_name, address) VALUES ('$name', '$email', '$password', '$farm_name', '$address')";
    mysqli_query($conn, $query);
  }

  // Display farmer profile
  if (isset($_SESSION['farmer_id'])) {
    $farmer_id = $_SESSION['farmer_id'];
    $query = "SELECT * FROM farmers WHERE id = '$farmer_id'";
    $result = mysqli_query($conn, $query);
    $farmer = mysqli_fetch_assoc($result);

    echo "<h2>Farmer Profile</h2>";
    echo "<p>Name: " . $farmer['name'] . "</p>";
    echo "<p>Email: " . $farmer['email'] . "</p>";
    echo "<p>Farm Name: " . $farmer['farm_name'] . "</p>";
    echo "<p>Address: " . $farmer['address'] . "</p>";
  }
?>