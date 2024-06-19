<?php
    include_once "header2.php";
    include("dbcon.php");

    $message = '';
    if(isset($_POST["signIn"]))
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $stmt = $connexion->query($sql);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['idUser'];
                header('Location: voiture/listVoitures.php');
            } else {
                $message = 'Mauvais identifiants';
            }
        }
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $message = "L'email et password est obligatoire";
        }
        
    }
?>
    <div class="dropdown-menu">
    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>
      <form class="px-4 py-3" action="login.php" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="pwd" >
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
              Remember me
            </label>
          </div>
        </div>
        <button type="submit" name="signIn" class="btn btn-primary">Sign in</button>
      </form>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">New around here? Sign up</a>
      <a class="dropdown-item" href="#">Forgot password?</a>
    </div>
    
      
    <!-- End Example Code -->
  </body>
</html>