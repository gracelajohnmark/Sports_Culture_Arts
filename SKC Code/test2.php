<?php
// Start the session to store container data
session_start();

// Initialize container data in the session if not already set
if (!isset($_SESSION['containers'])) {
    $_SESSION['containers'] = [];
}

// Handle adding a new container
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    if (count($_SESSION['containers']) < $_SESSION['max_containers']) {
        $width = htmlspecialchars($_POST["width"]);
        $height = htmlspecialchars($_POST["height"]);
        $bgColor = htmlspecialchars($_POST["bgColor"]);
        $content = $_POST["content"]; // No htmlspecialchars() for TinyMCE HTML

        $_SESSION['containers'][] = [
            "width" => $width,
            "height" => $height,
            "bgColor" => $bgColor,
            "content" => $content,
        ];
    } else {
        $error = "You cannot add more containers. The maximum limit is reached.";
    }
}


// Handle deleting a container
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $index = intval($_POST["index"]);
    if (isset($_SESSION['containers'][$index])) {
        array_splice($_SESSION['containers'], $index, 1);
    }
}

// Handle setting maximum number of containers
if (isset($_POST['action']) && $_POST['action'] === 'set_max') {
    $_SESSION['max_containers'] = intval($_POST["max_containers"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Containers</title>
    <script src="https://cdn.tiny.cloud/1/303jn2jjjkk46x4tla5j6sy904o9iqse4c15r879yb208n4l/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content', // Target the content textarea
            menubar: false,
            plugins: 'lists', // Add list plugin for indent/outdent
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | indent outdent | removeformat',
            indent_use_margin: true, // Use margins for indentation
            setup: (editor) => {
                editor.on('keydown', (event) => {
                    if (event.key === 'Tab') {
                        event.preventDefault(); // Prevent default tab behavior
                        if (event.shiftKey) {
                            // Shift+Tab for outdent
                            editor.execCommand('Outdent');
                        } else {
                            // Tab for indent
                            editor.execCommand('Indent');
                        }
                    }
                });
            }
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        main {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }

        .container {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            /* Ensure padding doesn't affect dimensions */
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            overflow-wrap: break-word;
            /* Prevent text overflow */
        }

        .container p {
            margin: 0 0 10px;
        }

        .container ul,
        .container ol {
            padding-left: 20px;
        }

        .container h1,
        .container h2,
        .container h3 {
            margin: 10px 0;
        }


        form {
            margin-bottom: 20px;
        }

        .form-container {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Manage Containers</h1>

    <!-- Form to set maximum number of containers -->
    <div class="form-container">
        <form method="POST" action="">
            <h3>Set Maximum Number of Containers</h3>
            <label for="max_containers">Max Containers:</label>
            <input type="number" id="max_containers" name="max_containers"
                value="<?= $_SESSION['max_containers'] ?? 20 ?>" required>
            <button type="submit" name="action" value="set_max">Set Max</button>
        </form>
    </div>

    <!-- Form to add a container -->
    <div class="form-container">
        <form method="POST" action="" novalidate>
            <h3>Add Container</h3>
            <?php if (isset($error))
                echo "<p style='color: red;'>$error</p>"; ?>
            <label for="width">Width:</label>
            <input type="text" id="width" name="width" placeholder="e.g., 200px" required><br><br>

            <label for="height">Height:</label>
            <input type="text" id="height" name="height" placeholder="e.g., 150px" required><br><br>

            <label for="bgColor">Background Color:</label>
            <input type="color" id="bgColor" name="bgColor" required><br><br>

            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Enter content for the container"
                required></textarea><br><br>

            <button type="submit" name="action" value="add">Add Container</button>
        </form>
    </div>

    <!-- Display the containers -->
    <h3>Preview in <main>:</h3>
    <main>
        <main>
            <?php if (!empty($_SESSION['containers'])): ?>
                <?php foreach ($_SESSION['containers'] as $index => $container): ?>
                    <div class="container" style="
                width: <?= htmlspecialchars($container['width']) ?>; 
                height: <?= htmlspecialchars($container['height']) ?>; 
                background-color: <?= htmlspecialchars($container['bgColor']) ?>;
                padding: 10px; 
                margin: 10px 0;
                box-sizing: border-box;
            ">
                        <?= $container['content'] ?> <!-- Display the container's content -->
                        <form method="POST" action="" style="margin-top: 10px;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" name="action" value="delete">Delete</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No containers to display.</p>
            <?php endif; ?>
        </main>

    </main>
</body>

</html>