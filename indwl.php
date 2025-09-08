<?php
include("banco.php");

// Processa o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $link = $_POST["link"];
    $imagem = $_POST["imagem"]; // URL da imagem

    $stmt = $conexao->prepare("INSERT INTO games (nome, tipo, link, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $tipo, $link, $imagem);
    $stmt->execute();
    $stmt->close();
}

// Formulário para cadastro
echo '<form method="post" style="margin-bottom:30px;">
    <label>Nome do Jogo:</label><br>
    <input type="text" name="nome" required><br>
    <label>Tipo:</label><br>
    <input type="text" name="tipo" required><br>
    <label>Link do Jogo:</label><br>
    <input type="url" name="link" required><br>
    <label>URL da Imagem:</label><br>
    <input type="url" name="imagem" required><br>
    <button type="submit">Cadastrar</button>
</form>';

// Exibe os jogos cadastrados
$sql = "SELECT * FROM games ORDER BY nome";
$result = $conexao->query($sql);

while ($linha = $result->fetch_assoc()) {
    $nome = htmlspecialchars($linha["nome"]);
    $tipo = htmlspecialchars($linha["tipo"]);
    $link = htmlspecialchars($linha["link"]);
    $imagem = htmlspecialchars($linha["imagem"]);
    echo "<div style='margin:20px; border:1px solid #ccc; padding:10px;'>
            <img src='$imagem' alt='$nome' style='width:120px;'><br>
            <strong>$nome</strong><br>
            Tipo: $tipo<br>
            Link: <a href='$link' target='_blank'>$link</a>
          </div>";
}
?>