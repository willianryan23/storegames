
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade para dispositivos móveis -->
  <title>Store Games</title> <!-- Título exibido na aba do navegador -->
  <link rel="stylesheet" href="css/style.css"> <!-- Importa o CSS personalizado -->
</head>
</html>
<?php
// Inclui o cabeçalho da página (navbar, etc)
include 'header.php';
// Inclui o arquivo de conexão com o banco de dados
include 'banco.php';

// Exibe o formulário de login
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
  <!-- Botão de login, estilizado com a classe btn-entrar -->
  <a type='submit' class='btn btn-entrar' href='index.php'>Entrar</a>
</form>";

// Inclui o rodapé da página
include 'footer.php';
?>
