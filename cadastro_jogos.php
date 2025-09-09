<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Inclui o cabeçalho da página (HTML, menu, etc)
include("header.php");

// insere as respostas do formulário no banco de dados

if (isset($_POST['adicionar'])) { // Verifica se o formulário de adicionar foi enviado
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $link = $_POST["link"];
    $imagem = $_POST["imagem"];

    $sql_insert = "INSERT INTO games (nome, tipo, link, imagem) VALUES ('$nome', '$tipo', '$link', '$imagem')"; // Monta o comando SQL para inserir o produto
    $conexao->query($sql_insert); // Executa o comando SQL no banco de dados

    // Redireciona para index.php após o cadastro
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
    <input type="text" id= "nome" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Tipo:</label>
    <input type="text" id="tipo" name="tipo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Link do Jogo:</label>
    <input type="url" id="link" name="link" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">URL da Imagem:</label>
    <input type="url" id="imagem" name="imagem" class="form-control" required>
  </div>
  

        <button type="submit" name="adicionar">Adicionar</button>
</form>

<?php
// Inclui o rodapé da página
include("footer.php");
?>
