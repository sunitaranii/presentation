<?php
    include 'dbinfo.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $itemName = $_POST['itemName'];

        $sql = "INSERT INTO buyinglist (itemName) VALUES ('$itemName')";

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("Feedback submitted successfully!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Presentation</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <section>
            <h1>Add New Item to list</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="itemName">Item Name:</label>
                    <input type="text" id="itemName" name="itemName" required>
                </div>
                
                <button type="submit">Add to list</button>
            </form>
        </section>
        <section>
            <h1>My Buying List</h1>
            <ul>
                <?php 
                    $resultData = "SELECT * FROM buyinglist";
                    $listData = mysqli_query($con, $resultData);
                    while ($result = mysqli_fetch_assoc($listData)) { ?>
                        <li><?php echo "Item name - " . $result['itemName']; ?></li>
                    <?php } 
                ?>
            </ul>
        </section>
    </body>
</html>