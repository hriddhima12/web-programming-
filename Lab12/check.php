<?php
// Read the values sent from index.html
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$name = htmlspecialchars(trim($_POST["name"] ?? ""));    // protect against HTML injection
$age  = (int) ($_POST["age"] ?? 0);

if ($age < 18) {
    $message = "Hello, $name, you are not authorized to visit the site";
    $class   = "denied";
    $icon    = "&#128683;";      // no entry sign
} else {
    $message = "Welcome to this site";
    $class   = "allowed";
    $icon    = "&#127881;";      // party popper
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card <?php echo $class; ?>">
    <div class="emoji"><?php echo $icon; ?></div>
    <h2 class="message"><?php echo $message; ?></h2>
    <p class="sub">Name: <?php echo $name; ?> &nbsp;|&nbsp; Age: <?php echo $age; ?></p>
    <a class="btn" href="index.html">&larr; Go Back</a>
</div>

</body>
</html>
