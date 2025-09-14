<?php

// Define o endereço do servidor do banco de dados.
$servidor = "localhost"; // servidor do banco de dados

// Define o nome de usuário para acessar o banco de dados.
$usuario = "root"; // usuário do banco de dados

// Define a senha do usuário do banco de dados.
$senha = "";

// Define o nome do banco de dados que será utilizado.
$bd = "storegames";

// Cria a conexão com o banco de dados usando os dados acima.
$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);
?>