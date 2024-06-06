<?php
// Inclui o arquivo que contém as funções de autenticação
include_once ('models/metodos.php');

// Chamada da função para verificar autenticação
verificarAutenticacao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DW Sistemas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      background: linear-gradient(to bottom, #00008B, #87CEEB);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .navbar {
      width: 100%;
    }

    .card {
      width: 90%;
      max-width: 1200px;
      margin: 60px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      overflow-y: auto;
      background: rgba(255, 255, 255, 0.8);

    }

    .table {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 15px;
      overflow: hidden;
      color: white;
      font-size: 0.9em;
    }
  </style>
</head>

<body>
  <?php
  include 'models/navbar.php'; // Inclua a classe NavBar
  
  $navBar = new NavBar(); // Instancie a classe NavBar
  
  // Renderize a barra de navegação
  $navBar->render();

  // Defina os valores das variáveis
  $numeroVenda = "Número da Venda:";
  $totalItens = "Total de Itens:";
  $valorTotal = "Valor Total:";
  ?>

  <div class="card p-4">
    <div class="container border p-2">
      <div class="row">
        <div class="col-12 col-md-4 mb-2 mb-md-0">
          <label class="form-label text-danger fw-bold" id="lblnumerovenda"><?php echo $numeroVenda; ?></label>
        </div>
        <div class="col-12 col-md-4 mb-3 mb-md-0">
          <label class="form-label text-danger fw-bold" id="lbltotalitens"><?php echo $totalItens; ?></label>
        </div>
        <div class="col-12 col-md-4">
          <label class="form-label text-danger fw-bold" id="lblvalortotal"><?php echo $valorTotal; ?></label>
        </div>
      </div>
    </div>

    <div class="container border p-2 mt-2">
      <div class="row">
        <div class="col-12 col-md-4 mt-2">
          <div class="mb-3">
            <label class="form-label">Cliente:</label>
            <input type="text" class="form-control" maxlength="80" id="txtcliente"
              placeholder="Digite para Buscar um Cliente">
          </div>
        </div>
        <div class="col-12 col-md-4 mt-2">
          <div class="mb-3">
            <label class="form-label">Produto:</label>
            <input type="text" class="form-control" maxlength="80" id="txtproduto"
              placeholder="Digite para Buscar um Produto">
          </div>
        </div>
        <div class="col-12 col-md-4 mt-2">
          <div class="mb-3">
            <label class="form-label">Quantidade:</label>
            <input type="number" class="form-control" maxlength="10" style="width: 4rem;" id="txtquantidade">
          </div>
        </div>
        <div class="col-12 col-md-4 mt-3">
          <div class="mb-3">
            <label class="form-label">Vendedor:</label>
            <input type="text" class="form-control" maxlength="80" id="txtvendedor"
              placeholder="Digite para Buscar um Vendedor">
          </div>
        </div>
        <div class="col-12 mt-2 text-center">
          <button class="btn btn-sm btn-success me-2" id="btnadicionar">Adicionar</button>
          <button class="btn btn-sm btn-danger me-2" id="btnexcluir">Excluir</button>
          <button class="btn btn-sm btn-warning" id="btnfecharvenda">Fechar Venda</button>
        </div>
      </div>
    </div>

    <div class="container border p-2 mt-2">
      <div style="overflow-x: auto;">
        <table class="table table-striped mt-3 table-hover table-bordered table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">ID</th>
              <th scope="col">Código do Produto</th>
              <th scope="col">Cliente</th>
              <th scope="col">Produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Categoria</th>
              <th scope="col">Preço Unitário</th>
              <th scope="col">Vendedor</th>
              <th scope="col">Valor Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aqui você pode adicionar mais linhas conforme necessário -->
            <tr class="text-center">
              <td>1</td>
              <td>123</td>
              <td>Cliente A</td>
              <td>Produto X</td>
              <td>5</td>
              <td>Categoria A</td>
              <td>R$ 10.00</td>
              <td>Vendedor 1</td>
              <td>R$ 50.00</td>
            </tr>
            <tr class="text-center">
              <td>2</td>
              <td>456</td>
              <td>Cliente B</td>
              <td>Produto Y</td>
              <td>3</td>
              <td>Categoria B</td>
              <td>R$ 15.00</td>
              <td>Vendedor 2</td>
              <td>R$ 45.00</td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
          </tbody>
        </table>
      </div>
    </div>

    <div class="container border p-2 mt-2">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
          <label class="form-label">Forma de Pagamento:</label>
          <select class="form-select mx-auto" aria-label="Forma de Pagamento" style="width: 12rem;" disabled
            id="cbforma_pagamento">
            <option selected>Selecione...</option>
            <option value="1">Dinheiro</option>
            <option value="2">Cartão de Crédito</option>
            <option value="3">Cartão de Débito</option>
            <option value="4">Pix</option>
            <option value="5">Crédito Cliente</option>
          </select>
        </div>
        <div class="col-12 col-md-6 text-center">
          <label class="form-label">Valor Pago:</label>
          <div class="input-group mx-auto" style="width: 10rem;">
            <input type="text" class="form-control moeda" aria-label="Valor Pago" id="txtvalor_pago" disabled>
          </div>
          <div class="col-12">
            <label class="form-label">Troco:</label>
            <div class="input-group mx-auto" style="width: 10rem;">
              <input type="text" class="form-control moeda" aria-label="Valor Pago" id="txttroco" disabled>
            </div>
          </div>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="col-md-2">
          <label class="form-label">Dinheiro:</label>
          <input type="text" class="form-control moeda" style="width: 10rem;" id="txtdinheiro" placeholder="0.00"
            disabled>
        </div>
        <div class="col-md-2">
          <label class="form-label">Pix:</label>
          <input type="text" class="form-control moeda" style="width: 10rem;" id="txtpix" placeholder="0.00" disabled>
        </div>
        <div class="col-md-2">
          <label class="form-label">Cartão:</label>
          <input type="text" class="form-control moeda" style="width: 10rem;" id="txtcartao" placeholder="0.00"
            disabled>
        </div>
        <div class="col-md-2">
          <label class="form-label">Desconto:</label>
          <input type="text" class="form-control" style="width: 10rem;" id="txtdesconto" placeholder="0%" disabled>
        </div>
        <div class="col-md-2">
          <label class="form-label">Taxa:</label>
          <input type="text" class="form-control" style="width: 10rem;" id="txttaxa" placeholder="0%" disabled>
        </div>
      </div>
    </div>
    <div class="row mt-3 text-center">
      <div class="col-6">
        <button class="btn btn-success" style="width: 10rem;">Concluir</button>
      </div>
      <div class="col-6">
        <button class="btn btn-warning" style="width: 10rem;">Cancelar</button>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
    <script src="models/scripts.js"></script>
    <script>
      // Converte o campo de entrada para formato de moeda
      var inputs = document.getElementsByClassName('moeda');
      for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function (e) {
          var valor = this.value.replace(/\D/g, '');
          valor = (valor / 100).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
          this.value = valor;
        });
      }
    </script>


</body>

</html>