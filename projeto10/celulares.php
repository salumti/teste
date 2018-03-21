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
    <h3 class="text-center"><marquee scrollDelay=1><font color=black><DATA>Celulares disponíveis no Momento</DATA></em></font></marquee></h3>
  </div>


  <div style="margin-left: 2%; margin-right: 2%; margin-top: 2%">
    <div class="row">
      <div class="col-sm-3 col-xs-12 col-md-3">
        <div class="card mb-4" style="width: 18rem;">
          <img class="card-img-top" src="img/celular1.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
          <div class="card-body">
            <h5 class="card-title">Samsung J7 Prime</h5>
            <a href="#" class="btn btn-primary">R$ 949,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
            <details>
             <summary>Detalhes</summary> 
             <p>União perfeita entre design e tecnologia o Galaxy J7 Prime trás um corpo em metal de alta resistência com bordas arredondadas que lhe dão um aspecto premium. Com uma tela Full HD de 5.5" é ideal para filmes, fotos e navegação na internet. Sua câmera traseira de 13MP com f1.9 capturas fotos claras e nítidas mesmo em condições de baixa luminosidade e a sua câmera frontal de 8MP com f1.9 e Flash Frontal permite selfies incríveis. O Leitor de Impressão Digital dá mais segurança e agilidade e tudo isso suportado por um potente processador Octa Core, 3MB de RAM e 32GB de memória interna. </p>

           </details>


         </div>
       </div>
     </div>

     <div class="col-sm-3 col-xs-12 col-md-3">
      <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="img/celular2.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
        <div class="card-body">
          <h5 class="card-title">Asus Zenfone 2</h5>
          <a href="#" class="btn btn-primary">R$ 815,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
          <details>
           <summary>Detalhes</summary> 
           <p>Uma maravilhosa combinação entre tecnologia e engenharia, que equilibra a beleza e força, um desempenho sem precedentes. Design elegante com bordas incrivelmente finas, de apenas 3.9 mm. Este efeito é conseguido através de um processo de fabricação muito preciso. Tela de 5.5" polegadas, uma proporção incrível entre a tela e o corpo de 72%. Visão ampla para assistir aos seus filmes favoritos. ZenFone 2 vem equipado com o super processador intel Atom Quad-Core Z3580 de 64-bit de 2,3GHz capaz de executar aplicativos pesados sem problema algum. </p>

         </details>


       </div>
     </div>
   </div>
   <div class="col-sm-3 col-xs-12 col-md-3">
    <div class="card mb-4" style="width: 18rem;">
      <img class="card-img-top" src="img/celular3.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
      <div class="card-body">
        <h5 class="card-title">Apple Iphone 8</h5>
        <a href="#" class="btn btn-primary">R$ 3.785,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
        <details>
         <summary>Detalhes</summary> 
         <p>Design inovador,totalmente em vidro.A câmera que o mundo todo inteiro adora, ainda melhor.O chip mais poderoso e inteligente em qualquer smartphone. Recarga sem fio simples de verdade, e experiências de relidade aumentada envolventes como nuncal.O Iphone 8 é brilhante.</p>

       </details>

     </div>
   </div>
 </div>
 <div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular4.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Sansumg Galaxy S8 Plus</h5>
      <a href="#" class="btn btn-primary">R$ 3.299,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Design surpreendentemente e inovador com seu display infinito que se estende até as laterais do aparelho. Processador Octa-Core para iniciar e alternar entre os aplicativos com muita agilidade. A bateria permite maior autonomia e um menor consumo de energia. A câmera principal do Galaxy S8 Plus oferece recursos avançados e você poderá registrar fotos de alta qualidade tanto de dia quanto à noite.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular5.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Xiaomi Redmi Note 5A</h5>
      <a href="#" class="btn btn-primary">R$ 579,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Dual SIM (Nano-SIM) Display. Tipo IPS LCD touchscreen capacitivo, 16M cores Tamanho Tela. 5,5 polegadas Resolução 720 x 1280 pixels Multitouch Sim Proteção display.Gorilla Glass 3 - MIUI 9.0 Sistema Operacional. Android 7.0 (Nougat) Chipset Qualcomm MSM8917 Snapdragon 425 CPU Quad-core Cortex-A53 GPU Adreno 308 Suporta cartão microSD de até 256GB Memória interna. 16GB Memória Ram. 2GB </p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular6.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">LG K10</h5> 
      <a href="#" class="btn btn-primary">R$ 699,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Smartphone LG K10 M250DS Dourado com 32GB, Dual Chip, Tela de 5.3" HD, 4G, Android 7.0, Câmera 13MP e Processador Octa Core de 1.5 GHz. O novo K10 agora vem com Android 7.0 (Nougat), o mais novo sistema operacional do Google. Agora a câmera de sefie de 5MP e 120° cabe todo mundo nas suas selfies, com muito mais cenário. O LG K10 novo tem 32GB de memória interna.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular7.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
     <h5 class="card-title">Asus Zenfone 4 Selfie</h5> 
      <a href="#" class="btn btn-primary">R$ 1.399,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Apresentamos o Smartphone Asus Zenfone 4 Selfie Rose Ouro. Câmera Selfie Dupla Para fornecer a melhor experiência em selfies, possui duas câmeras frontais sendo 20MP que tira selfies deslumbrantes e uma câmera grande angular de 8MP com um campo de visão de 120°. Tecnologia ASUS SelfieMaster, você tem a flexibilidade de incluir apenas a si ou juntar os amigos para selfies em grupo. Flash LED Selfie Possui um flash LED com iluminação leve que oferece a quantidade perfeita de luz para suavizar a textura da sua pele para fazer você brilhar como um superstar em cada selfie. Capture Cada momento Além de duas câmeras frontais selfie, possui uma câmera traseira de 16MP para que você capture seus momentos com riqueza de detalhes.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular8.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Iphone X 64GB</h5> 
      <a href="#" class="btn btn-primary">R$ 5.079,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Fantástico produto, Tudo de novo, inspirado uma nova era para smartphone. Inteligência artificial a serviço do homem.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular9.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Motorola Moto G5s Platinum </h5> 
      <a href="#" class="btn btn-primary">R$ 899,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Não se preocupe com a bateriaFique longe do carregador. A bateria de 3000 mAh tem capacidade suficiente para o dia todo. Na hora de recarregar, não perca tempo. O carregador TurboPower fornece até 6 horas de uso com apenas 15 minutos de carregamento.Câmera traseira de 16 MP | Câmera frontal de 5 MPO moto g5S possui uma câmera de 16 MP de alta resolução e foco automático de detecção de fase (PDAF type 3), que utiliza mais de 200 mil pixels para focar no objeto em um instante, para que você não perca um clique. Tire selfies excelentes com a câmera de 5 MP com Flash Frontal e lente de ângulo aberto, para que ninguém fique de fora da fotoDesign e TelaEstrutura única em metal e tela de 5.2 Full HDEstilo ou eficiência? Fique com os dois. </p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular10.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Motorola MOTO X4</h5> 
      <a href="#" class="btn btn-primary">R$ 1.329,00  <i class="fa fa-cart-arrow-down fa-2x"></i></a>

      <details>
       <summary>Detalhes</summary> 
       <p>A Motorola apresenta a versão 4 do Smartphone Moto X! Seu formato Premium com acabamento em vidro 3D se mistura à estrutura de metal, criando um aparelho de pura beleza e requinte. Fotos e vídeos incríveis. Conheça o novo Moto X4 e sua câmera inteligente. Ele possui um sistema de câmera traseira dupla com sensores de 12MP e 8MP e recursos exclusivos, como foco seletivo, reconhecimento de objetos e efeitos de realidade aumentada que proporciona muito mais qualidade na captura das imagens. Com a super-selfie você tira fotos em alta resolução de 16 MP ou, no modo avançado, fotos incrivelmente nítidas mesmo com pouca luz. </p>

     </details>
   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular11.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Samsung Galaxy J7 Pro</h5>
      <a href="#" class="btn btn-primary">R$ 1.249,00  <i class="fa fa-shopping-cart "></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Smartphone Samsung Galaxy J7 Pro, design em metal,Octa Core, Tela 5.5", Android 7.0, 64GB, 3GB RAM, câmera 13MP f1.7 + 13MP f1.9 frontal com Flash LED, Dual Chip - Preto.</p>

     </details>

   </div>
 </div>
</div>
<div class="col-sm-3 col-xs-12 col-md-3">
  <div class="card mb-4" style="width: 18rem;">
    <img class="card-img-top" src="img/celular12.jpg" alt="Card image cap" style="height: 200px; width: 239px;">
    <div class="card-body">
      <h5 class="card-title">Huawei P8 Lite L21</h5>

      <a href="#" class="btn btn-primary">R$ 619,00 <i class="fa fa-cart-arrow-down fa-2x"></i></a>
      <details>
       <summary>Detalhes</summary> 
       <p>Dual Chip. Não (Micro-SIM) Display. Tipo IPS LCD touchscreen capacitivo, 16M cores Tamanho Tela. 5.0 polegadas, 68.9 cm2 Resolução 720 x 1280 pixels, relação 16: 9 (~ 294 ppp de densidade) Multitouch Sim Proteção Corning Gorilla Glass 3 - Emotion 3.1 UI Sistema Operacional. Android 5.0.2 (Lollipop), atualizável para 6.0 (Marshmallow)</p>

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