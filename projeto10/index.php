    <?php
    session_start();
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
      

      <script>
        function conf(){
          senha = document.getElementById("senha").value;
          csenha = document.getElementById("csenha").value;
          if (senha != csenha){
            alert("As senhas não conferem!");
            document.getElementById("senha").value = "";
            document.getElementById("csenha").value = "";
            document.getElementById("senha").focus();
          }
        }
      </script>
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
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Entrar</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="resp1.php" class="cadastro">
                <p>
                  E-mail:<p><input type="email" name="email" size=40 required=""></p>
                </p>
                <p>
                  Senha:<p><input type="password" name="senha" size=40 required=""></p>
                  <input type="checkbox" name="conect" value="conect" style="margin-left: 20px;">Permanecer Conectado
                </p>
                
                <button type="submit" class="btn btn-info btn-lg">Logar</button>
                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2">Cadastre-se</button>
              </form>
            </div>
          </div>

        </div>
      </div>
      
      <!-- Modal -->
      <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Cadastre-se</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" action="resp2.php" class="cadastro">

                <p>
                  Nome Completo:<p><input type="text" name="nome" size=40 required="" /></p>
                </p>
                <p>
                  Identidade:<p><input type="text" name="identidade" size=40 required="" /></p>
                </p>
                <p>
                  CPF:<p><input type="text" name="cpf" size=40 required="" /></p>
                </p>
                <p>
                  Data de Nascimento:<p><input type="date" name="nascimento" min="1930-01-01" max="2000-02-22" size=40 required="" /></p>
                </p>
                <p>
                  Endereço:<p><input type="text" name="endereco" size=40 required="" /></p>
                </p>
                <p>
                  CEP:<p><input type="text" name="cep" placeholder="Somente números" size=40 required="" /></p>
                </p>
                <p>
                  Complemento:<p><input type="text" name="complemento" placeholder="Casa, apto, etc..." size=40 /></p>
                </p>
                <p>
                  Número:<p><input type="text" name="numero" placeholder="Número, lote, quadra, etc..." size=40 required="" /></p>
                </p>
                <p>
                  Bairro:<p><input type="text" name="bairro" size=40 required="" /></p>
                </p>
                <p>
                  Cidade:<p><input type="text" name="cidade" size=40 required="" /></p>
                </p>
                <p>
                  Estado:<p><input type="text" name="estado" size=40 required="" /></p>
                </p>
                <p>
                  E-mail:<p><input type="email" name="email" size=40 required="" /></p>
                </p>
                <p>
                  Senha:<p><input type="password" id="senha" name="senha" placeholder="Crie uma senha" size=40 required="" /></p>
                </p>
                <p>
                  Confirme a Senha:<p><input type="password" onblur="conf()" id="csenha" placeholder="Repita a senha" name="senha" size=40 required="" /></p>
                </p>
                <button type="submit" accesskey="13" class="btn btn-info btn-lg" onclick="conf()">Cadastrar</button>
              </form>
            </div>
          </div>

        </div>
      </div>

      
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
          <li data-target="#demo" data-slide-to="3"></li>
          <li data-target="#demo" data-slide-to="4"></li>
          <li data-target="#demo" data-slide-to="5"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner text-center" style="margin-top: 10px;">
          <div class="carousel-item active">
            <img  id="imgc" src="img/goku.jpg" alt="Blusa Goku">
            <img  id="imgc" src="img/camisetakratos.jpg" alt="Blusa Kratos">
            <img  id="imgc" src="img/deadpool.jpg" alt="Casaco Deadpool">
            <div class="carousel-caption">
             <h3><strong style="color:white;"><u>Roupas</u></strong></h3>
           </div>
         </div>
         <div class="carousel-item">
          <img  id="imgc" src="img/drone.jpg" alt="DJI Spark">
          <img  id="imgc" src="img/ele2.jpg" alt="Go Pro Hero 5">
          <img  id="imgc" src="img/ele3.jpg" alt="Microfone Rode">
          <div class="carousel-caption">
            <h3><strong style="color:black;"><u>Eletrônicos</u></strong></h3>
          </div>
        </div>
        <div class="carousel-item">
          <img  id="imgc" src="img/livro1.jpg" alt="A Sutil Arte de Ligar o F#da -se">
          <img  id="imgc" src="img/livro2.jpg" alt="Uma Breve História da Humanidade">
          <img  id="imgc" src="img/livro3.jpg" alt="Seja F#da!">
          <div class="carousel-caption">
            <h3><strong style="color:black;"><u>Livros</u></strong></h3>
          </div>
        </div>
        <div class="carousel-item">
          <img  id="imgc" src="img/info1.jpg" alt="GeForce Gtx 1050">
          <img  id="imgc" src="img/info2.jpg" alt="Notebook Gamer">
          <img  id="imgc" src="img/info3.jpg" alt="Mouse Deathadder">
          <div class="carousel-caption">
            <h3><strong style="color:black;"><u>Informática</u></strong></h3>
          </div>
        </div>
        <div class="carousel-item">
          <img  id="imgc" src="img/cel1.jpg" alt="Iphone 8">
          <img  id="imgc" src="img/cel2.jpg" alt="Galaxy S8 Plus">
          <img  id="imgc" src="img/cel3.jpg" alt="Moto G5 Plus">
          <div class="carousel-caption">
            <h3><strong style="color:black;"><u>Celular</u></strong></h3>
          </div>
        </div>
        <div class="carousel-item">
          <img  id="imgc" src="img/game1.jpg" alt="Farcry3">
          <img  id="imgc" src="img/game2.jpg" alt="Plants vs Zombies">
          <img  id="imgc" src="img/game3.jpg" alt="Gta 5">
          <div class="carousel-caption">
            <h3><strong style="color:black;"><u>Games</u></strong></h3>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon" style="background-color: black"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon" style="background-color: black"></span>
      </a>

    </div>

    <div style="border: 3px solid black; margin-top: 10px; background-color: #BEBEBE;">	
    	<h3 class="text-center"><marquee scrollDelay=1><font color=black><DATA>Destaques da Semana</DATA></em></font></marquee></h3>
    </div>
    
    
    
    <div class="card-deck">
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/info3.jpg" alt="Mouse Deathadder">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Mouse Deathadder</h4>
          <p class="card-text">Mouse Gamer Destiny 2 Razer DeathAdder Elite</p>
          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/dk.jpg" alt="Blusa Feminina">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Blusa Feminina</h4>
          <p class="card-text">A estampa é produzida com impressão digital (DTG) e o processo é realizado com o que há de mais moderno no mercado, em impressora específica para malharia,imprimindo a arte com qualidade de definição excepcional e textura mínima sob a malha. O toque é levinho e veste bem demais, parece um abraço.</p>
          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/farcry3.jpg" alt="Farcry3">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Far Cry 3</h4>
          <p class="card-text">Jogo onde você assume o papel de Jason Brody, um homem sozinho, preso em uma ilha tropical misteriosa. Neste paraíso selvagem, onde a ilegalidade e a violência são a única coisa certa, os jogadores determinam o desenrolar da história, as batalhas que lutarão com aliados ou inimigos e outras situações intensas que vão além do certo e errado. Como Jason Brody, os jogadores vão usar vários tipos de ataque em um mundo aberto, possibilitando ao jogador realizar as missões de maneiras bastante distintas, com muitos desafios pela frente, perigo e muita ação.</p>

          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
    </div>
    <div class="card-deck">
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/livro4.jpg" alt="O Poder do Hábito">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">O Poder do Hábito</h4>
          <p class="card-text">Segundo o autor, a chave para se exercitar regularmente, perder peso, educar os filhos, tornar-se mais produtivo, criar empresas revolucionárias e alcançar o sucesso é entender como os hábitos funcionam. Ele procura mostrar que, ao dominar esta ciência, todos podem transformar suas empresas e suas vidas.</p>
          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/casacocrossfire.png" alt="Casaco CrossFire">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Casaco CrossFire</h4>
          <p class="card-text">A estampa é produzida com impressão digital (DTG) e o processo é realizado com o que há de mais moderno no mercado, em impressora específica para malharia,imprimindo a arte com qualidade de definição excepcional e textura mínima sob a malha. O toque é levinho e veste bem demais,parece um abraço.</p>
          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
      <div class="card mb-4">
        <div class="view overlay">
          <img class="img-fluid" src="img/livro1.jpg" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">A Arte de Ligar o F#da-se</h4>
          <p class="card-text">Mark manson não tem meandros ou meias palavras. Com um estilo honesto, divertido e incrivelmente perspicaz, ele se tornou popular escrevendo em seu blog o que as pessoas realmente precisam ouvir, pois só isso funciona para nos fazer evoluir pessoal e profissionalmente. Mora em Nova York.</p>

          <button type="button" class="btn btn-light-blue btn-md">Saiba mais</button>
        </div>
      </div>
    </div>

    
    <footer>
    	<div class="footer-middle bg-dark" style="margin-top: 30px;">
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
              <li><a href="https://www.facebook.com" target="_blank"> <i class="fa fa-facebook-official fa-3x" aria-hidden="true" style="float: left;"></i></a></li>
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



  </body>
  </html>