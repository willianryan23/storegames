<?php
include 'header.php';
include 'banco.php';

echo "<h2>Login</h2>
<form method='POST' action='login.php'>
  <div class='mb-3'>
    <label for='email' class='form-label'>E-mail:</label>
    <input type='email' name='email' class='form-control' required>
  </div>
  <div class='mb-3'>
    <label for='senha' class='form-label'>Senha:</label>
    <input type='password' name='senha' class='form-control' required>
  </div>
  <button type='submit' class='btn btn-primary'>Entrar</button>
</form>";

include 'footer.php';
?>
