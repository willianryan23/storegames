<?php
$usuario = "João";
$lista_jogos = [
    ["nome" => "Jogo da Velha", "descricao" => "Clássico jogo de lógica."],
    ["nome" => "Forca", "descricao" => "Acerte a palavra antes que seja tarde!"]
];
?>

<h2>Bem-vindo, <?= $usuario ?>!</h2>

<ul>
    <?php foreach ($lista_jogos as $jogo): ?>
        <li>
            <strong><?= $jogo["nome"] ?></strong> - <?= $jogo["descricao"] ?>
        </li>
    <?php endforeach; ?>
</ul>
