<?php
session_start(); 
include '../db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username; 
            $_SESSION['id'] = $user['id']; 
            
            header("Location: ../Profil/profil.php");
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="halamansignin.css">
    <link rel="stylesheet" href="bubble/style.css">
    <title>Login</title>
</head>
<body>

<a href="../index.php">
  <button class="back-button"><b>></b></button>
</a>

<!-- Login Form -->
<div class="login-container">
    <form action="halamansignin.php" method="POST">
        <div class="form-item">
            <label>Username</label>
            <div class="input-wrapper">
                <input type="text" name="username" id="username" autocomplete="off" required />
            </div>
        </div>

        <div class="form-item">
            <label>Password</label>
            <div class="input-wrapper">
                <input type="password" name="password" id="password" autocomplete="off" required />
                <button type="button" id="eyeball1">
                    <div class="eye"></div>
                </button>
                <div id="beam1"></div>
            </div>
        </div>

        <button type="submit" id="submit" name="login">Masuk</button>
    </form>
    <a href="halamansignup.php" class="signuplink">Belum punya akun?</a>

    <!-- Display error message -->
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>

<audio id="click-sound" src="/BGM/mouse.mp3" preload="auto"></audio>

<script src="../BGM/Clicksfx.js"></script>
<script src="halamansignin.js"></script>
<script src="bubble/script.js"></script>

</body>
</html>
