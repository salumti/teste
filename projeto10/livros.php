<?php 
    session_start();
  include "bd.php";
 ?>
 <!doctype html>
<html lang="pt-br">
<title>Brazilian Stores</title>
<head>
  <!-- Required meta tags -->
  <link rel="shortcut icon" href="icon/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/sketchy/bootstrap.min.css" rel="stylesheet" integrity="sha384-7ELRJF5/u1pkLd0W7K793Y7ZCb1ISE8FjEKiDAwHD3nSDbA2E9Txc423ovuNf1CV" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/projeto.css" />

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/projeto.js"></script>
  
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="index.php" style="font-family: 'Monoton', cursive; font-size: 150%;">Brazilian Stores</a>



    <ul class="nav nav-tabs mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
           <a class="dropdown-item" href="roupas.php">Roupas</a>
              <a class="dropdown-item" href="eletronicos.php">Eletrônicos</a>
              <a class="dropdown-item" href="livros.php">Livros</a>
              <a class="dropdown-item" href="info.php">Informática</a>
              <a class="dropdown-item" href="celulares.php">Celulares</a>
              <a class="dropdown-item" href="game.php">Games</a>
        </div>
        <li class="nav-item">

          <a class="nav-link active" href="#home"><i class="fa fa-shopping-cart "></i></a>
        </li>
      </li>
          <?php 
              $adm = "";
              if(isset($_SESSION['adm'])){
              $adm = $_SESSION['adm'];      
              } 
              if(isset($_COOKIE['adm'])){
              $adm = $_COOKIE['adm'];
              }
              if($adm == 'sim'){
              echo "
              <li>
                <div>
                  <a class='nav-link active' href='cadprod.php'>Cadastrar Produto</a>
                </div>
              </li>
                 ";
              }

            if(empty($_SESSION['email']) and empty($_COOKIE['email'])){
              echo "<li class='nav-item'>
                      <a class='nav-link active btn btn-light' data-toggle='modal' data-target='#myModal'>Login</a>
                    </li>";
            }
             $nome = "";
             $email = "";

             if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $nome = $_SESSION['nome'];
              }else if(isset($_COOKIE['email'])){
                $email = $_COOKIE['email'];
                $nome = $_COOKIE['nome'];
              } 
              if($nome != ""){
                echo "<li class='nav-item'>
                        <div>
                          <a class='nav-link active btn btn-light' href='sair.php'>Sair</a>
                        </div>
                      </li>
                      <li class='nav-item'>
                        <div>
                          <a class='nomeusu' href='perfil.php' title='Perfil $nome'>$nome,</a> você está online!
                        </div>
                      </li>";
              }
              
              
                    
          ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="pesquisa.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" size="30" name="p" required="">
          <button class="btn btn-primary my-2 my-sm-0 bg-dark " type="submit"><i class="fa fa-search"></i></button>
    </form>


  </nav>





  <div style="border: 3px solid black; margin-top: 1%; background-color: #BEBEBE;">  
    <h3 class="text-center"><marquee scrollDelay=1><font color=black><DATA>Livros disponíveis no Momento</DATA></em></font></marquee></h3>
  </div>


  <div style="margin-left: 2%; margin-right: 2%; margin-top: 2%">
    <div class="row">
      <div class="col-sm-3 col-xs-12 col-md-3">
        <div class="card mb-4" style="width: 18rem;">
          <img class="card-img-top" src="img/livro1.jpg" alt="Card image cap" height="260" width="239">
          <div class="card-body">
            <h5 class="card-title">A Arte de ligar o F#da-se</h5>
            <a href="#" class="btn btn-primary">R$ 22,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
            <details>
             <summary>Detalhes</summary> 
             <p>Mark manson não tem meandros ou meias palavras. Com um estilo honesto, divertido e incrivelmente perspicaz, ele se tornou popular escrevendo em seu blog o que as pessoas realmente precisam ouvir, pois só isso funciona para nos fazer evoluir pessoal e profissionalmente. Mora em Nova York.</p>

           </details>


         </div>
       </div>
     </div>

     <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/livro2.jpg" alt="Card image cap" height="260" width="239">
        <div class="card-body">
          <h5 class="card-title">Sapiens</h5>
          <a href="#" class="btn btn-primary">R$ 35,20  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Sapiens é realmente impressionante, de se ler num fôlego só. De fato, questiona nossas ideias preconcebidas a respeito do universo." (The Guardian) “...uma explosão em forma de livro, tão agradável de ler quanto perturbador.</p>

         </details>


       </div>
     </div>
   </div>
   <div class="col-sm-3 col-xs-12 col-md-3">
    <div class="card mb-4" style="width: 18rem;">
      <img class="card-img-top" src="img/livro3.jpg" alt="Card image cap" height="260" width="239">
      <div class="card-body">
        <h5 class="card-title">Seja f#da!</h5>
        <a href="#" class="btn btn-primary">R$ 23,50  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
        <details>
         <summary>Detalhes</summary> 
         <p>Aposto que você quer, no final da sua vida, olhar para trás, bater no peito com o coração cheio de felicidade, sem falsa modéstia, com plena convicção e serenidade, e dizer: minha vida foi FODA. Mas calma, encontrar este livro é só o começo. Agora, você precisa levá-lo com você. Com ele, você vai aprender comportamentos e atitudes necessários para conquistar, em todos os aspectos da sua vida, resultados incríveis.</p>

       </details>

     </div>
   </div>
 </div>
 <div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro4.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">O Poder do Hábito</h5>
      <a href="#" class="btn btn-primary">R$ 31,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Segundo o autor, a chave para se exercitar regularmente, perder peso, educar os filhos, tornar-se mais produtivo, criar empresas revolucionárias e alcançar o sucesso é entender como os hábitos funcionam. Ele procura mostrar que, ao dominar esta ciência, todos podem transformar suas empresas e suas vidas.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro5.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">MindSet</h5>
      <a href="#" class="btn btn-primary">R$ 26,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Carol S. Dweck, professora de psicologia na Universidade Stanford e especialista internacional em sucesso e motivação, desenvolveu, ao longo de décadas de pesquisa, um conceito fundamental: a atitude mental com que encaramos a vida, que ela chama de “mindset”, é crucial para o sucesso. Dweck revela de forma brilhante como o sucesso pode ser alcançado pela maneira como lidamos com nossos objetivos. O mindset não é um mero traço de personalidade, é a explicação de por que somos otimistas.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro6.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">Arrume sua Cama</h5> 
      <a href="#" class="btn btn-primary">R$ 21,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Dez lições de um almirante das forças especiais para mudar sua vida 
       Quando foi convidado para proferir o discurso da aula inaugural dos alunos de graduação da Universidade do Texas, o almirante William McRaven pensou em compartilhar suas lições sobre liderança. Afinal, em 37 anos de carreira na Marinha norte-americana, ele exerceu o comando em vários níveis – inclusive tendo sido o responsável pela missão que capturou Osama Bin Laden.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro7.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
     <h5 class="card-title">Como fazer amigos</h5> 
      <a href="#" class="btn btn-primary">R$ 21,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Carnegie nos ensina maneiras de conquistar as pessoas de uma maneira que ainda nos dias de hoje é muito válida. A leitura do livro é enriquecedora, nos leva a refletir sobre formas de abordagem que muitas vezes usamos sem perceber e que não trazem os efeitos desejados. O autor, sabiamente dá diversas dicas de como conduzir diversas situações e reverter o pensamento do interlocutor para que fique de acordo com o seu.Quanto à edição, a diagramação é muito boa, letras grandes; livro bastante confortável de manusear.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro8.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">Roube como um Artista</h5> 
      <a href="#" class="btn btn-primary">R$ 17,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Verdadeiro manifesto ilustrado de como ser criativo na era digital, Roube como um artista, do designer e escritor Austin Kleon, ganhou a lista dos mais vendidos do The New York Times e figurou no ranking de 2012 da rede Amazon ao mostrar  com bom humor, ousadia e simplicidade  que não é preciso ser um gênio para ser criativo, basta ser autêntico.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro9.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">O poder do Silêncio</h5> 
      <a href="#" class="btn btn-primary">R$ 14,70  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>O silêncio e a calma não são apenas a ausência de barulho e de conteúdo. São a dimensão mais profunda do nosso ser, a inteligência primordial, a consciência de que só podemos ser felizes Agora. O poder transformador do silêncio está em nos libertar de nossos pensamentos, medos e desejos, dissipando as tensões do passado e as expectativas em relação ao futuro. Só no presente podemos descobrir quem realmente somos, alcançando assim a paz e a alegria que estão dentro de nós. Neste livro, seguindo a tradição dos sutras indianos, Tolle optou por transmitir seus ensinamentos espirituais em forma de aforismos. São 200 textos curtos e inspiradores que abordam diversos temas, entre eles, o Agora, os relacionamentos, a morte e a eternidade.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro10.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">Mostre seu Trabalho</h5> 
      <a href="#" class="btn btn-primary">R$ 29,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>

      <details>
       <summary>Detalhes</summary> 
       <p>Depois de Roube como um artista, um manifesto irreverente e repleto de dicas bem-humoradas para ativar o potencial criativo, e Roube como um artista: o diário, o escritor e artista gráfico Austin Kleon ensina ao leitor como compartilhar sua criatividade e tornar seu trabalho conhecido na era digital. </p>

     </details>
   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro11.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">Segredos da Mente</h5>
      <a href="#" class="btn btn-primary">R$ 1.895,00  <i class="fa fa-shopping-cart "></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>O autor desta obra nos apresenta algumas dezenas de narrativas. São fatos reais, extraídos do dia a dia das centenas de pessoas por ele atendidas. Necessitadas de compreensão e carinho são encaminhadas e orientadas na busca da solução dos problemas que os afligem, acalmando-as e devolvendo-lhes a fé, a esperança e a coragem. </p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/livro12.jpg" alt="Card image cap" height="260" width="239">
    <div class="card-body">
      <h5 class="card-title">A Coragem de Ser</h5>

      <a href="#" class="btn btn-primary">R$ 490,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Primeiro lugar na lista do The New York Times.Brené Brown ousou tocar em assuntos que costumam ser evitados por causarem grande desconforto. Sua palestra a respeito de vulnerabilidade, medo, vergonha e imperfeição já teve mais de 25 milhões de visualizações.</p>

     </details>
   </div>
 </div>
</div>
</div>
</div>

<footer>
  <div class="footer-middle bg-dark" style="margin-top: 1%;">
    <div class="container">
      <div class="row">
       <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
         <h4>Contato</h4>
         <address>
           <ul class="list-unstyled">
             <li>
               City Hall<br>
               212  Street<br>
               Lawoma<br>
               735<br>
             </li>
             <li>
              Telefone: (21) 2222-2222
            </li>
          </ul>
        </address>
      </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <!--Column1-->
      <div class="footer-pad">
        <h4>Informações</h4>
        <ul class="list-unstyled">
          <li><a href="#">Website Tutorial</a></li>
          <li><a href="#">Accessibility</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Webmaster</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <!--Column1-->
      <div class="footer-pad">
        <h4>Redes Sociais</h4>
        <ul class="list-unstyled">
          <li><a href="https://www.facebook.com" target="_blank"> <i class="fa fa-facebook-official fa-3x" aria-hidden="true" style="float: left;"></i></li>
            <li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter fa-3x" aria-hidden="true" style="float: left;"></i></a></li>
            <li><a href="https://www.instagram.com/?hl=pt-br" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a></li>

          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="footer-bottom bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <!--Footer Bottom-->
        <p class="text-xs-center">&copy; Todos os direitos reservados.</p>
      </div>
    </div>
  </div>
</div>
</footer>



</html>
</body>
</html>