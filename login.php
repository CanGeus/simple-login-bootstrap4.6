<?php
include("conn.php");
session_start();

// Cek jika pengguna sudah login, maka redirect ke halaman index
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}


// Form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk memeriksa keberadaan pengguna
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($query);

  if ($result->num_rows == 1) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit;
  } else {
    // Jika tidak, tampilkan pesan error
    $error = "Username atau password salah.";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton,CanGeus and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.101.0">
  <title>Sign-in</title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/"> -->


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="icon" href="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <form class="form-signin" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-<?= date('Y'); ?> </p>
  </form>



</body>

</html>