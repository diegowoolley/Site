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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="models/scripts.js"></script>



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
      position: fixed;
      top: 0;
      z-index: 1000;
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
      <div style="overflow-x: auto; overFlow-y: auto;">
        <table class="table table-striped mt-3 table-hover table-bordered table-sm" id="tb_itens">
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

            <!-- Adicione mais linhas conforme necessário -->
          </tbody>
        </table>
      </div>
    </div>

    <div class="container border p-2 mt-2">
      <div class="row justify-content-center">
        <div class="col-12 col-md-4 mb-3 text-center">
          <label class="form-label">Forma de Pagamento:</label>
          <select class="form-select mx-auto" aria-label="Forma de Pagamento" style="width: 12rem;"
            id="cbforma_pagamento" disabled>
            <option selected>Selecione...</option>
            <option value="1">Dinheiro</option>
            <option value="2">Cartão de Crédito</option>
            <option value="3">Cartão de Débito</option>
            <option value="4">Pix</option>
            <option value="5">Crédito Cliente</option>
          </select>
        </div>
        <div class="col-12 col-md-4 mb-3 text-center">
          <label class="form-label">Valor Pago:</label>
          <div class="input-group mx-auto" style="width: 10rem;">
            <input type="text" class="form-control moeda" aria-label="Valor Pago" id="txtvalor_pago" disabled>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4 text-center">
          <label class="form-label">Troco:</label>
          <div class="input-group mx-auto" style="width: 10rem;">
            <input type="text" class="form-control moeda" aria-label="troco" id="txtvencimento" disabled>
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
        <input type="text" class="form-control moeda" style="width: 10rem;" id="txtcartao" placeholder="0.00" disabled>
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

    <div class="row mt-3 text-center">
      <div class="col-6">
        <button class="btn btn-success" style="width: 10rem;">Concluir</button>
      </div>
      <div class="col-6">
        <button class="btn btn-warning" style="width: 10rem;">Cancelar</button>
      </div>
    </div>
  </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


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


  <script>




    $(function () {
      // Inicializa o plugin de autocompletar para o campo de entrada do cliente
      $("#txtcliente").autocomplete({
        source: function (request, response) {
          $.ajax({
            url: "models/buscarclientes.php",
            dataType: "json",
            data: {
              term: request.term
            },
            success: function (data) {
              response(data);
            }
          });
        },
        minLength: 2
      });

      var ultimoValorCliente = ""; // Variável para armazenar o último valor do campo de entrada

      // Adiciona um evento de perda de foco ao campo de entrada do cliente
      $("#txtcliente").on("blur", function () {
        var valorAtualCliente = $(this).val().trim(); // Obter o valor atual do campo de entrada

        // Verificar se o campo de pesquisa está vazio ou se o valor não mudou significativamente
        if (valorAtualCliente !== "" && valorAtualCliente !== ultimoValorCliente) {
          buscarClientes(); // Chama a função buscarClientes apenas se o campo não estiver vazio e houver uma mudança no valor
          ultimoValorCliente = valorAtualCliente; // Atualiza o último valor do campo de entrada
        }
      });

      // Inicializa o plugin de autocompletar para o campo de entrada do produto
      $("#txtproduto").autocomplete({
        source: function (request, response) {
          $.ajax({
            url: "models/buscarprodutos.php",
            dataType: "json",
            data: {
              term: request.term
            },
            success: function (data) {
              response(data);
            }
          });
        },
        minLength: 2
      });

      var ultimoValorProduto = ""; // Variável para armazenar o último valor do campo de entrada

      // Adiciona um evento de perda de foco ao campo de entrada do produto
      $("#txtproduto").on("blur", function () {
        var valorAtualProduto = $(this).val().trim(); // Obter o valor atual do campo de entrada

        // Verificar se o campo de pesquisa está vazio ou se o valor não mudou significativamente
        if (valorAtualProduto !== "" && valorAtualProduto !== ultimoValorProduto) {
          buscarProdutos(); // Chama a função buscarProdutos apenas se o campo não estiver vazio e houver uma mudança no valor
          ultimoValorProduto = valorAtualProduto; // Atualiza o último valor do campo de entrada
        }
      });

      // Inicializa o plugin de autocompletar para o campo de entrada do vendedor
      $("#txtvendedor").autocomplete({
        source: function (request, response) {
          $.ajax({
            url: "models/buscarfuncionario.php",
            dataType: "json",
            data: {
              term: request.term
            },
            success: function (data) {
              response(data);
            }
          });
        },
        minLength: 2
      });

      var ultimoValorVendedor = ""; // Variável para armazenar o último valor do campo de entrada

      // Adiciona um evento de perda de foco ao campo de entrada do vendedor
      $("#txtvendedor").on("blur", function () {
        var valorAtualVendedor = $(this).val().trim(); // Obter o valor atual do campo de entrada

        // Verificar se o campo de pesquisa está vazio ou se o valor não mudou significativamente
        if (valorAtualVendedor !== "" && valorAtualVendedor !== ultimoValorVendedor) {
          buscarVendedores(); // Chama a função buscarVendedores apenas se o campo não estiver vazio e houver uma mudança no valor
          ultimoValorVendedor = valorAtualVendedor; // Atualiza o último valor do campo de entrada
        }
      });
    });

    function buscarClientes() {
      var pesquisa = $("#txtcliente").val().trim(); // Obter o valor do input de pesquisa e remover espaços em branco

      // Fazer a requisição AJAX para buscar os clientes
      $.ajax({
        url: "models/buscarclientes.php",
        dataType: "json",
        data: {
          term: pesquisa
        },
        success: function (data) {
          if (data.length > 0) {
            $("#txtcliente").val(data[0]); // Preencher o campo com o nome do primeiro cliente retornado
            $("#txtproduto").focus(); // Transferir o foco para o próximo campo
          } else {
            // Se não houver resultados, exibir uma mensagem informando que o cliente não foi encontrado
            alert("Cliente não encontrado.");
            $("#txtcliente").val(""); // Limpar o campo de entrada
            $("#txtcliente").focus(); // Manter o foco no campo de entrada para nova pesquisa
          }
        },
        error: function () {
          // Em caso de erro na requisição AJAX, exibir uma mensagem de erro
          alert("Erro ao buscar clientes.");
        }
      });
    }

    function buscarProdutos() {
      var pesquisa = $("#txtproduto").val().trim(); // Obter o valor do input de pesquisa e remover espaços em branco

      // Fazer a requisição AJAX para buscar os produtos
      $.ajax({
        url: "models/buscarprodutos.php",
        dataType: "json",
        data: {
          term: pesquisa
        },
        success: function (data) {
          if (data.length > 0) {
            $("#txtproduto").val(data[0]); // Preencher o campo com o nome do primeiro produto retornado
            $("#txtquantidade").focus(); // Transferir o foco para o próximo campo
          } else {
            // Se não houver resultados, exibir uma mensagem informando que o produto não foi encontrado
            alert("Produto não encontrado.");
            $("#txtproduto").val(""); // Limpar o campo de entrada
            $("#txtproduto").focus(); // Manter o foco no campo de entrada para nova pesquisa
          }
        },
        error: function () {
          // Em caso de erro na requisição AJAX, exibir uma mensagem de erro
          alert("Erro ao buscar produtos.");
        }
      });
    }

    function buscarVendedores() {

      var pesquisa = $("#txtvendedor").val().trim(); // Obter o valor do input de pesquisa e remover espaços em branco

      // Fazer a requisição AJAX para buscar os vendedores
      $.ajax({
        url: "models/buscarfuncionario.php",
        dataType: "json",
        data: {
          term: pesquisa
        },
        success: function (data) {
          if (data.length > 0) {
            $("#txtvendedor").val(data[0]); // Preencher o campo com o nome do primeiro vendedor retornado
            
          } else {
            // Se não houver resultados, exibir uma mensagem informando que o vendedor não foi encontrado
            alert("Vendedor não encontrado.");
            $("#txtvendedor").val(""); // Limpar o campo de entrada
            $("#txtvendedor").focus(); // Manter o foco no campo de entrada para nova pesquisa
          }
        },
        error: function () {
          // Em caso de erro na requisição AJAX, exibir uma mensagem de erro
          alert("Erro ao buscar vendedores.");
        }
      });
    }






    $("#btnadicionar").click(function () {
      var contador = 1;
      // Verifica se um cliente foi selecionado
      if ($("#txtcliente").val() == "") {
        alert("Selecione um Cliente!");
        $("#txtcliente").focus();
        return;
      }

      // Verifica se um produto foi selecionado
      if ($("#txtproduto").val() == "") {
        alert("Selecione um produto!");
        $("#txtproduto").focus();
        return;
      }

      // Verifica se a quantidade é válida
      var quantidade = $("#txtquantidade").val();
      if ($.trim(quantidade) === "" || isNaN(quantidade) || parseFloat(quantidade) <= 0) {
        alert("Escolha uma quantidade válida para o produto");
        $("#txtquantidade").focus();
        return;
      }

      // Verifica se um vendedor foi selecionado
      if ($("#txtvendedor").val() == "") {
        alert("Selecione um vendedor");
        $("#txtvendedor").focus();
        return;
      }

      $.ajax({
        url: "models/inserirprodutos.php",
        dataType: "json",
        data: {
          term: $("#txtproduto").val()
        },
        success: function (data) {
          if (data.error) {
            alert(data.error);
          } else {
            var produto = data[0]; // Extrai o primeiro produto do array retornado
            // Adiciona a linha à tabela
            $("#tb_itens tbody").append(
              "<tr>" +
              "<td>" + contador++ + "</td>" + // ID
              "<td>" + produto.cod_produto + "</td>" + // Código do Produto
              "<td>" + $("#txtcliente").val() + "</td>" + // Cliente
              "<td>" + produto.nome_produto + "</td>" + // Produto
              "<td>" + quantidade + "</td>" + // Quantidade
              "<td>" + produto.categoria_produto + "</td>" + // Categoria
              "<td>R$ " + produto.valor_venda + "</td>" + // Preço Unitário
              "<td>" + $("#txtvendedor").val() + "</td>" + // Vendedor
              "<td>R$ " + (parseFloat(produto.valor_venda) * parseFloat(quantidade)).toFixed(2) + "</td>" + // Valor Total
              "</tr>"
            );

            // Limpa os campos do formulário após adicionar a linha
            $("#txtcliente").val("");
            $("#txtproduto").val("");
            $("#txtquantidade").val("");
            $("#txtvendedor").val("");
          }
        },
        error: function () {
          alert("Erro ao buscar dados do produto");
        }
      });
    });


  </script>




</body>

</html>