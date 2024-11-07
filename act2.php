<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    
    <h1>Peys App</h1>

    <form method="POST">
        <label for="size">Select Photo Size:</label>
        <input type="range" name="size" id="size" min="10" max="100" step="10" value="60">
        <br>
        
        <label for="cBorder">Select Border Color:</label>
        <input type="color" name="cBorder" id="cBorder" value="#000000"> 
        <br>

        <button type="submit" name="bProcess">Process</button>
        <br><br>

        <?php 
            if (isset($_REQUEST['bProcess'])) {
                $borderColor = $_REQUEST['cBorder'] ?? '#000000';
                $imgSize = $_REQUEST['size'] ?? '10';

                echo '<img src="img/images.png" alt="image" width="' . (empty($imgSize) ? '10' : $imgSize) . '%" height="' . (empty($imgSize) ? '10' : $imgSize) . '%" style="border:5px solid ' . (empty($borderColor) ? '#000000' : $borderColor) . ';">';
            }
        ?>
    </form>
</body>
</html>
