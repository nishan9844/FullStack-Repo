<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = $_COOKIE['theme'] ?? "light";

if ($theme === "dark") {
    $bg = "#000";
    $text = "#fff";
} else {
    $bg = "#fff";
    $text = "#000";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: <?= $bg ?>;
            color: <?= $text ?>;
            font-family: Arial;
        }
        a {
            color: <?= $text ?>;
            margin-right: 15px;
        }
    </style>
</head>
<body>

<h2>Welcome</h2>
<p>Student ID: <b><?= htmlspecialchars($_SESSION['student_id']) ?></b></p>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="preference.php">Change Theme</a>
    <a href="logout.php">Logout</a>
</nav>

<p>This page is protected using session-based authentication.</p>

</body>
</html>