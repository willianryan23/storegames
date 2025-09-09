<?php
include "header.php";
?>

<h2 class="text-center">Pesquisa de Jogos</h2>
<?php
$jogo = $_POST["jogo"];
echo "<h5 class='mb-4'>Termo pesquisado: <strong>$jogo</strong></h5>";

if (strlen($jogo) < 3) {
    echo "<script>
        alert('Digite no mínimo 3 caracteres');
        history.back();
    </script>";
    exit;
}

include "banco.php";
$sql = "SELECT * FROM games WHERE nome LIKE '%$jogo%' OR tipo LIKE '%$jogo%' ORDER BY nome";
$result = $conexao->query($sql);
$contador = $result->num_rows;

if ($contador == 0) {
    echo "<div class='alert alert-warning'>Nenhum jogo encontrado.</div>";
} else {
    echo "<div class='row'>";
    while ($linha = $result->fetch_assoc()) {
        $id = $linha['id'];
        $nome = htmlspecialchars($linha['nome']);
        $tipo = htmlspecialchars($linha['tipo']);
        $link = htmlspecialchars($linha['link']);
        $imagem = htmlspecialchars($linha['imagem']);

        echo "
        <div class='col-md-4'>
          <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome'>
            <div class='card-body'>
              <h5 class='card-title'>$nome</h5>
              <p class='card-text'>Tipo: $tipo</p>
              <a href='$link' target='_blank' class='btn btn-primary'>Jogar</a>
            </div>
          </div>
        </div>";
    }
    echo "</div>";
    echo "<div class='alert alert-info'>A pesquisa resultou em $contador jogo(s).</div>";
}
?>

<a href="index.php" class="btn btn-primary mt-3">Voltar</a>

<?php
include "footer.php";
?>