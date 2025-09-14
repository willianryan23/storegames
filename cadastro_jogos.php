
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store Games</title>
  <link rel="stylesheet" href="css/style.css"> <!-- Importa o CSS personalizado -->
</head>
</html>

<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Inclui o cabeçalho da página (HTML, menu, etc)
include("header.php");

// Verifica se o formulário de adicionar foi enviado
if (isset($_POST['adicionar'])) {
    // Recebe os dados enviados pelo formulário
    $nome = $_POST["nome"];      // Nome do jogo
    $tipo = $_POST["tipo"];      // Tipo do jogo
    $link = $_POST["link"];      // Link do jogo
    $imagem = $_POST["imagem"];  // URL da imagem do jogo

    // Monta o comando SQL para inserir o jogo no banco de dados
    $sql_insert = "INSERT INTO games (nome, tipo, link, imagem) VALUES ('$nome', '$tipo', '$link', '$imagem')";
    // Executa o comando SQL no banco de dados
    $conexao->query($sql_insert);

    // Redireciona para index.php após o cadastro para evitar reenvio do formulário
    header("Location: index.php");
    exit;
}
?>

<!-- Título da página -->
<h2>Cadastrar Jogo</h2>

<!-- Formulário para cadastro de novo jogo -->
<form method="post" class="mb-4">
  <div class="mb-3">
    <label class="form-label">Nome do Jogo:</label>
    <input type="text" id="nome" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Tipo:</label>
    <select type="text" id="tipo" name="tipo" class="form-control" required>
      <option value="">Selecione o tipo</option>
      <option value="Ação">Ação</option>
      <option value="Aventura">Aventura</option>
      <option value="RPG">RPG</option>
      <option value="Esporte">Esporte</option>
      <option value="Estratégia">Estratégia</option>
      <option value="Simulação">Simulação</option>
      <option value="Corrida">Corrida</option>
      <option value="Terror">Corrida infinita</option>
      <option value="Tiro">Tiro</option>
      <option value="Luta">Luta</option>
      <option value="Plataforma">Plataforma</option>
      <option value="Puzzle">Puzzle</option>
      <option value="Multiplayer">Multiplayer</option>
      </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Link do Jogo:</label>
    <input type="url" id="link" name="link" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL da Imagem:</label>
    <input type="url" id="imagem" name="imagem" class="form-control" required>
  </div>
  <!-- Botão para enviar o formulário -->
  <button type="submit" class='btn btn-adicionar' name="adicionar">Adicionar</button>
<a href="index.php" class='btn btn-adicionar' >Voltar</a>

</form>
<?php
// Inclui o rodapé da página
include("footer.php");
?>
