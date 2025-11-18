<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Verifica se o ID do jogo foi passado
if (isset($_GET['id'])) {
  // Obtém o ID do jogo e garante que seja um número inteiro
    $id = intval($_GET['id']);
    
    // Busca os dados do jogo usando prepared statement (CORREÇÃO)
    $categoria_id = $_POST['categoria_id'];
    $sql = "UPDATE games SET nome=?, tipo=?, link=?, imagem=?, categoria_id=? WHERE id=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssii", $nome, $tipo, $link, $imagem, $categoria_id, $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $jogo = $resultado->fetch_assoc();
    } else {
        echo "Jogo não encontrado!";
        exit;
    }
    $stmt->close();
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $link = $_POST['link'];
    $imagem = $_POST['imagem'];
    
    // Atualiza o jogo no banco de dados usando prepared statement (CORREÇÃO)
    $sql = "UPDATE games SET nome=?, tipo=?, link=?, imagem=? WHERE id=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome, $tipo, $link, $imagem, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php?sucesso=Jogo atualizado com sucesso");
        exit;
    } else {
        echo "Erro ao atualizar jogo: " . $conexao->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Jogo</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include("header.php"); ?>

<div class="container mt-4">
  <h2>Editar Jogo</h2>
  
  <form method="POST" action="editar_jogo.php">
    <input type="hidden" name="id" value="<?php echo $jogo['id']; ?>">
    
    <div class="mb-3">
      <label for="nome" class="form-label">Nome do Jogo:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($jogo['nome']); ?>" required>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Categoria:</label>
      <select id="categoria_id" name="categoria_id" class="form-control" required>
        <option value="">Selecione a categoria</option>
        <?php
        $sql_categorias = "SELECT * FROM categoria ORDER BY nome";
        $result_categorias = $conexao->query($sql_categorias);
        while ($categoria = $result_categorias->fetch_assoc()) {
          $selected = ($categoria['id'] == $jogo['categoria_id']) ? 'selected' : '';
          echo "<option value='{$categoria['id']}' $selected>{$categoria['nome']}</option>";
        }
        ?>
      </select>
    </div>
    
    <div class="mb-3">
      <label for="link" class="form-label">Link do Jogo:</label>
      <input type="url" class="form-control" id="link" name="link" value="<?php echo htmlspecialchars($jogo['link']); ?>" required>
    </div>
    
    <div class="mb-3">
      <label for="imagem" class="form-label">URL da Imagem:</label>
      <input type="url" class="form-control" id="imagem" name="imagem" value="<?php echo htmlspecialchars($jogo['imagem']); ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<?php include("footer.php"); ?>
</body>
</html>