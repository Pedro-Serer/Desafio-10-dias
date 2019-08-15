<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>TROVATA - ROMA VENDAS LTDA</title>
    <link rel="stylesheet" href="_css/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Acme|Roboto|Russo+One&display=swap" rel="stylesheet">

    <style>
      .editar:hover, .excluir:hover{
        transform: scale(.9);
      }

      #sim{
        background-color: green;
        color: white;
        border: 2px solid black;
        border-radius: 4px;
        padding-top: 6px;
        padding-bottom: 6px;
        padding-right: 16px;
        padding-left: 16px;
        font-family: 'Anton', sans-serif;
      }

      #nao{
        background-color: #FF0000;
        color: white;
        border: 2px solid black;
        border-radius: 4px;
        padding: 6px;
        font-family: 'Anton', sans-serif;
      }

      .r1{
        margin-left: 15%;
      }

      .r2{
        margin-left: 17%;

      }

      @media (min-width: 300px) and (max-width: 999px){
        .r1, .r2, .r3{
          margin-left: 0px;
          width: 100%;
        }
      }
    </style>
  </head>
  <body onload="load()" style="background-color: #f5fefd;">
    <div id="sidebar" class="w3-sidebar w3-hide-small w3-hide-medium w3-bar-block w3-top w3-anime-left" style="width: 15%; background-color: #0a0817;">
      <header class="w3-container w3-indigo">
        <h5 class="w3-center" style="cursor: pointer;">EMPRESAS.COM.BR</h5>
      </header>

      <a class="w3-bar-item w3-margin-top w3-text-white w3-button" href="roma_vendas.php" style="background-color: #4a4b4b;">ROMA VENDAS LTDA</a>
      <a class="w3-bar-item w3-margin-top w3-text-white w3-button" href="milano_vendas.php" style="background-color: #4a4b4b;">MILANO VENDAS OFFLINE LTDA</a>
      <a class="w3-bar-item w3-text-white w3-bottom" href="index.html" style="width: 10%;">Voltar</a>
    </div>

    <div id="sidebar1" class="w3-sidebar" style="width: 40%; background-color: #0a0817; display: none;">
      <header class="w3-container w3-indigo">
        <h5 class="w3-col m8" style="cursor: pointer;">EMPRESAS.COM.BR</h5>
        <button class="w3-button w3-right" onclick="document.getElementById('sidebar1').style.display='none'">&times;</button>
      </header>

      <a class="w3-bar-item w3-margin-top w3-text-white w3-button" href="roma_vendas.php" style="background-color: #4a4b4b;">ROMA VENDAS LTDA</a>
      <a class="w3-bar-item w3-margin-top w3-text-white w3-button" href="milano_vendas.php" style="background-color: #4a4b4b;">MILANO VENDAS OFFLINE LTDA</a>
      <a class="w3-bar-item w3-text-white" href="index.html" style="width: 10%; position: absolute; bottom: 0px; left: 13px;">Voltar</a>
    </div>

    <header class="w3-container w3-blue w3-margin-bottom rightside r1">
      <button id="hamburger" class="w3-button w3-hide-small w3-hide-medium w3-text-white" style="cursor: pointer; font-size: 21px;">&#9776;</button>
      <button id="hamburger1" class="w3-button w3-hide-large w3-text-white" style="cursor: pointer; font-size: 21px;">&#9776;</button>
    </header>

    <div class="w3-container rightside r2">
      <h3 style="font-family: 'Roboto', sans-serif;">ROMA VENDAS LTDA</h3>
    </div>

    <div class="w3-container w3-main w3-card rightside r3" style="margin-left: 17%;">
      <header class="w3-container w3-bar">
        <form method="post">
          <input id="pes" class="w3-input w3-bar-item w3-border w3-round w3-margin w3-mobile" type="text" name="pesquisa" placeholder="Pesquisar produtos" style="width: 25%;">
          <img src="_svg/search.svg" class="w3-bar-item w3-border w3-hide-small w3-round w3-margin" style="position: relative; top: 3px; right: 24px;">

          <span class="w3-bar-item w3-right w3-hide-large w3-hide-medium w3-mobile w3-margin-top">Ordenar por: </span>
          <select class="w3-bar-item w3-right w3-margin-top w3-mobile" name="order">
            <option value="1" selected>Nenhum</option>
            <option value="2">Código</option>
            <option value="3">Descrição</option>
          </select>
          <div class="w3-padding w3-hide-medium w3-hide-large">&nbsp</div>
        </form>
        <span><a href="inserir.php" class="w3-button w3-red w3-round w3-mobile w3-margin-top">Adicionar novo produto</a></span>
        <span class="w3-bar-item w3-right w3-hide-small w3-margin-top">Ordenar por: </span>
        <div class="w3-padding w3-hide-medium w3-hide-large">&nbsp</div>
      </header>

      <div id="modal" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content">
          <header class="w3-container w3-red w3-round">
            <p id="pid" class="w3-center" style="font-family: 'Roboto', sans-serif;"></p>
          </header>
          <div class="w3-container">
            <p style="font-family: 'Roboto', sans-serif;">Tem certeza que deseja remover este item?</p>
            <button id="sim" class="w3-button">Sim</button>
            <button id="nao" onclick="document.getElementById('modal').style.display = 'none'" class="w3-button">Cancelar</button>
          </div>
        </div>
      </div>

      <div id="lista" class="w3-container" style="overflow-x: scroll;"></div>

      <div class="w3-container w3-margin-top w3-margin-bottom">
        <div class="w3-bar w3-center">
          <a id="tras" class="w3-button">&laquo;</a>
          <span id="bar"></span>
          <a id="frente" class="w3-button">&raquo;</a>
        </div>
      </div>
    </div>

    <script src="_js/main.js"></script>
  </body>
</html>
