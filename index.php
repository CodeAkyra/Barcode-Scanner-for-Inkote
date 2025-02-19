<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inkote";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['serial_code'])) {
    $serial_code = $_GET['serial_code'];


    $serial_code = mysqli_real_escape_string($conn, $serial_code);


    $sql = "SELECT * FROM hempel_product WHERE product_serial_code = '$serial_code' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<strong>Product ID:</strong> " . $row["product_id"] . "<br>";
        echo "<strong>Serial Code:</strong> " . $row["product_serial_code"] . "<br>";
        echo "<strong>Product Name:</strong> " . $row["product_name"] . "<br>";
        echo "<strong>Available Quantity:</strong> " . $row["available_quantity"] . "<br>";
        echo "<strong>Maintaining Level:</strong> " . $row["maintaining_level"] . "<br>";
    } else {
        echo "No product found.";
    }
}
?>

<div>
    <form action="" method="GET">
        <input type="text" name="serial_code" placeholder="Enter Serial Code">
        <button type="submit">Search</button>
    </form>
</div>