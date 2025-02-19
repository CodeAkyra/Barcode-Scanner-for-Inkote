<?php
include 'conn.php';
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">

                    <!-- Product ID naka auto increment -->
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Product ID</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="productID" placeholder="(Ex. Product_ID_0001)" disabled>
                    </div>
                    <!-- Product Serial Code -->
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Product Serial Code</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="serial_code" placeholder="Click the box and scan a product to auto-fill the code" required>
                    </div>
                    <!-- Product Name -->
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Product Name</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="productName" placeholder="Enter product name">
                    </div>
                    <!-- Product Available Quantity kung meron na exisiting, if wala leave it "0" lang -->
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Available Quantity</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="availableQuantity" placeholder="Enter quantity or leave 0." min="0">
                    </div>
                    <!-- Product Maintaining Level -->
                    <div class="col-auto">
                        <label class="col-form-label fw-bold">Maintaining Level</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="maintainingLevel" placeholder="Enter product maintaining level">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>