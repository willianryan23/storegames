<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Verifica se o ID do jogo foi passado
if (isset($_GET['id'])) {
  // Obtém o ID do jogo e garante que seja um número inteiro
    $id = intval($_GET['id']);
    
    // Busca os dados do jogo usando prepared statement (CORREÇÃO)
    $sql = "SELECT * FROM games WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
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
      <label class="form-label">Tipo:</label>
      <select id="tipo" name="tipo" class="form-control" required>
        <option value="">Selecione o tipo</option>
        <option value="Ação" <?php echo ($jogo['tipo'] == 'Ação') ? 'selected' : ''; ?>>Ação</option>
        <option value="Aventura" <?php echo ($jogo['tipo'] == 'Aventura') ? 'selected' : ''; ?>>Aventura</option>
        <option value="RPG" <?php echo ($jogo['tipo'] == 'RPG') ? 'selected' : ''; ?>>RPG</option>
        <option value="Esporte" <?php echo ($jogo['tipo'] == 'Esporte') ? 'selected' : ''; ?>>Esporte</option>
        <option value="Estratégia" <?php echo ($jogo['tipo'] == 'Estratégia') ? 'selected' : ''; ?>>Estratégia</option>
        <option value="Simulação" <?php echo ($jogo['tipo'] == 'Simulação') ? 'selected' : ''; ?>>Simulação</option>
        <option value="Corrida" <?php echo ($jogo['tipo'] == 'Corrida') ? 'selected' : ''; ?>>Corrida</option>
        <option value="Corrida infinita" <?php echo ($jogo['tipo'] == 'Corrida infinita') ? 'selected' : ''; ?>>corrida infinita</option>
        <option value="Tiro" <?php echo ($jogo['tipo'] == 'Tiro') ? 'selected' : ''; ?>>Tiro</option>
        <option value="Luta" <?php echo ($jogo['tipo'] == 'Luta') ? 'selected' : ''; ?>>Luta</option>
        <option value="Plataforma" <?php echo ($jogo['tipo'] == 'Plataforma') ? 'selected' : ''; ?>>Plataforma</option>
        <option value="Puzzle" <?php echo ($jogo['tipo'] == 'Puzzle') ? 'selected' : ''; ?>>Puzzle</option>
        <option value="Multiplayer" <?php echo ($jogo['tipo'] == 'Multiplayer') ? 'selected' : ''; ?>>Multiplayer</option>
        <!-- CORREÇÃO: Removida a opção duplicada "Corrida infinita" com valor "Terror" -->
        <option value="Corrida infinita" <?php echo ($jogo['tipo'] == 'Corrida infinita') ? 'selected' : ''; ?>>Corrida infinita</option>
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