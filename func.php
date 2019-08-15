<?php
  error_reporting(0);

  //Inicialização de variáveis
  $produto_del = $_POST['del'];

  $produto_emp = $_POST['empresa'];
  $produto_pro = $_POST['prodProd'];
  $produto_des = $_POST['descProd'];
  $produto_ape = $_POST['apelidProd'];
  $produto_grp = $_POST['grpProd'];
  $produto_sub = $_POST['subgrpProd'];
  $produto_sit = $_POST['situacao'];
  $produto_liq = $_POST['pesoLiq'];
  $produto_cla = $_POST['classFiscal'];
  $produto_cod = $_POST['codBarras'];
  $produto_col = $_POST['colecao'];
  $produto_ant = $_POST['anterior'];

  //Função que insere dados
  function inserir($emp, $pro, $des, $ape, $grp, $sub, $sit, $liq, $cla, $cod, $col)
  {
    $conectar = mysqli_connect("$host", "$admin", "$senha", "$tabela");
    $q = mysqli_query($conectar,
      "INSERT INTO PRODUTO VALUES ('$emp', '$pro', '$des', '$ape', '$grp','$sub', '$sit', '$liq', '$cla', '$cod', '$col')"
    );

    if(!$q)
    {
      echo "
        <div class='w3-modal-content'>
          <header class='w3-container w3-red w3-round'>
            <p class='w3-center' style='font-family: 'Roboto', sans-serif;'> ERRO!</p>
          </header>
          <div class='w3-container'>
            <p style='font-family: 'Roboto', sans-serif;'>Erro não identificado, por favor tente novamente!</p>
          </div>
        </div>
      ";
    } else
    {
      echo "
        <div class='w3-modal-content'>
          <header class='w3-container w3-green w3-round'>
            <p class='w3-center' style='font-family: 'Roboto', sans-serif;'> SUCESSO!</p>
          </header>
          <div class='w3-container'>
            <p style='font-family: 'Roboto', sans-serif;'>Dados cadastrados com tremendo sucesso!</p>
          </div>
        </div>
      ";
    }
    mysqli_close($conectar);
  }

  //Função que atualiza os dados
  function alterar($emp, $pro, $des, $ape, $grp, $sub, $sit, $liq, $cla, $cod, $col, $ant){
    $conectar = mysqli_connect("127.0.0.1", "root", "", "trovata");
    $q = mysqli_query($conectar,
      "UPDATE PRODUTO SET produto.EMPRESA              = '$emp',
                          produto.PRODUTO              = '$pro',
                          produto.DESCRICAO_PRODUTO    = '$des',
                          produto.APELIDO_PRODUTO      = '$ape',
                          produto.GRUPO_PRODUTO        = '$grp',
                          produto.SUBGRUPO_PRODUTO     = '$sub',
                          produto.SITUACAO             = '$sit',
                          produto.PESO_LIQUIDO         = '$liq',
                          produto.CLASSIFICACAO_FISCAL = '$cla',
                          produto.CODIGO_BARRAS        = '$cod',
                          produto.COLECAO              = '$col'
                          WHERE produto.PRODUTO = '$ant' LIMIT 1"
    );

    if(!$q)
    {
      echo "
        <div class='w3-modal-content'>
          <header class='w3-container w3-red w3-round'>
            <p class='w3-center' style='font-family: 'Roboto', sans-serif;'> ERRO!</p>
          </header>
          <div class='w3-container'>
            <p style='font-family: 'Roboto', sans-serif;'>Erro não identificado, por favor tente novamente!</p>
          </div>
        </div>
      ";
    } else
    {
      echo "
        <div class='w3-modal-content'>
          <header class='w3-container w3-green w3-round'>
            <p class='w3-center' style='font-family: 'Roboto', sans-serif;'> SUCESSO!</p>
          </header>
          <div class='w3-container'>
            <p style='font-family: 'Roboto', sans-serif;'>Dados atualizados com tremendo sucesso!</p>
          </div>
        </div>
      ";
    }

    mysqli_close($conectar);
  }

  //Função que deleta o produto
  function deletar($produto)
  {
    $conectar = mysqli_connect("127.0.0.1", "root", "", "trovata");
    $q = mysqli_query($conectar,
      "DELETE FROM produto WHERE produto.PRODUTO = '$produto' LIMIT 1"
    );

    mysqli_close($conectar);
  }

  //Função que cria os valores do combobox
  function combobox(){
    $conectar = mysqli_connect("127.0.0.1", "root", "", "trovata");
    $q = mysqli_query($conectar,
      "SELECT grupo_produto.GRUPO_PRODUTO, DESCRICAO_GRUPO_PRODUTO FROM GRUPO_PRODUTO"
    );

    while ($coluna = mysqli_fetch_array($q, MYSQLI_ASSOC))
    {
      echo "<option value='".$coluna['GRUPO_PRODUTO']."'>".$coluna['DESCRICAO_GRUPO_PRODUTO']."</option>";
    }
    mysqli_close($conectar);
  }


  //Verifica de qual página vem os dados para poder aplicar devida função
  if ($_SERVER['HTTP_REFERER'] == 'http://127.0.0.1/Teste/trovata/inserir.php')
  {
    inserir($produto_emp, $produto_pro, $produto_des, $produto_ape, $produto_grp, $produto_sub, $produto_sit, $produto_liq, $produto_cla, $produto_cod, $produto_col);
  }

  if ($_SERVER['HTTP_REFERER'] == 'http://127.0.0.1/Teste/trovata/editar.php')
  {
    alterar($produto_emp, $produto_pro, $produto_des, $produto_ape, $produto_grp, $produto_sub, $produto_sit, $produto_liq, $produto_cla, $produto_cod, $produto_col, $produto_ant);
  }

  //Função que mostra os dados na tela de update
  function mostra_dados($indice)
  {
    $conectar = mysqli_connect("127.0.0.1", "root", "", "trovata");
    $query    = mysqli_query($conectar,
      "SELECT prod.EMPRESA,
          prod.PRODUTO,
          prod.DESCRICAO_PRODUTO,
          prod.APELIDO_PRODUTO,
          prod.GRUPO_PRODUTO,
          prod.SUBGRUPO_PRODUTO,
          prod.SITUACAO,
          prod.PESO_LIQUIDO,
          prod.CLASSIFICACAO_FISCAL,
          prod.CODIGO_BARRAS,
          prod.COLECAO,
          gp_prod.DESCRICAO_GRUPO_PRODUTO
        FROM produto AS prod JOIN grupo_produto AS gp_prod ON prod.GRUPO_PRODUTO = gp_prod.GRUPO_PRODUTO WHERE prod.PRODUTO = '$indice'"
    );

    $coluna = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $produto_emp = $coluna['EMPRESA'];
    $produto_pro = $coluna['PRODUTO'];
    $produto_des = $coluna['DESCRICAO_PRODUTO'];
    $produto_ape = $coluna['APELIDO_PRODUTO'];
    $produto_grp = $coluna['GRUPO_PRODUTO'];
    $produto_drp = $coluna['DESCRICAO_GRUPO_PRODUTO'];
    $produto_sub = $coluna['SUBGRUPO_PRODUTO'];
    $produto_sit = $coluna['SITUACAO'];
    $produto_liq = $coluna['PESO_LIQUIDO'];
    $produto_cla = $coluna['CLASSIFICACAO_FISCAL'];
    $produto_cod = $coluna['CODIGO_BARRAS'];
    $produto_col = $coluna['COLECAO'];

    mysqli_close($conectar);

    return array($produto_emp, $produto_pro, $produto_des, $produto_ape, $produto_grp, $produto_drp, $produto_sub, $produto_sit, $produto_liq, $produto_cla, $produto_cod, $produto_col);
  }

  //Chamada para função deletar
  deletar($produto_del);
?>
