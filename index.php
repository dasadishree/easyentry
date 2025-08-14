<?php
$servername = "localhost";
$dbname = "challenge";
$username = "root"; // your DB username
$password = "";     // your DB password

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Vulnerable SQL query (intentionally)
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Welcome! Here is your flag: <b>flag{sql_injection_success}</b>";
    } else {
        echo "Login failed. Try again.";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"/><br>
    Password: <input type="text" name="password"/><br>
    <input type="submit" name="login" value="Login"/>
</form>
