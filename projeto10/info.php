     <?php
     include "bd.php";
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





      <div style="border: 3px solid black; margin-top: 1%; background-color: #BEBEBE;">  
        <h3 class="text-center"><marquee scrollDelay=1><font color=black><DATA>Informática</DATA></em></font></marquee></h3>
      </div>


      <div style="margin-left: 2%; margin-right: 2%; margin-top: 2%">
        <div class="row">
          <div class="col-sm-3 col-xs-12 col-md-3">
            <div class="card mb-4" style="width: 18rem;">
              <img class="card-img-top" src="img/corei7.jpg" alt="Card image cap" height="200" width="239">
              <div class="card-body">
                <h5 class="card-title">Processador Intel core I7</h5>
                <a href="#" class="btn btn-primary">R$ 1.704,41<i class="fa fa-cart-arrow-down fa-2x"></i></a>
                <details>
                 <summary>Detalhes</summary> 
                 <p>Marca Intel, Modelo BX80684I78700K,Soquete LGA 1151, Litografia 14nm,Número de núcleos 6, Threads 12, Frequência 3,70 GHz, Frequência Turbo 4,70 GHz, Cache 12 MB, Velocidade do barramento 8 GT/s DMI3, TDP 95 W, Tamanho Máximo de Memória 64 GB, Tipos de memória DDR4-2666, Máximo de Canais de Memória 2</p>

               </details>


             </div>
           </div>
         </div>

         <div class="col-sm-3 col-xs-12 col-md-3">
          <div class="card mb-4" style="width: 18rem;" >
            <img class="card-img-top" src="img/corei5.jpg" alt="Card image cap" height="200" width="239" >
            <div class="card-body">
              <h5 class="card-title">Processador Intel Core i5</h5>
              <a href="#" class="btn btn-primary">R$ 768,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
              <details>
               <summary>Detalhes</summary> 
               <p>Processador Intel Core i5-8400 Coffee Lake 8a Geração, Cache 9MB, 2.8GHz (4.0GHz Max Turbo), LGA 1151 Intel UHD Graphics 630 - BX80684I58400</p>

             </details>


           </div>
         </div>
       </div>
       <div class="col-sm-6 col-xs-12 col-md-3">
        <div class="card mb-4" style="width: 18rem;">
          <img class="card-img-top" src="img/gtx1050.jpg" alt="Card image cap" height="200" width="239">
          <div class="card-body">
            <h5 class="card-title">Placa de Video VGA NVIDIA </h5>
            <a href="#" class="btn btn-primary">R$ 637,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
            <details>
             <summary>Detalhes</summary> 
             <p>Placa de Video VGA NVIDIA ASUS GEFORCE GTX 1050 2GB, Boost Clock 1518 MHz, DVI/HDMI/Display port/suport HDCP, DirectX 12, Expedition eSports EX-GTX1050-O2G</p>

           </details>

         </div>
       </div>
     </div>
     <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/videoamd.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Placa de Vídeo VGA AMD</h5>
          <a href="#" class="btn btn-primary">R$ 421,06  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Placa de Vídeo VGA AMD GIGABYTE RADEON R7 360 OC 2G Rev. 3.0 - GV-R736OC-2GD</p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/gamer1.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Computador Gamer</h5>
          <a href="#" class="btn btn-primary">R$ 1.902,24  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Computador Gamer G-Fire AMD A8-7600, 4GB, HD 500GB, Radeon R7 integrada, Linux - Ícarus LT HTAVA-R54 </p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/gamer2.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Computador Gamer</h5> 
          <a href="#" class="btn btn-primary">R$ 3.670,47  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Computador Gamer Rawar Armata Intel Core i3-7100, 8GB, HD 1TB, Geforce GTX1050TI - RW252PAZ</p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/gamer3.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
         <h5 class="card-title">Computador Gamer</h5> 
          <a href="#" class="btn btn-primary">R$ 3.168,12<i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Computador Gamer NTC AMD Ryzen 1200, 8GB, HD 1TB, GTX 1050, Windows 10 (Versão de Avaliação) - 6501</p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/gamer4.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Computador Gamer</h5> 
          <a href="#" class="btn btn-primary">R$ 2.368,12  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Computador Gamer G-Fire AMD FX8300, 8GB, HD 1TB, DVD-RW, Linux - HTAVA-66</p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/not1.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Notebook Gamer</h5>
          <a href="#" class="btn btn-primary">R$ 3.999,88  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Notebook Gamer Acer Intel Core I5-7300HQ, 8GB, 1TB, DDR4, NVIDIA GEFORCE GTX 1050 4GB, DDR5, 15,6´´ FULL HD, Windows 10 HOME - VX5-591G-54PG</p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/not2.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Notebook Gamer</h5> 
          <a href="#" class="btn btn-primary">R$ 7.599,90  <i class="fa fa-cart-arrow-down fa-2x"></i></a>

          <details>
           <summary>Detalhes</summary> 
           <p>Notebook Gamer MSI GT72 6QD Dominator G Intel Core i7-6820HK, NVIDIA GEFORCE GTX 970M, 16GB DDR4,128 SSD, 1TB, BD Writer , Tela 17.3</p>

         </details>
       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/mouse1.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Mouse Gamer</h5>
          <a href="#" class="btn btn-primary">R$ 246,94  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Mouse Gamer Logitech G403 RGB 12000DPI </p>

         </details>

       </div>
     </div>
    </div>
    <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/mouse2.jpg" alt="Card image cap" height="200" width="239">
        <div class="card-body">
          <h5 class="card-title">Mouse 2</h5>

          <a href="#" class="btn btn-primary">R$ 235,18  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Mouse Gamer Logitech Ultra-rápido G402 Hyperion Fury FPS 4000DPI Preto</p>

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