<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
} else {
    // Handle error if no file is provided
    die('No file specified.');
}

$file = htmlspecialchars($_GET['file'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Result</title>
    <link rel="stylesheet" href="personal-data.css">
</head>

<body>
    <main>
        <div class="container-personal">
            <header class="header">
                <h3>Sports Kinetics Club - Form Result</h3>
            </header>

            <div id="result-section">
                <h4>Your form has been successfully generated!</h4>
                <p>You can download your PDF here:</p>
                <a href="pdfs/<?= $file ?>" download="Personal_Form.pdf">
                    <button class="submit-personal">Download PDF</button>
                </a>
            </div>
        </div>
    </main>
</body>

</html>