<?php
session_start();

if ($_POST['submit'] == 'logout') {
  $_SESSION = [];
  session_destroy();
  session_start();
  session_regenerate_id();
  header('Location: ');
}

if ($_POST['submit'] == 'login') {
    $users = json_decode(file_get_contents('users.json'), true);

    $user = array_filter($users, function ($user) {
        if ($user['username'] == $_POST['password'] && $user['password'] == $_POST['password']) {
            return $user;
        }
    });

    if (count($user)) {
        $_SESSION['username'] = $_POST['username'];
        echo 'Selamat datang, ' . $user[0]['username'];
    } else {
        echo 'Login gagal';
    }
}
?>

<?php if (!isset($_SESSION['username']) && empty($_SESSION['username'])): ?>
  <form method="POST">
    <div>
      <input type="text" name="username" placeholder="Username">
    </div>
    <div>
      <input type="password" name="password" placeholder="Password">
    </div>
    <button name="submit" value="login">Login</button>
  </form>
<?php endif; ?>

<?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
  <form method="POST">
    <button name="submit" value="logout">Logout</button>
  </form>
<?php endif; ?>
