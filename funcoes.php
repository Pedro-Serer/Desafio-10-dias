<?php
  error_reporting(0);
  $conectar = mysqli_connect("$host", "$admin", "$senha", "$tabela");
  $c        = 0;

  //Verifica qual página veio a requisição, index é uma flag que indica qual empresa é
  if ($_SERVER['HTTP_REFERER'] == 'http://seuendereco/roma_vendas.php')
  {
    $indice = 1;
  } else
  {
    $indice = 2;
  }

  //Opções de ordenação
  if($_POST['order'] == 1)
  {
    $pesquisa_produto = mysqli_query($conectar,
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
        FROM produto AS prod JOIN grupo_produto AS gp_prod ON prod.GRUPO_PRODUTO = gp_prod.GRUPO_PRODUTO WHERE prod.empresa = $indice"
    );
  } elseif ($_POST['order'] == 2)
  {
    $pesquisa_produto = mysqli_query($conectar,
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
        FROM produto AS prod JOIN grupo_produto AS gp_prod ON prod.GRUPO_PRODUTO = gp_prod.GRUPO_PRODUTO WHERE prod.EMPRESA = '$indice' ORDER BY prod.PRODUTO"
    );
  } else
  {
    $pesquisa_produto = mysqli_query($conectar,
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
        FROM produto AS prod JOIN grupo_produto AS gp_prod ON prod.GRUPO_PRODUTO = gp_prod.GRUPO_PRODUTO WHERE prod.EMPRESA = '$indice' ORDER BY prod.DESCRICAO_PRODUTO"
    );
  }

  //Pesquisa e apresenta os dados do input
  if (isset($_POST['pesquisa'])) {
    $pesquisa = $_POST['pesquisa'];

    $pesquisa_produto = mysqli_query($conectar,
      "SELECT prod.EMPRESA,
          prod.PRODUTO,
          prod.DESCRICAO_PRODUTO,
          prod.APELIDO_PRODUTO,
          prod.GRUPO_PRODUTO,
          prod.SUBGRUPO_PRODUTO,
          prod.SITUACAO, prod.PESO_LIQUIDO,
          prod.CLASSIFICACAO_FISCAL,
          prod.CODIGO_BARRAS,
          prod.COLECAO,
          gp_prod.DESCRICAO_GRUPO_PRODUTO FROM
        produto AS prod JOIN grupo_produto AS gp_prod ON prod.GRUPO_PRODUTO = gp_prod.GRUPO_PRODUTO
        WHERE prod.DESCRICAO_PRODUTO LIKE '%$pesquisa%' AND prod.EMPRESA = '$indice' OR prod.APELIDO_PRODUTO = '$pesquisa' AND prod.EMPRESA = '$indice' OR prod.PRODUTO = '$pesquisa' AND prod.EMPRESA = '$indice' OR gp_prod.TIPO_COMPLEMENTO = '$pesquisa'
        AND prod.EMPRESA = '$indice'"
    );
  }

  echo "<table class='w3-table'>
          <thead>
            <tr class='w3-blue w3-text-white'>
              <th style='padding-left: 153px;'></th>
              <th class='w3-border-right w3-border-white'><span>EMPRESA</span></th>
              <th class='w3-border-right w3-border-white'><span>PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>DESCRICAO_PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>APELIDO_PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>GRUPO_PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>SUBGRUPO_PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>DESCRICAO_GRUPO_PRODUTO</span></th>
              <th class='w3-border-right w3-border-white'><span>SITUACAO</span></th>
              <th class='w3-border-right w3-border-white'><span>PESO_LIQUIDO</span></th>
              <th class='w3-border-right w3-border-white'><span>CLASSIFICACAO_FISCAL</span></th>
              <th class='w3-border-right w3-border-white'><span>CODIGO_BARRAS</span></th>
              <th class='w3-border-right w3-border-white'><span>COLECAO</span></th>
            </tr>
          </thead>
  ";

  while ($coluna = mysqli_fetch_array($pesquisa_produto, MYSQLI_ASSOC))
  {
    echo "
      <tr id='$c' class='pi $c' style='display: none'>
        <td>
          <form id='e$c' method='post' action='editar.php'><p onclick='editar(".$coluna['PRODUTO'].", this)' class='w3-col m5 l5 editar' style='cursor: pointer;'>
          <input type='hidden' name='att' value='".$coluna['PRODUTO']."'>Editar&nbsp<img src='_img/lapis.png'></p></form>
          <p onclick='excluir(".$coluna['PRODUTO'].")' class='w3-col m5 l5 excluir' style='cursor: pointer;'>Excluir&nbsp<img src='_img/excluir.png'></p>
        </td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['EMPRESA']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['DESCRICAO_PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['APELIDO_PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['GRUPO_PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['SUBGRUPO_PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['DESCRICAO_GRUPO_PRODUTO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['SITUACAO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['PESO_LIQUIDO']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['CLASSIFICACAO_FISCAL']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['CODIGO_BARRAS']."</span></td>
        <td class='w3-border-right w3-border-white td'><span>".$coluna['COLECAO']."</span></td>
      </tr>
    ";
    $c++;
  }
  echo "</table>";
  echo "<input id='colunas' type='hidden' value='".mysqli_num_rows($pesquisa_produto)."'>";
  mysqli_close($conectar);
?>
