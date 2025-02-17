<?php
session_start();

// Initialize the load count if it doesn't exist
if (!isset($_SESSION['load_count'])) {
    $_SESSION['load_count'] = 0;
}

// Reset the counter if the reset button is clicked
if (isset($_POST['reset'])) {
    $_SESSION['load_count'] = 0;
    // After resetting, redirect to the same page to avoid form resubmission warning
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit(); // Make sure no further code is executed after redirect
}

// Increment the load count each time the page is loaded
$_SESSION['load_count']++;

// Get the current load count
$loadCount = $_SESSION['load_count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Load Counter</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the external CSS file -->
</head>
<body>

    <div class="container">
        <h1>Welcome to the Page Load Counter!</h1>
        <p>This is your <strong>page load count:</strong></p>
        <p class="count"><?php echo $loadCount; ?></p>
        <p>Every time you refresh the page, the count increases by 1.</p>

        <!-- Reset button to reset the load count -->
        <form method="POST">
            <button type="submit" name="reset" class="reset-btn">Reset Count</button>
        </form>
    </div>

</body>
</html>
