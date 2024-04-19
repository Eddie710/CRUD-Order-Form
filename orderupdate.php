<?php include 'orderheader.php' ?>

<?php 
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query="SELECT * FROM orders WHERE id = {$id}";
    $view_orders = mysqli_query($conn,$query);
    
    // Check if the query returned any rows
    if(mysqli_num_rows($view_orders) > 0) {
        $row = mysqli_fetch_assoc($view_orders); // Fetch the row
        // Assign retrieved values to variables
        $id = $row['id'];
        $address = $row['address'];
        $city = $row['city'];
        $region = $row['region'];
        $postal_code = $row['postal_code'];
        $phone_number = $row['phone_number'];
        $cake_option = $row['cake_option'];
        $table_number = $row['table_number'];
    } else {
        // Handle case where order ID is not found
        echo "Order not found.";
    }
}

if(isset($_POST['update']))
{
    // Retrieve form data using $_POST
    $id = $_POST['id'];
    $address = $_POST['street_address'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];
    $phone_number = $_POST['phone_number'];
    $cake_option = $_POST['cake_option'];
    $table_number = $_POST['table_number'];

    $query = "UPDATE orders SET address = '{$address}', city = '{$city}', region = '{$region}', postal_code = '{$postal_code}', phone_number = '{$phone_number}', cake_option = '{$cake_option}', table_number = '{$table_number}' WHERE id = $id";
    $update_orders = mysqli_query($conn, $query);
    if($update_orders) {
        echo "<script type='text/javascript'>alert('Order details updated successfully!')</script>";
    } else {
        echo "Error updating order: " . mysqli_error($conn);
    }
}
?>

<h1 class="text-center">Update Order Details</h1>
<form method="post">
        <div>
            <label for="id">Order Id:</label>
            <input type="text" id="id" name="id" required>
        </div>
        <div>
            <label for="street_address">Street Address:</label>
            <input type="text" id="street_address" name="street_address" required>
        </div>
        <div>
            <label for="street_address_line2">Street Address Line 2:</label>
            <input type="text" id="street_address_line2" name="street_address_line2">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div>
            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required>
        </div>
        <div>
            <label for="postal_code">Postal / Zip Code:</label>
            <input type="text" id="postal_code" name="postal_code" required>
        </div>
        <div>
            <label for="table_number">Table number:</label>
            <input type="text" id="table_number" name="table_number" required>
        </div>
        <div>
        <br>
    <label>Best option for you:</label>
    <br>
    <br>
    <label for="wild_berry_cake">Wild Berry Cake</label>
    <input type="radio" id="wild_berry_cake" name="cake_option" value="Wild Berry Cake"><br>
    
    <label for="chocolate_vanilla_caramel_cake">Chocolate, Vanilla and Caramel Cake</label>
    <input type="radio" id="chocolate_vanilla_caramel_cake" name="cake_option" value="Chocolate, Vanilla and Caramel Cake"><br>
    
    <label for="tiramisu">Tiramisu</label>
    <input type="radio" id="tiramisu" name="cake_option" value="Tiramisu"><br>
    
    <label for="carrot_pumpkin_cake">Carrot and Pumpkin Cake</label>
    <input type="radio" id="carrot_pumpkin_cake" name="cake_option" value="Carrot and Pumpkin Cake"><br>
    
    <label for="cheesecake_raspberry">Cheesecake with Raspberry</label>
    <input type="radio" id="cheesecake_raspberry" name="cake_option" value="Cheesecake with Raspberry"><br>
    
    <label for="amandina_cake">Amandina Cake</label>
    <input type="radio" id="amandina_cake" name="cake_option" value="Amandina Cake"><br>
    <br>
    <label>Best raw option for you:</label>
    <br>
    <br>
    <label for="wild_berry_cake_raw">Wild Berry Cake – raw</label>
    <input type="radio" id="wild_berry_cake_raw" name="cake_option" value="Wild Berry Cake – raw"><br>
    
    <label for="pear_banana_pineapple_cake_raw">Pear, Banana and Pineapple Cake – raw</label>
    <input type="radio" id="pear_banana_pineapple_cake_raw" name="cake_option" value="Pear, Banana and Pineapple Cake – raw"><br>
    
    <label for="mango_vanilla_cake_raw">Mango & Vanilla Cake – raw</label>
    <input type="radio" id="mango_vanilla_cake_raw" name="cake_option" value="Mango & Vanilla Cake – raw"><br>
    
    <label for="amoraws_cake_raw">Amoraws Cake – raw</label>
    <input type="radio" id="amoraws_cake_raw" name="cake_option" value="Amoraws Cake – raw"><br>
    
    <label for="chocolate_cake_raw">Chocolate Cake – raw</label>
    <input type="radio" id="chocolate_cake_raw" name="cake_option" value="Chocolate Cake – raw"><br>
    
    <label for="cocoa_mint_cake_raw">Cocoa and Mint Cake – raw</label>
    <input type="radio" id="cocoa_mint_cake_raw" name="cake_option" value="Cocoa and Mint Cake – raw"><br>
</div>

<div>
    <label for="phone_number">Phone number:</label>
    <input type="text" id="phone_number" name="phone_number" pattern="[0-9]{10}"  required>
</div>
        <div>
            <input type="submit" value="Submit Order">
        </div>
    </form>
</div>

<div class="container text-center mt-5">
    <a href="orderhome.php" class="btn btn-warning mt-5"> Back </a>
<div>
<?php include 'orderfooter.php' ?>
