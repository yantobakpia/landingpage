<!DOCTYPE html>
<html>
<head>
    <title>Run Automated Updates</title>
</head>
<body>
    <h1>Run Automated Updates</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $token = $_POST["token"];
        $command = "python automated_updates.py run $token";
        $output = shell_exec($command);
        echo "<pre>$output</pre>";
    }
    ?>
    <form action="run_updates.php" method="POST">
        <label for="token">Enter your token:</label>
        <input type="text" id="token" name="token" required>
        <br>
        <input type="submit" value="Start Updates">
    </form>
</body>
</html>
