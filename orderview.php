<?php include 'orderheader.php'?>
<style>

body {
    background-color: purple;
    color: white;
}
.table {
    background-color: white;
    color: white;
}
.table-dark th, .table-dark td, .table-dark thead th {
    color: white !important;
}
.btn-primary, .btn-secondary, .btn-danger, .btn-warning {
    background-color: #00FF00;
    border-color: #00FF00;
    color: white !important;
}
.btn-primary:focus, .btn-secondary:focus, .btn-danger:focus, .btn-warning:focus {
    box-shadow: 0 0 0 0.25rem #00FF00;
    color: white !important;
}

    </style>
<h1 class="text-center mt-5">Order Details</h1>

<div class="container mt-3">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Region</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Cake Option</th>
                <th scope="col">Table Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $query = "SELECT * FROM orders WHERE id = $id";
                $view_order = mysqli_query($conn, $query);

                while($row = $view_order->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>{$row['id']}</th>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['city']}</td>";
                    echo "<td>{$row['region']}</td>";
                    echo "<td>{$row['postal_code']}</td>";
                    echo "<td>{$row['phone_number']}</td>";
                    echo "<td>{$row['cake_option']}</td>";
                    echo "<td>{$row['table_number']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<div class="container text-center mt-5">
    <a href="orderhome.php" class="btn btn-warning">Back</a>
</div>

<?php include "orderfooter.php" ?>
