<!-- Header -->
<?php include "orderheader.php" ?>
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
<div class="container mt-5">
    <h1 class="text-center">Data To Perform CRUD Operations</h1>
    <a href="orderform.php" class="btn btn-outline-dark mb-2">
        <i class="bi bi-person-plus"></i> Place an Order
    </a>
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
                <th scope="col" colspan="3" class="text-center">CRUD Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM orders"; // SQL query to fetch all table data
            $view_orders = mysqli_query($conn, $query); // sending the query to the database
            // displaying all the data retrieved from the database using while loop
            while ($row = mysqli_fetch_assoc($view_orders)) {
                $id = $row['id'];
                $address = $row['address'];
                $city = $row['city'];
                $region = $row['region'];
                $postal_code = $row['postal_code'];
                $phone_number = $row['phone_number'];
                $cake_option = $row['cake_option'];
                $table_number = $row['table_number'];
                echo "<tr>";
                echo "<th scope='row'>{$id}</th>";
                echo "<td>{$address}</td>";
                echo "<td>{$city}</td>";
                echo "<td>{$region}</td>";
                echo "<td>{$postal_code}</td>";
                echo "<td>{$phone_number}</td>";
                echo "<td>{$cake_option}</td>";
                echo "<td>{$table_number}</td>";
                // Buttons to view, update and delete record
                echo "<td class='text-center'>
                          <a href='orderview.php?&id={$id}' class='btn btn-primary'>
                              <i class='bi bi-eye'></i> View
                          </a>
                      </td>";
                echo "<td class='text-center'>
                          <a href='orderupdate.php?edit&id={$id}' class='btn btn-secondary'>
                              <i class='bi bi-pencil'></i> Edit
                          </a>
                      </td>";
                echo "<td class='text-center'>
                          <a href='orderdelete.php?&delete&id={$id}' class='btn btn-danger'>
                              <i class='bi bi-trash'></i> Delete
                          </a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- A BACK button to go to the index page -->
<div class="container text-center mt-5">
    <a href="orderform.php" class="btn btn-warning mt-5">Back</a>
</div>
<!-- Footer -->
<?php include "orderfooter.php"?>
