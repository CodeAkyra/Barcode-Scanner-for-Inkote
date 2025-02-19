<center>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inkote";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <h1>
        Search by Name or Scan using Barcode
    </h1>

    <div>
        <form action="" method="GET">
            <input type="text" name="productName" placeholder="Enter Serial Code" style="height: 50px;">
            <input type="text" name="serial_code" placeholder="Enter Serial Code" style="height: 50px;">
            <button type="submit" style="height: 50px;"> Search Product </button>
        </form>
    </div>

    <?php
    $found = false; // para mag display kung may product or wala

    if (isset($_GET['serial_code']) || isset($_GET['productName'])) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
            <th>Product ID</th>
            <th>Product Serial Code</th>
            <th>Product Name</th>
            <th>Available Quantity</th>
            <th>Maintaining Level</th>
          </tr>";

        if (isset($_GET['serial_code'])) {
            $serial_code = mysqli_real_escape_string($conn, $_GET['serial_code']);
            $sql = "SELECT * FROM hempel_product WHERE product_serial_code = '$serial_code'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $found = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_serial_code']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['available_quantity']}</td>
                        <td>{$row['maintaining_level']}</td>
                      </tr>";
                }
            }
        }

        if (isset($_GET['productName'])) {
            $product_code = mysqli_real_escape_string($conn, $_GET['productName']);
            $sql = "SELECT * FROM hempel_product WHERE product_name = '$product_code'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $found = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['product_id']}</td>
                        <td>{$row['product_serial_code']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['available_quantity']}</td>
                        <td>{$row['maintaining_level']}</td>
                      </tr>";
                }
            }
        }

        echo "</table>";
    }

    ?>

    <div style="font-size: 50px;">
        <?php
        if (!$found) {
            echo "NO PRODUCT FOUND!";
        }
        ?>
    </div>

    <h1>______________________INVENTORY TABLE______________________</h1>

    <?php

    $sql = "SELECT * FROM hempel_product";
    $result = mysqli_query($conn, $sql); {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
        <th>Product ID</th>
        <th>Product Serial Code</th>
        <th>Product Name</th>
        <th>Available Quantity</th>
        <th>Maintaining Level</th>
      </tr>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
            <td>{$row["product_id"]}</td>
            <td>{$row["product_serial_code"]}</td>
            <td>{$row["product_name"]}</td>
            <td>{$row["available_quantity"]}</td>
            <td>{$row["maintaining_level"]}</td>
            </tr>";
            };
        } else {
            echo "No product found";
        }

        echo "</table>";
    }
    ?>
</center>

<!-- THIS IS A PROTOTYPE ONLY! -->