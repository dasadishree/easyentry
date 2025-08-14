<?php
$db = new SQLite3('challenge.db');

// Check if form submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // WARNING: vulnerable to SQL injection intentionally
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $db->query($query);

    if($row = $result->fetchArray()){
        if($row['username'] === 'admin'){
            echo "<h2>Success! Flag: flag{sql_injection_rocks}</h2>";
        } else {
            echo "<h2>Welcome, {$row['username']}!</h2>";
        }
    } else {
        echo "<h2>Invalid login!</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Login</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="text" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
