var http = new XMLHttpRequest(),
lista    = document.getElementById('lista'),
bar      = document.getElementById('bar'),
pi       = document.getElementsByClassName('pi');

//Função que carrega apenas os dez primeiros resultados ao inciar a página
var x = [], y = [], butI = [], butF = [];
const load = function()
{
  x.push(0);
  y.push(10);

  setTimeout(function()
  {
    for (var i = 0; i < 10; i++)
    {
      document.getElementById(i).style.display = 'table-row';
    }
  }, 500);
}

http.onreadystatechange = function()
{
  if(this.readyState == 4 && this.status == 200)
  {
    lista.innerHTML = this.responseText;

    for (var i = 0; i < pi.length; i++)
    {
      if (i % 2 != 0)
      {
        pi[i].style.backgroundColor = '#eef4f4';
      }
    }

    var c = 1;

    //Criação dos botões da paginação
    while(c < Math.round(document.getElementById('colunas').value / 10))
    {
      let button = document.createElement('a'),
      text       = document.createTextNode(c++);
      button.setAttribute('id', 'pagBut'+(c-1));
      button.setAttribute('href', '#');
      button.setAttribute('class', 'w3-button');
      button.setAttribute('name', 'pagBut');
      button.setAttribute('onclick', "paginacao(this)");
      button.appendChild(text);
      bar.appendChild(button);
    }
    document.getElementsByTagName('a')[8].classList.add('w3-blue', 'pag');
  }

  var pagBut = document.getElementsByName('pagBut');

  for (var i = 1; i <= pagBut.length; i++) {
    if(i > 0 && i < 4){
      pagBut[i].style.display = 'inline-block';
    } else{
      pagBut[i].style.display = 'none';
    }
  }

  //Função que vai faz a paginação andar para a direita
    var count = 1, count2 = 1, xis;
    document.getElementById('frente').onclick = function()
    {
      let num = 4, init = 0, final, c, di, df;

      if(count < 1)
      {
        count = 1;
      }

      c = count++;
      init  = num * c;
      final = (num * c) + 4;

      butI.push(init);
      butF.push(final);

      for (; init < final+1; init++)
      {
        try{
          document.getElementById('pagBut'+init).style.display = 'inline-block';
          document.getElementById('tras').style.visibility = 'visible';
        } catch {
          this.style.visibility = 'hidden';
        }
      }

      for (var i=0; i < butI.length; i++)
      {
        di = butI[i-1];
        df = butF[i-1];
      }

      if(di === undefined || di < 1){di = 1; df = 4}

      for (; di <= df; di++) {
        document.getElementById('pagBut'+di).style.display = 'none';
      }
  };

  //Função que vai faz a paginação andar para a esquerda
  document.getElementById('tras').onclick = function()
  {
    let init = 0, final, di, df;
    var tam = butF.length;

    document.getElementById('frente').style.visibility = 'visible';
    count--;

    init  = Number(butI.slice(tam-1, tam));
    final = Number(butF.slice(tam-1, tam));

    if (init == 4 && final == 8)
    {
      if(Number(document.getElementsByName('pagBut').length) % 4 != 0)
      {
        init  = 4;
        final = Number(document.getElementsByName('pagBut').length);
      }

      this.style.visibility = 'hidden';
      butI.push(Number(butI.slice(tam-1, tam))-3);
      butF.push(Number(butF.slice(tam-1, tam))-4);
    } else
    {
      butI.push(Number(butI.slice(tam-1, tam))-4);
      butF.push(Number(butF.slice(tam-1, tam))-4);
    }
    di = Number(butI.slice(tam, tam+1));
    df = Number(butF.slice(tam, tam+1));

    for (; init < final+1; init++)
    {
      document.getElementById('pagBut'+init).style.display = 'none';
    }

    for (; di <= df; di++) {
      document.getElementById('pagBut'+di).style.display = 'inline-block';
    }
  };
}

http.open('POST', 'funcoes.php');
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.send('order=1');

//Função que fecha o sidebar
var click = 0, click1 = 0;

document.getElementById('hamburger1').addEventListener("click", function()
{
  click1++;

  if (click1 % 2 == 0)
  {
    document.getElementById('sidebar1').style.display = 'none';
  } else
  {
    document.getElementById('sidebar1').style.display = 'block';
  }
});

document.getElementById('hamburger').addEventListener("click", function()
{
  var rightside = document.getElementsByClassName('rightside');
  click++;

  if (click % 2 != 0)
  {
    document.getElementById('sidebar').style.display = 'none';

    for (var i = 0; i < rightside.length; i++)
    {
      rightside[i].style.marginLeft = '0px';
      rightside[i].style.width      = '100%';
    }
  } else
  {
    document.getElementById('sidebar').style.display = 'block';
    rightside[0].style.marginLeft = '15%';
    rightside[1].style.marginLeft = '17%';
    rightside[2].style.marginLeft = '16%';
    rightside[2].style.width      = '83%';
  }
});

//Função que conecta ao PHP
const atualiza = function(e, parm, pagina){
  var http = new XMLHttpRequest();

  http.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
      lista.innerHTML = this.responseText;

      for (var i = 0; i < pi.length; i++)
      {
        if (i % 2 != 0)
        {
          pi[i].style.backgroundColor = '#eef4f4';
        }
      }
    }
  }

  http.open('POST', pagina+'.php');
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send(`${parm}=${e}`);
}

//Atualiza os dados que vem do combo box
document.querySelector('select').addEventListener('change', function()
{
  atualiza(this.value, 'order', 'funcoes');

  setTimeout(function(){
    load();
  }, 100);
});

//Atualiza os dados que vem do input
document.getElementById('pes').addEventListener('input', function()
{
  atualiza(this.value, 'pesquisa', 'funcoes');
  setTimeout(function(){
    load();
  }, 100);
});

//Função que faz a paginação

const paginacao = function(pagina){
  var fim = (Number(pagina.innerHTML)*10), inicio = (Number(pagina.innerHTML)*10)-10, di, df;

  x.push(inicio);
  y.push(fim);

  for (; inicio < fim; inicio++) {
    document.getElementById(inicio).style.display = 'table-row';
  }

  for (var i=0; i < x.length; i++) {
    di = x[i-1];
    df = y[i-1];
  }

  for (; di < df; di++) {
    document.getElementById(di).style.display = 'none';
  }

  document.getElementsByClassName('pag')[0].classList.remove('w3-blue', 'pag');
  pagina.classList.add('w3-blue', 'pag');
}

//Função que exclui os dados da grid

const excluir = function(dado){
  document.getElementById('modal').style.display = 'block';
  document.getElementById('pid').innerHTML       = 'PRODUTO '+dado;

  document.getElementById('sim').onclick = function(){
    atualiza(dado, 'del', 'func');
    document.getElementById('modal').style.display = 'none';
  }
}

//Função que edita os dados da grid

const editar = function(dado, elemento){
  document.getElementById(elemento.parentNode.id).submit(dado);
}
