<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    
    if ($username && $password) {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    }
}


if (isset($_SESSION['user'])) {
    echo "Welcome to Dashboard, " . htmlspecialchars($_SESSION['user']);
    echo '<br><a href="?logout=1">Logout</a>';
} else {
    ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php
}


if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: dashboard.php');
    exit;
}
?>