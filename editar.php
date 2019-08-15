<?php
  require_once "func.php";

  list($emp, $pro, $des, $ape, $grp, $drp, $sub, $sit, $liq, $cla, $cod, $col) = mostra_dados($_POST['att']);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>TROVATA - EDITAR</title>
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

      .r3{
        margin-left: 16%;
        width: 83%;
      }

      @media (min-width: 300px) and (max-width: 999px){
        .r1, .r2, .r3{
          margin-left: 0px;
          width: 100%;
        }
      }
    </style>
  </head>
  <body style="background-color: #f5fefd;">
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
      <h3 style="font-family: 'Roboto', sans-serif;">EDITAR PRODUTO</h3>
    </div>

    <div class="w3-container w3-main w3-card rightside r3">
      <header class="w3-container w3-bar">
      </header>

    <div id="modal" class="w3-animate-opacity">
      <div class="w3-container">
        <header class="w3-container w3-margin w3-round" style="background-color: #ecf5ee;">
          <p style="font-family: 'Roboto', sans-serif;">DADOS DO PRODUTO</p>
        </header>

        <form id="form" method="post">
          <div class="w3-container w3-margin">
            <span style="font-family: 'Roboto', sans-serif;"><b>EMPRESA</b></span><input id="empresa" type="number" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $emp;?>" name="empresa" style="width: 30%;">
            <span id="Empmsg" class="w3-text-red"></span><br></br>

            <div class="w3-row w3-round w3-padding-32" style="background-color: #ecf5ee;">
              <div class="w3-col m4 l4">
                <span style="font-family: 'Roboto', sans-serif;"><b>PRODUTO</b></span><input id="prodProd" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $pro;?>" name="prodProd">
                <input id="anterior" type="hidden" name="anterior" value="<?php echo $pro;?>">
                <span id="Prodmsg" class="w3-text-red"></span><br>
              </div>
              <div class="w3-col m3 l3">&nbsp</div>
              <div class="w3-col m4 l4">
                <span class="w3-col l4" style="font-family: 'Roboto', sans-serif;"><b>DESCRICAO_PRODUTO</b></span><input id="descProd" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $des;?>" name="descProd">
              </div>
            </div></br>

            <div class="w3-padding">&nbsp</div>


            <div class="w3-row w3-round w3-padding-32">
              <div class="w3-col m4 l4">
                <span class="w3-col l4" style="font-family: 'Roboto', sans-serif;"><b>APELIDO_PRODUTO</b></span><input id="apelidProd" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $ape;?>" name="apelidProd">
              </div>
              <div class="w3-col m3 l3">&nbsp</div>
              <div class="w3-col m4 l4">
                <span style="font-family: 'Roboto', sans-serif;"><b>GRUPO_PRODUTO</b></span>
                <select id="grpProd" class="" name="grpProd">
                  <option value="<?php echo $grp;?>" selected><?php echo $drp;?></option>
                  <?php combobox(); ?>
                </select>
              </div>
            </div></br>

            <div class="w3-padding">&nbsp</div>

            <div class="w3-row w3-round w3-padding-32" style="background-color: #ecf5ee;">
              <div class="w3-col m4 l4">
                <span style="font-family: 'Roboto', sans-serif;"><b>SUBGRUPO_PRODUTO</b></span><input id="subgrpProd" type="number" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $sub;?>" name="subgrpProd">
              </div>
              <div class="w3-col m3 l3">&nbsp</div>
              <div class="w3-col m4 l4">
                <span class="w3-col l4" style="font-family: 'Roboto', sans-serif;"><b>SITUACAO</b></span><input id="situacao" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $sit;?>" name="situacao">
              </div>
            </div></br></br>

            <div class="w3-row">
              <div class="w3-col m4 l4">
                <span style="font-family: 'Roboto', sans-serif;"><b>PESO_LIQUIDO</b></span><input id="pesoLiq" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $liq;?>" name="pesoLiq">
              </div>
              <div class="w3-col m3 l3">&nbsp</div>
              <div class="w3-col m4 l4">
                <span class="w3-col l4" style="font-family: 'Roboto', sans-serif;"><b>CLASSIFICACAO_FISCAL</b></span><input id="classFiscal" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $cla;?>" name="classFiscal">
              </div>
            </div></br></br>

            <div class="w3-row w3-round w3-padding-32" style="background-color: #ecf5ee;">
              <div class="w3-col m4 l4">
                <span style="font-family: 'Roboto', sans-serif;"><b>CODIGO_BARRAS</b></span><input id="codBarras" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $cod;?>" name="codBarras">
              </div>
              <div class="w3-col m3 l3">&nbsp</div>
              <div class="w3-col m4 l4">
                <span class="w3-col l4" style="font-family: 'Roboto', sans-serif;"><b>COLECAO</b></span><input id="colecao" type="text" class="w3-input w3-border w3-round w3-border-blue" value="<?php echo $col;?>" name="colecao">
              </div>
            </div></br>
            <span id="msg" class="w3-text-red"></span>
          </div>
        </div>
      </form>

      <div class="w3-container w3-margin-left w3-margin-bottom">
        <div class="w3-container">
          <button onclick="connection()" class="w3-button w3-black">Atualizar</button>
        </div>
      </div>
    </div>

    <script src="_js/main.js"></script>
    <script>
      //Função que conecta ao PHP
      function connection(){
          var empresa = document.getElementById('empresa').value,
          prodProd    = document.getElementById('prodProd').value,
          descProd    = document.getElementById('descProd').value,
          apelidProd  = document.getElementById('apelidProd').value,
          grpProd     = document.getElementById('grpProd').value,
          subgrpProd  = document.getElementById('subgrpProd').value,
          situacao    = document.getElementById('situacao').value,
          pesoLiq     = document.getElementById('pesoLiq').value,
          classFiscal = document.getElementById('classFiscal').value,
          codBarras   = document.getElementById('codBarras').value,
          colecao     = document.getElementById('colecao').value;
          anterior    = document.getElementById('anterior').value;

          if(empresa == ""){
            document.getElementById('Empmsg').innerHTML = "Empresa é obrigatório!";
            document.getElementById('msg').innerHTML = "Existem campos vazio!";
          } else if (descProd == "")
          {
            document.getElementById('Prodmsg').innerHTML = "Produto é obrigatório!";
            document.getElementById('msg').innerHTML = "Existem campos vazio!";
          }
          else{
            var http = new XMLHttpRequest();

             http.onreadystatechange = function(){
               if(this.readyState == 4 && this.status == 200)
               {
                 document.getElementById('modal').innerHTML = this.responseText;
               }
             };

             http.open('POST', 'func.php');
             http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             http.send(`empresa=${empresa}&prodProd=${prodProd}&descProd=${descProd}&apelidProd=${apelidProd}&grpProd=${grpProd}&subgrpProd=${subgrpProd}&situacao=${situacao}&pesoLiq=${pesoLiq}&classFiscal=${classFiscal}&codBarras=${codBarras}&colecao=${colecao}&anterior=${anterior}`);
          }
      }
    </script>
  </body>
</html>
