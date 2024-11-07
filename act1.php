<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>

</head>
<body>

    <h1>Vendo Machine</h1>
    <form method="POST">
        <fieldset style="width: 500px;">
            <legend>Products</legend>
            
            <label>
                <input type="checkbox" name="products[]" value="Coke"> Coke - ₱15
            </label><br>
            
            <label>
                <input type="checkbox" name="products[]" value="Sprite"> Sprite - ₱20
            </label><br>
            
            <label>
                <input type="checkbox" name="products[]" value="Royal"> Royal - ₱20
            </label><br>
            
            <label>
                <input type="checkbox" name="products[]" value="Pepsi"> Pepsi - ₱15
            </label><br>
            
            <label>
                <input type="checkbox" name="products[]" value="Mountain Dew"> Mountain Dew - ₱20
            </label>
            
        </fieldset>

        <fieldset style="width: 500px;">
            <legend>Options</legend>
            
            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="Regular">Regular</option>
                <option value="Up-Size">Up-Size (add ₱5)</option>
                <option value="Jumbo">Jumbo (add ₱10)</option>
            </select>

            <label for="quantity">Qty:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" style="width: 140px;">
            &nbsp;
            <button type="submit" name="checkout">Checkout</button>
        
        </fieldset>
    </form>

    <?php
    if (isset($_REQUEST['checkout'])) {
        $prices = [
            "Coke" => 15,
            "Sprite" => 20,
            "Royal" => 20,
            "Pepsi" => 15,
            "Mountain Dew" => 20
        ];

        $selectedProducts = $_POST['products'] ?? [];
        $size = $_POST['size'] ?? 'Regular';
        $quantity = intval($_POST['quantity'] ?? 0);

        $sizeCost = 0;
        if ($size === "Up-Size") $sizeCost = 5;
        elseif ($size === "Jumbo") $sizeCost = 10;

        if (empty($selectedProducts)) {
            echo "<hr><p>No Selected Product, Try Again</p>";
        } else {

            $totalItems = 0;
            $totalAmount = 0;
            echo "<hr><p>Purchase Summary:</p><ul>";

            foreach ($selectedProducts as $product) {
                $productPrice = $prices[$product] + $sizeCost;
                $productTotal = $productPrice * $quantity;
                $totalAmount += $productTotal;
                $totalItems += $quantity;

                $pieceText = $quantity > 1 ? "pieces" : "piece";

                echo "<li>$quantity $pieceText of $size $product amounting to ₱$productTotal</li>";
            }

            echo "</ul>";
            echo "<p>Total Number of Items: $totalItems</p>";
            echo "<p>Total Amount: ₱$totalAmount</p>";
        }
    }
    ?>

</body>
</html>