<?php include "orderheader.php" ?>
<?php
if(isset($_GET['id']))
{
$id= $_GET['id'];
$query = "DELETE FROM orders WHERE id = {$id}";
$delete_query= mysqli_query($conn, $query);
header("Location: orderhome.php");
}
?>
<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"> Back </a>
<div>
<!-- Footer -->
<?php include "orderfooter.php" ?>