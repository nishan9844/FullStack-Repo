<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $theme = $_POST['theme'];
    setcookie("theme", $theme, time() + (86400 * 30));
    header("Location: dashboard.php");
    exit();
}

$currentTheme = $_COOKIE['theme'] ?? "light";
?>

<h2>Select Theme</h2>

<form method="POST">
    <select name="theme">
        <option value="light" <?= $currentTheme == "light" ? "selected" : "" ?>>Light Mode</option>
        <option value="dark" <?= $currentTheme == "dark" ? "selected" : "" ?>>Dark Mode</option>
    </select>
    <br><br>
    <button type="submit">Save Preference</button>
</form>