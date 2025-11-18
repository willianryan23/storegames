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
// Inclui o cabeçalho da página (navbar, etc)
include "header.php";
?>

<!-- Título da página de busca -->
<h2 class="text-center">Pesquisa de Jogos</h2>
<?php
// Recebe o termo pesquisado enviado pelo formulário
$jogo = $_POST["jogo"];
// Exibe o termo pesquisado para o usuário
echo "<h5 class='mb-4'>Termo pesquisado: <strong>$jogo</strong></h5>";

// Valida se o termo tem pelo menos 3 caracteres
if (strlen($jogo) < 3) {
    // Se for menor que 3, exibe alerta e retorna à página anterior
    echo "<script>
        alert('Digite no mínimo 3 caracteres');
        history.back();
    </script>";
    exit; // Encerra o script
}

// Inclui o arquivo de conexão com o banco de dados
include "banco.php";

// Monta a consulta SQL para buscar jogos pelo nome ou tipo, usando LIKE para busca parcial
// Busca por nome, tipo OU categoria (usando JOIN)
$sql = "SELECT g.*, c.nome as categoria_nome 
        FROM games g 
        LEFT JOIN categoria c ON g.categoria_id = c.id 
        WHERE g.nome LIKE '%$jogo%' OR g.tipo LIKE '%$jogo%' OR c.nome LIKE '%$jogo%' 
        ORDER BY g.nome";
// Executa a consulta
$result = $conexao->query($sql);
// Conta quantos registros foram encontrados
$contador = $result->num_rows;

// Se não encontrou nenhum jogo, exibe mensagem de aviso
if ($contador == 0) {
    echo "<div class='alert alert-warning'>Nenhum jogo encontrado.</div>";
} else {
    // Se encontrou jogos, exibe cada um em um card
    echo "<div class='row'>";
    while ($linha = $result->fetch_assoc()) {
        $id = $linha['id']; // ID do jogo
        $nome = htmlspecialchars($linha['nome']); // Nome do jogo (escapado para segurança)
        $tipo = htmlspecialchars($linha['tipo']); // Tipo do jogo (escapado)
        $link = htmlspecialchars($linha['link']); // Link do jogo (escapado)
        $imagem = htmlspecialchars($linha['imagem']); // URL da imagem (escapado)
        $tipo = htmlspecialchars($linha['tipo']);
        $categoria_nome = htmlspecialchars($linha['categoria_nome']);

        // Exibe o card do jogo com imagem, nome, tipo e botão para jogar
        echo "
        <div class='col-md-4'>
          <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome'>
            <div class='card-body'>
              <h5 class='card-title'>$nome</h5>
              <p class='card-text'>Tipo: $tipo<br>Categoria: $categoria_nome</p>
              <a href='$link' target='_blank' class='btn btn-primary'>Jogar</a>
            </div>
          </div>
        </div>";
    }
    echo "</div>";
    // Exibe o total de jogos encontrados
    echo "<div class='alert alert-info'>A pesquisa resultou em $contador jogo(s).</div>";
}
?>

<!-- Botão para voltar à página inicial -->
<a href="index.php" class="btn btn-primary mt-3">Voltar</a>

<?php
// Inclui o rodapé da página
include "footer.php";
?>