<?php include "orderheader.php" ?>
<style>
body {
    background-color: purple; 
    font-family: Arial, sans-serif;
    color: #fff; 
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #f7f7f7; 
    margin-top: 20px;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #4e9c72; 
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
    color: #fff; 
}

input[type="text"],
input[type="radio"] {
    margin-bottom: 10px;
}

.radio-container {
    display: flex;
    flex-direction: column;
}

.radio-container label {
    margin-bottom: 5px;
}

input[type="submit"] {
    background-color: #2e6f47; 
    color: #fff; 
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #265e3f; 
}

.error {
    color: red;
    font-weight: bold;
}


</style>
<body>
    <h2>Bistro Mini-Cake Order Form</h2>
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

    <div class="container text-center mt-5">
    <a href="orderhome.php" class="btn btn-warning mt-5"> Back </a>

    <?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["street_address"])) {
        $errors[] = "Street Address is required";
    }

    if (empty($_POST["city"])) {
        $errors[] = "City is required";
    }

    if (empty($_POST["region"])) {
        $errors[] = "Region is required";
    }

    if (empty($_POST["postal_code"])) {
        $errors[] = "Postal / Zip Code is required";
    }
    if (empty($_POST["table_number"])) {
        $errors[] = "Table Number is required";
    }

    if (empty($_POST["phone_number"])) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone_number"])) {
        $errors[] = "Invalid phone number format. Please enter a 10-digit number.";
    }

    if (empty($errors)) {
        // Establish connection to the database
        $host = 'localhost:3310'; // server
        $student_id = 'id';
        $username = 'root';
        $password = '';
        $database = 'ordermanagement'; // Database Name
        $conn = mysqli_connect($host, $username, $password, $database);

        // Check if connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO orders (id, address, city, region, postal_code, phone_number, cake_option, table_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssssss", $id, $address, $city, $region, $postal_code, $phone_number, $cake_option, $table_number);

        // Set parameters
        $id = $_POST["id"];
        $address = $_POST["street_address"];
        $city = $_POST["city"];
        $region = $_POST["region"];
        $postal_code = $_POST["postal_code"];
        $phone_number = $_POST["phone_number"];
        $cake_option = $_POST["cake_option"];
        $table_number = $_POST["table_number"];

        // Execute the statement
        if ($stmt->execute()) {
            echo "Order processed successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
?>

<?php include "orderfooter.php" ?>