<?php
    include_once "header2.php";
    include "dbcon.php";

    if(!isset($_SESSION['id_user']))
    $message = '';
    if(isset($_POST["submit"]))
    {
      if (!empty($_POST['username']) && !empty($_POST['password'])&& !empty($_POST['email'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        echo $username;

        $sql = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password')";
        $stmt = $connexion->query($sql);
        
        if ($stmt) {
            $message = 'Inscription réussie!';
            header('Location: login.php');
            exit;
        } else {
            $message = 'Erreur lors de l\'inscription.';
        }
    }
    else{
        $message = 'Les champs sont obligatoires';

    }
  }
?>
    <div class="dropdown-menu">
   <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>
      <form class="px-4 py-3" action="register.php" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com">
        </div>
        <div class="mb-3">
          <label for="userName" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="exampleDropdownFormEmail1" >
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
              Remember me
            </label>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
      </form>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">New around here? Sign up</a>
      <a class="dropdown-item" href="#">Forgot password?</a>
    </div>
    
   
  </body>
</html>