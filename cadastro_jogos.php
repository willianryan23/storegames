
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
    $categoria_id = $_POST["categoria_id"];
    $sql_insert = "INSERT INTO games (nome, tipo, link, imagem, categoria_id) VALUES ('$nome', '$tipo', '$link', '$imagem', '$categoria_id')";
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
    <label class="form-label">Categoria:</label>
    <select id="categoria_id" name="categoria_id" class="form-control" required>
      <option value="">Selecione a categoria</option>
      <?php
      $sql_categorias = "SELECT * FROM categoria ORDER BY nome";
      $result_categorias = $conexao->query($sql_categorias);
      while ($categoria = $result_categorias->fetch_assoc()) {
        echo "<option value='{$categoria['id']}'>{$categoria['nome']}</option>";
      }
      ?>
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
