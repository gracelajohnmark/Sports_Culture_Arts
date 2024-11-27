<?php
session_start();

// Fetch the container data
$index = intval($_POST["index"]);
$container = $_SESSION['containers'][$index];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Container</title>
</head>

<body>
    <h1>Update Container</h1>

    <!-- Form to update container -->
    <form method="POST" action="test2.php">
        <input type="hidden" name="index" value="<?= $index ?>">

        <label for="width">Width:</label>
        <input type="text" id="width" name="width" value="<?= $container['width'] ?>" required><br><br>

        <label for="height">Height:</label>
        <input type="text" id="height" name="height" value="<?= $container['height'] ?>" required><br><br>

        <label for="bgColor">Background Color:</label>
        <input type="color" id="bgColor" name="bgColor" value="<?= $container['bgColor'] ?>" required><br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?= $container['content'] ?></textarea><br><br>

        <button type="submit" name="action" value="update">Update Container</button>
    </form>
</body>

</html>