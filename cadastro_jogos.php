<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Inclui o cabeçalho da página (HTML, menu, etc)
include("header.php");

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $link = $_POST["link"];
    $imagem = $_POST["imagem"];
}
?>

<!-- Título da página -->
<h2>Cadastrar Jogo</h2>

<!-- Formulário para cadastro de novo jogo -->
<form method="post" class="mb-4">
  <div class="mb-3">
    <label class="form-label">Nome do Jogo:</label>
    <input type="text" id= "nome" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Tipo:</label>
    <input type="text" name="tipo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Link do Jogo:</label>
    <input type="url" name="link" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL da Imagem:</label>
    <input type="url" name="imagem" class="form-control" required>
  </div>
  

  <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

<?php
// Inclui o rodapé da página
include("footer.php");
?>
