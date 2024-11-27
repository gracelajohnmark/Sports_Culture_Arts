<?php
// Initialize an array to store container data
$containers = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $width = htmlspecialchars($_POST["width"]);
    $height = htmlspecialchars($_POST["height"]);
    $bgColor = htmlspecialchars($_POST["bgColor"]);
    $content = htmlspecialchars($_POST["content"]);

    // Add the new container to the array
    $containers[] = [
        "width" => $width,
        "height" => $height,
        "bgColor" => $bgColor,
        "content" => $content,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic <main> Containers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <h1>Dynamic Container Generator</h1>

    <!-- Form for user input -->
    <form method="POST" action="">
        <label for="width">Width:</label>
        <input type="text" id="width" name="width" placeholder="e.g., 300px or 50%" required><br><br>

        <label for="height">Height:</label>
        <input type="text" id="height" name="height" placeholder="e.g., 200px" required><br><br>

        <label for="bgColor">Background Color:</label>
        <input type="color" id="bgColor" name="bgColor" required><br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" placeholder="Enter content for the container" required></textarea><br><br>

        <button type="submit">Add Container</button>
    </form>

    <h2>Preview in <main>:</h2>
    <main>
        <?php if (!empty($containers)): ?>
            <?php foreach ($containers as $container): ?>
                <div class="container"
                    style="width: <?= $container['width'] ?>; height: <?= $container['height'] ?>; background-color: <?= $container['bgColor'] ?>;">
                    <?= $container['content'] ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</body>

</html>