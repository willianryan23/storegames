<?php
include "header.php";
include "banco.php";

// Recebe a categoria selecionada
$categoria_id = isset($_GET['categoria_id']) ? intval($_GET['categoria_id']) : 0;

if ($categoria_id > 0) {
    // Busca jogos por categoria específica
    $sql = "SELECT g.*, c.nome as categoria_nome 
            FROM games g 
            INNER JOIN categoria c ON g.categoria_id = c.id 
            WHERE g.categoria_id = $categoria_id 
            ORDER BY g.nome";
} else {
    // Busca todos os jogos
    $sql = "SELECT g.*, c.nome as categoria_nome 
            FROM games g 
            LEFT JOIN categoria c ON g.categoria_id = c.id 
            ORDER BY g.nome";
}

$result = $conexao->query($sql);
$contador = $result->num_rows;
?>

<h2>Filtrar por Categoria</h2>

<form method="get" class="mb-4">
    <div class="row">
        <div class="col-md-6">
            <select name="categoria_id" class="form-control" onchange="this.form.submit()">
                <option value="0">Todas as categorias</option>
                <?php
                $sql_categorias = "SELECT * FROM categoria ORDER BY nome";
                $result_categorias = $conexao->query($sql_categorias);
                while ($categoria = $result_categorias->fetch_assoc()) {
                    $selected = ($categoria['id'] == $categoria_id) ? 'selected' : '';
                    echo "<option value='{$categoria['id']}' $selected>{$categoria['nome']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
</form>

<?php
if ($contador == 0) {
    echo "<div class='alert alert-warning'>Nenhum jogo encontrado para esta categoria.</div>";
} else {
    echo "<div class='row'>";
    while ($linha = $result->fetch_assoc()) {
        $id = $linha['id'];
        $nome = htmlspecialchars($linha['nome']);
        $tipo = htmlspecialchars($linha['tipo']);
        $link = htmlspecialchars($linha['link']);
        $imagem = htmlspecialchars($linha['imagem']);
        $categoria_nome = htmlspecialchars($linha['categoria_nome']);

        echo "
        <div class='col-md-4'>
          <div class='card mb-3'>
            <img src='$imagem' class='card-img-top' alt='$nome' style='width: 300px; height: 275px; object-fit: cover; margin: auto;'>
            <div class='card-body'>
              <h5 class='card-title'>$nome</h5>
              <p class='card-text'>Tipo: $tipo<br>Categoria: $categoria_nome</p>
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
    echo "</div>";
    echo "<div class='alert alert-info'>Encontrado(s) $contador jogo(s).</div>";
}
?>

<a href="index.php" class="btn btn-primary mt-3">Voltar</a>

<?php include "footer.php"; ?>