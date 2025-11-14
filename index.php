

<?php
// Inclui o arquivo de conexão com o banco de dados
include("banco.php");

// Inclui o cabeçalho da página (navbar, etc)
include("header.php");

// Funcionalidade de apagar jogo
if (isset($_GET['apagar'])) { // Verifica se existe o parâmetro 'apagar' na URL
    $id = intval($_GET['apagar']); // Garante que o id seja um número inteiro
    $conexao->query("DELETE FROM games WHERE id = $id"); // Executa o comando para apagar o jogo do banco
    header("Location: index.php"); // Redireciona para evitar reenvio do GET
    exit; // Encerra o script
}

// Consulta todos os jogos cadastrados, ordenando pelo nome
$sql = "SELECT * FROM games ORDER BY nome";
$sql = $conexao->query($sql); // Executa a consulta e armazena o resultado
?>

<h2>Jogos Disponíveis</h2>
<!-- Botão para cadastrar novo jogo -->
<a href="cadastro_jogos.php" class="btn btn-cadastrar mb-4">Cadastrar Novo Jogo</a>

<div class='row' style="margin-bottom: 100px;">
<?php
// Verifica se há jogos cadastrados
if ($sql->num_rows == 0) {
    // Se não houver jogos, exibe uma mensagem informativa
    echo "<div class='col-12'><div class='alert alert-info'>Nenhum jogo cadastrado.</div></div>";
} else {
    // Se houver jogos, percorre cada registro e exibe as informações
    while ($linha = $sql->fetch_assoc()) {
        $id = $linha["id"]; // ID do jogo
        $nome = htmlspecialchars($linha["nome"]); // Nome do jogo (escapado para segurança)
        $tipo = htmlspecialchars($linha["tipo"]); // Tipo do jogo (escapado)
        $link = htmlspecialchars($linha["link"]); // Link do jogo (escapado)
        $imagem = htmlspecialchars($linha["imagem"]); // URL da imagem (escapado)

        // Exibe o card do jogo com imagem, nome, tipo, botão para jogar, editar e apagar
        echo "
        <div class='col-md-4'>
          <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome' style='width: 300px;  height: 275px; object-fit: cover; margin: auto;'>
            <div class='card-body'>
              <h5 class='card-title'>$nome</h5>
              <p class='card-text'>Tipo: $tipo</p>
              <div class='d-flex justify-content-between'>
              <div>
                  <a href='$link' target='_blank' class='btn btn-jogar'>Jogar</a>
                  <a href='editar_jogo.php?id=$id' class='btn btn-editar'>Editar</a>
                  <a href='index.php?apagar=$id' class='btn btn-apagar' onclick=\"return confirm('Tem certeza que deseja apagar este jogo?');\">Apagar</a>
                </div>
              </div>
            </div>
          </div>
        </div>";
    }
}
?>
</div>

<?php include("footer.php"); // Inclui o rodapé da página ?>