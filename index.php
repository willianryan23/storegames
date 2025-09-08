<?php
include("banco.php");
include("header.php");

$sql = "SELECT * FROM games ORDER BY nome";
$sql = $conexao->query($sql);
?>

<h2>Jogos Disponíveis</h2>

<a href="cadastro_jogos.php" class="btn btn-primary mb-4">Cadastrar Novo Jogo</a>

<div class="row">
<?php
while ($linha = $sql->fetch_assoc()) {
    $nome = htmlspecialchars($linha["nome"]);
    $tipo = htmlspecialchars($linha["tipo"]);
    $link = htmlspecialchars($linha["link"]);
    $imagem = htmlspecialchars($linha["imagem"]);

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
?>
</div>

<?php include("footer.php"); ?>
