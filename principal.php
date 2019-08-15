<?php
  error_reporting(0);
  //Conexão e pesquisa no banco de dados
  $conectar         = mysqli_connect("127.0.0.1", "root", "", "trovata");
  $pesquisa_empresa = mysqli_query($conectar,
    "SELECT e.RAZAO_SOCIAL, c.DESCRICAO_CIDADE FROM empresa AS e JOIN cidade AS c ON e.EMPRESA = c.EMPRESA"
  );

//Inicialização de variáveis
  $c             = 0;
  $t             = 0;
  $fim           = mysqli_num_rows($pesquisa_empresa);
  $array_empresa = array();
  $array_cidade  = array();
  $link          = array(
    'roma_vendas.php',
    'milano_vendas.php'
  );

//O resultado da pesquisa é jogado em uma matriz
  while ($coluna = mysqli_fetch_array($pesquisa_empresa, MYSQLI_ASSOC))
  {
    $array_empresa[$c] = $coluna['RAZAO_SOCIAL'];
    $array_cidade[$c]  = $coluna['DESCRICAO_CIDADE'];
    $c++;
  }

//Criação do HTMl para a página principal
  for ($i=0; $i < $fim-1; $i++)
  {
    if($array_empresa[$i] != $array_empresa[$i+1])
    {
      $a =  "<a href='$link[0]'>";
      $a .= "<div class='w3-cell w3-mobile esq'>";
      $a .= " <div class='w3-card-2 w3-white'>";
      $a .= "    <div class='w3-container'>";
      $a .= "      <img src='_img/lado.jpg' alt='Imagem do serviço'>";
      $a .= "    </div>";
      $a .= "    <div class='w3-container'>";
      $a .= "      <h4>".utf8_encode($array_empresa[$i])."</h4>";
      $a .= "    </div>";
      $a .= " <div class='w3-container'>";

      while($t<$i+1)
      {
        $a .= "<p class='e'>".utf8_encode($array_cidade[$t])."</p>";
        $t++;
      }

      $a .= "</a>";
      $a .= " </div>";
      $a .= "  </div>";
      $a .= "</div>";

      $b = "<div class='w3-cell w3-mobile' style='padding-bottom: 74px;'></div>";
      $b .=  "<a href='$link[1]'>";
      $b .= " <div class='w3-card-2 w3-white'>";
      $b .= "<div class='w3-cell w3-mobile esq'>";
      $b .= "    <div class='w3-container'>";
      $b .= "      <img src='_img/lado.png' alt='Imagem do serviço'>";
      $b .= "    </div>";
      $b .= "    <div class='w3-container'>";
      $b .= "      <h4>".utf8_encode($array_empresa[$i+1])."</h4>";
      $b .= "    </div>";
      $b .= " <div class='w3-container'>";

      $d=$i+1;
      while($d<$fim)
      {
        $b .= "<p class='e'>".utf8_encode($array_cidade[$d])."</p>";
        $d++;
      }

      $b .= "</a>";
      $b .= " </div>";
      $b .= "  </div>";
      $b .= "</div>";

  }
}

  //Apresentação de resultados
  echo $a;
  echo $b;

  //Fecha conexão com o banco
  mysqli_close($conectar);
?>
