<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Site de Jogos</title>
      <link rel="shortcut icon" href="imagens/logo1.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/sitejogos/index.php">StoreGames</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Início</a></li>
         <li class="nav-item"><a class="nav-link active" aria-current="page" href="cadastro_jogos.php">Cadastrar jogo</a></li>
         <li class="nav-item"><a class="nav-link active" aria-current="page" href="sobre_nos.php">Sobre nós</a></li>
        
      <form class="d-flex" role="search" action="buscar_jogos.php" method="post">
          <input class="form-control me-2" type="search" name="jogo" placeholder="Pesquise por jogos aqui" autocomplete="off" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
  </div>
</nav>
  <div class="container mt-4">
