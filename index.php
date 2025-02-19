<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkote Inventory Prototype</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="margin: 100px;">

    <?php include 'add-product.php';
    ?>
    <center>

        <?php
        include 'conn.php';
        ?>
        <h1>
            Inkote Inventory Prototype
        </h1>
        <br>
        <br>
        <h1 class="d-flex align-items-end gap-3">
            SEARCH BY NAME OR SCAN BARCODE
        </h1>

        <br>

        <div class="d-flex align-items-end gap-3">
            <form action="" method="GET" class="d-flex gap-3">
                <div class="col-auto">
                    <label class="col-form-label fw-bold">Enter Product Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="productName" placeholder="Enter product name" style="width: 250px;">
                </div>
                <div class="col-auto">
                    <label class="col-form-label fw-bold">Enter Serial Code</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="serial_code" placeholder="Enter serial code" style="width: 250px;">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                </div>
            </form>


        </div>

        <br>

        <?php
        $found = false; // para mag display kung may product or wala

        if (isset($_GET['serial_code']) || isset($_GET['productName'])) {
            echo "<table class='table table-striped' style='text-align: center;'>";
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

        <div style="font-size: 20px;">
            <?php
            if (!$found) {
                echo "NO PRODUCT FOUND!";
            }
            ?>
        </div>

        <br>

        <div class="d-flex align-items-end gap-3">
            <h1>
                INVENTORY TABLE
            </h1>
            <div class="col-auto">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Product
                </button>
            </div>
        </div>


        <?php

        $sql = "SELECT * FROM hempel_product";
        $result = mysqli_query($conn, $sql); {
            echo "<table class='table table-striped border='1' style='text-align: center;'>";
            echo "<tr>
        <th>Product ID</th>
        <th>Product Serial Code</th>
        <th>Product Name</th>
        <th>Available Quantity</th>
        <th>Maintaining Level</th>
        <th>Action</th>
      </tr>";

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
            <td>{$row["product_id"]}</td>
            <td>{$row["product_serial_code"]}</td>
            <td>{$row["product_name"]}</td>
            <td>{$row["available_quantity"]}</td>
            <td>{$row["maintaining_level"]}</td>
            <td>
            <button class='btn btn-primary'>Edit</button>
            <button class='btn btn-secondary'>Archive</button>
            </td>
            </tr>";
                };
            } else {
                echo "No product found";
            }

            echo "</table>";
        }
        ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- THIS IS A PROTOTYPE ONLY! -->