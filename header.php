
<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
  <title>Store Games</title> <!-- Título exibido na aba do navegador -->
  <link rel="shortcut icon" href="imagens/logo1.png" type="image/x-icon"> <!-- Ícone da aba -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsividade para dispositivos móveis -->
  <!-- Bootstrap CDN: framework CSS para layout responsivo e componentes visuais -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css"> <!-- Importa o CSS personalizado do projeto -->
</head>
<body>
  <!-- Navbar personalizada -->
  <nav class="navbar navbar-custom border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <!-- Logo e nome do site, clicável para a página inicial -->
      <a class="navbar-brand" href="index.php">StoreGames</a>
      <!-- Botão para abrir/fechar o menu em telas pequenas -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menu de navegação -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="cadastro_jogos.php">Cadastrar jogo</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="sobre_nos.php">Sobre nós</a></li>
        </ul>
        <!-- Formulário de busca de jogos -->
        <form class="d-flex" role="search" action="buscar_jogos.php" method="post">
          <input class="form-control me-2" type="search" name="jogo" placeholder="Pesquise por jogos aqui" autocomplete="off" aria-label="Search"/>
          <button class="btn btn-pesquisar" type="submit">Pesquisar</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Container principal para o conteúdo da página -->
  <div class="container mt-4">
