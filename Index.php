<?php
// Inclui o arquivo que contém as funções de autenticação
include_once ('models/metodos.php');

// Chamada da função para verificar autenticação
verificarAutenticacao();
?>
<?php

if (isset($_SESSION['codigoEmpresa']) && isset($_SESSION['nomeEmpresa'])) {
  $codigoEmpresa = $_SESSION['codigoEmpresa'];
  $nomeEmpresa = $_SESSION['nomeEmpresa'];

  // Definindo variáveis globais
  $GLOBALS['codigoEmpresaGlobal'] = $codigoEmpresa;
  $GLOBALS['nomeEmpresaGlobal'] = $nomeEmpresa;

  //echo "Código da Empresa Selecionada: " . htmlspecialchars($codigoEmpresa) . "<br>";
  //echo "Nome da Empresa Selecionada: " . htmlspecialchars($nomeEmpresa) . "<br>";
} else {
  echo "Nenhuma empresa foi selecionada.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DW Sistemas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include 'models/navbar.php'; // Inclua a classe NavBar
  
  $navBar = new NavBar(); // Instancie a classe NavBar
  
  // Renderize a barra de navegação
  $navBar->render();
  ?>


  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      background: linear-gradient(to bottom, #00008B, #87CEEB);
    }

    .table {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 15px;
      overflow: hidden;
      font-size: 0.9em;
    }
  </style>

  <form class="d-flex ms-auto me-2 mt-1" style="width: 35rem;">
    <input name="buscarvendas" class="form-control me-2" type="search" placeholder="Buscar Vendas" aria-label="Buscar">
    <button class="btn btn-sm btn-light" type="submit" id="btnbuscar">
      <img src="src/lupa.png" alt="lupa" width="30" height="30">
    </button>
  </form>

  <div class="container text-white">
    <h4 class="mt-3">Vendas Hoje</h4>
    <div style="overflow-x: auto;">
      <table class="table table-primary table-striped mt-3 table-hover table-bordered table-sm">
        <thead>
          <tr class='text-center'>
            <th scope="col">Código da Venda</th>
            <th scope="col">Cliente</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Total Pago</th>
            <th scope="col">Valor Total</th>
            <th scope="col">Forma de Pagamento</th>
            <th scope="col">Desconto</th>
            <th scope="col">Taxa</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include_once ('models/metodos.php');

          if (isset($_GET['buscarvendas']) && $_GET['buscarvendas'] !== '') {
            buscarvendas();
          } else {
            vendashoje();
          }
          ;

          ?>
        </tbody>
      </table>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="models/scripts.js"></script>

</body>

</html>