<?php
session_start();
include_once('subsites\db.php');

if (isset($_POST['pix'])) {

$idcadastro = $_SESSION["cadastro"]['idcadastro'];
$cep = $_SESSION["endereco"]["cep"];
$num = $_SESSION["endereco"]["num"];
$complemento = $_SESSION["endereco"]["complemento"];
$tipo = 'PIX';
$precopix = $_SESSION["precototal"] - ($_SESSION["precototal"]*0.15);

$sql = mysqli_query ($con, 
        "INSERT INTO pedidos ( idcadastro, cep, num, complemento, tipo, preco) 
        VALUES ('$idcadastro','$cep','$num','$complemento','$tipo','$precopix')");

$id = mysqli_insert_id ($con);

foreach ($_SESSION["carrinho"] as $produto) {
  $idprod = $produto['idprod'];
  $quantidade = $produto['quantity'];

  $sql2 = mysqli_query ($con, 
  "INSERT INTO pedidos_produtos ( idpedido, idprod, quantidadeprod) 
  VALUES ('$id','$idprod','$quantidade')");
}
unset($_SESSION["carrinho"]);
unset($_SESSION["endereco"]);
unset($_SESSION["precototal"]);

header("location: pedidoconcluido2.php");
die;

}

if (isset($_POST['boleto'])) {
  
$idcadastro = $_SESSION["cadastro"]['idcadastro'];
$cep = $_SESSION["endereco"]["cep"];
$num = $_SESSION["endereco"]["num"];
$complemento = $_SESSION["endereco"]["complemento"];
$tipo = 'BOLETO';
$precopix = $_SESSION["precototal"] - ($_SESSION["precototal"]*0.15);

$sql = mysqli_query ($con, 
        "INSERT INTO pedidos ( idcadastro, cep, num, complemento, tipo, preco) 
        VALUES ('$idcadastro','$cep','$num','$complemento','$tipo','$precopix')");

$id = mysqli_insert_id ($con);

foreach ($_SESSION["carrinho"] as $produto) {
  $idprod = $produto['idprod'];
  $quantidade = $produto['quantity'];

  $sql2 = mysqli_query ($con, 
  "INSERT INTO pedidos_produtos ( idpedido, idprod, quantidadeprod) 
  VALUES ('$id','$idprod','$quantidade')");
}
unset($_SESSION["carrinho"]);
unset($_SESSION["endereco"]);
unset($_SESSION["precototal"]);

header("location: pedidoconcluido3.php");
die;

}

if (isset($_POST['cartao'])) {

$idcadastro = $_SESSION["cadastro"]['idcadastro'];
$cep = $_SESSION["endereco"]["cep"];
$num = $_SESSION["endereco"]["num"];
$complemento = $_SESSION["endereco"]["complemento"];

$tipo = 'CARTÃO';
$preco = $_SESSION["precototal"];
$vezes = $_POST['vezes'];
$nomecartao = $_POST['nomecartao'];
$numcartao = $_POST['numcartao'];
$cvv = $_POST['cvv'];

$valmes = $_POST['valmes']; $valano = $_POST['valano'];
$val = $valmes.'/'.$valano;

$cpf = $_POST['cpf'];




$sql = mysqli_query ($con, 
        "INSERT INTO pedidos ( idcadastro, cep, num, complemento, tipo, preco, vezes, nomecartao, numcartao, cvv, val, cpfcartao) 
         VALUES ('$idcadastro','$cep','$num','$complemento','$tipo','$preco','$vezes','$nomecartao','$numcartao','$cvv','$val','$cpf')");

$id = mysqli_insert_id ($con);

foreach ($_SESSION["carrinho"] as $produto) {
  $idprod = $produto['idprod'];
  $quantidade = $produto['quantity'];

  $sql2 = mysqli_query ($con, 
  "INSERT INTO pedidos_produtos ( idpedido, idprod, quantidadeprod) 
  VALUES ('$id','$idprod','$quantidade')");
}

  unset($_SESSION["carrinho"]);
  unset($_SESSION["endereco"]);
  unset($_SESSION["precototal"]);

  header("location: pedidoconcluido.php");
  die;

}

?>

<html>

<head>
  <title>HexTech</title>
  <meta charset="utf-8">
  <?php
  $timestamp = date("YmdHis");
  ?>
  <link rel="stylesheet" href="css\fontawesome\css\all.css?v=<?php echo $timestamp; ?>">
    <script src="css\fontawesome\js\all.js"></script>

  <link rel="stylesheet" href="css\pagamento.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">

</head>

<body onload="pix()">
  <?php
  include 'nav.php';
  ?>

  <script>
    function pix() {
      var x = document.getElementById("card1");
      var y = document.getElementById("card2");
      var z = document.getElementById("card3");
      x.style.display = "flex";
      y.style.display = "none";
      z.style.display = "none";
    }

    function boleto() {
      var x = document.getElementById("card1");
      var y = document.getElementById("card2");
      var z = document.getElementById("card3");
      x.style.display = "none";
      y.style.display = "flex";
      z.style.display = "none";
    }

    function cartao() {
      var x = document.getElementById("card1");
      var y = document.getElementById("card2");
      var z = document.getElementById("card3");
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "flex";
    }
  </script>


  <div class='tudopagamento'>

    <!--TIPO PIX-->

    <div class='cardpagamento' id='card1'>
      <div class='titulo'>
        <i class="fa-solid fa-wallet"></i><a>FORMAS DE PAGAMENTO</a>
      </div>
      <div class="tipospagamento">
        <div class="tipo" onclick="pix()">
          <i class="fa-brands fa-pix"></i> <a>PIX</a>
        </div>
        <div class="tipofinal">
          <div class="tipo2" onclick="boleto()">
            <i class="fa-solid fa-barcode"></i> <a>Boleto</a>
          </div>
          <div class="tipo2" onclick="cartao()">
            <i class="fa-solid fa-credit-card"></i> <a>Cartão de crédito</a>
          </div>
        </div>
      </div>
      <div class="pagamento">
        <!--TIPO PIX <div class="geradorQR">
            <div class="qrimagem">
            <img src="imagens\qr.png">
            </div>
      </div>-->
        <div class="pix">
          <img src="imagens\pix.png">
          <div class="descPix">
            <div>
              <a>É a forma mais rápida de fazer um pedido.</a>
            </div>
            <div>
              <label>O dinheiro pode ser transferido de uma conta para outra em até dez segundos,
                a qualquer horário, todos os dias.</label>
            </div>

          </div>

          <div class='preco'>
          <div class="precosem">
          <P>NO CARTÃO</P>
          <a><?php echo "R$".number_format($_SESSION["precototal"], 2, ",", "."); ?></a>
          </div>
          <div class="precocom">
          <P>NO PIX</P>
          <a><?php echo "R$".number_format($_SESSION["precototal"] - ($_SESSION["precototal"]*0.15), 2, ",", "."); ?></a>
          </div>
          </div>

          <div>
            <form method="POST">
            <button type='submit' class='btnpagar' name='pix'>
              PAGAR NO PIX
            </button>
          </div>
  </form>
        </div>

      </div>

    </div>

    <!--TIPO BOLETO-->

    <div class='cardpagamento' id='card2'>
      <div class='titulo'>
        <i class="fa-solid fa-wallet"></i><a>FORMAS DE PAGAMENTO</a>
      </div>

      <div class="tipospagamento">
        <div class="tipofinal2">

          <div class="tipo2" onclick="pix()">
            <i class="fa-brands fa-pix"></i> <a>PIX</a>
          </div>
        </div>

        <div class="tipo" onclick="boleto()">
          <i class="fa-solid fa-barcode"></i> <a>Boleto</a>
        </div>

        <div class="tipofinal">
          <div class="tipo2" onclick="cartao()">
            <i class="fa-solid fa-credit-card"></i> <a>Cartão de crédito</a>
          </div>

        </div>

      </div>

      <div class="pagamento">
        <div class="boleto">
          <img src="imagens\boleto.png">
          <div class="descPix">
            <div>
              <a>É a forma mais rápida de fazer um pedido.</a>
            </div>
            <div>
              <label>O dinheiro pode ser transferido de uma conta para outra em até dez segundos,
                a qualquer horário, todos os dias.</label>
            </div>

          </div>

          <div class='preco'>
          <div class="precosem">
          <P>NO CARTÃO</P>
          <a><?php echo "R$".number_format($_SESSION["precototal"], 2, ",", "."); ?></a>
          </div>
          <div class="precocom">
          <P>NO BOLETO</P>
          <a><?php echo "R$".number_format($_SESSION["precototal"] - ($_SESSION["precototal"]*0.15), 2, ",", "."); ?></a>
          </div>
          </div>

          <div>
          <form method="POST">
            <button type='submit' class='btnpagar' name='boleto'>
              PAGAR NO BOLETO
            </button>
          </div>
  </form>

        </div>

      </div>


    </div>


    <!--TIPO CARTAO-->

    <div class='cardpagamento' id='card3'>
      <div class='titulo'>
        <i class="fa-solid fa-wallet"></i><a>FORMAS DE PAGAMENTO</a>
      </div>

      <div class="tipospagamento">
        <div class="tipofinal2">

          <div class="tipo2" onclick="pix()">
            <i class="fa-brands fa-pix"></i> <a>PIX</a>
          </div>
        </div>
        <div class="tipofinal2">

          <div class="tipo2" onclick="boleto()">
            <i class="fa-solid fa-barcode"></i> <a>Boleto</a>
          </div>
        </div>

        <div class="tipo" onclick="cartao()">
          <i class="fa-solid fa-credit-card"></i> <a>Cartão de crédito</a>
        </div>

        <div class="tipofinal">

        </div>

      </div>
      <form method="POST">
        <div class="pagamento2">
          
          <div class='imgcartao'>
          <img src="imagens\cartao.png">
          <div class="precosem2">
          <P>Total:</P>
          <a><?php echo "R$".number_format($_SESSION["precototal"], 2, ",", "."); ?></a>
          </div>
          </div>

          <div class="form">
          
            <input type="text" name ='nomecartao' placeholder="Nome impresso no cartão" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g,'');">
            <input type="text" name ='numcartao' placeholder="Número do cartão" required min-length="13" maxlength="16" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            <div class="formVal">

              <span class="validade">
              
                  <input type="text" name ='cvv' placeholder="CVV" maxlength="4" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                
            
                  <input type="text" name="valmes" placeholder="MM" maxlength="2" size="2" required>
                  <span>/</span>
                  <input type="text" name="valano" placeholder="AA" maxlength="2" size="2" required>
              </span>
               
              <input type="date" name="nasc" placeholder="Nascimento"> 
          </div>

          <input type="text" name='cpf' placeholder="CPF do Titular" pattern=".{11,}" maxlength="11" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

          <select class="select" name='vezes'>
            <option value='1'>
              Á vista <?php echo "R$".number_format($_SESSION["precototal"], 2, ",", "."); ?> 
            </option>
            <option value='2'>
              2x de <?php echo "R$".number_format($_SESSION["precototal"]/2, 2, ",", "."); ?> s/juros
            </option>
            <option value='3'>
            3x de <?php echo "R$".number_format($_SESSION["precototal"]/3, 2, ",", "."); ?> s/juros
            </option>
            <option value='4'>
            4x de <?php echo "R$".number_format($_SESSION["precototal"]/4, 2, ",", "."); ?> s/juros
            </option>
            <option value='5'>
            5x de <?php echo "R$".number_format($_SESSION["precototal"]/5, 2, ",", "."); ?> s/juros
            </option>
            <option value='6'>
            6x de <?php echo "R$".number_format($_SESSION["precototal"]/6, 2, ",", "."); ?> s/juros
            </option>
            <option value='7'>
            7x de <?php echo "R$".number_format($_SESSION["precototal"]/7, 2, ",", "."); ?> s/juros
            </option>
            <option value='8'>
            8x de <?php echo "R$".number_format($_SESSION["precototal"]/8, 2, ",", "."); ?> s/juros
            </option>
            <option value='9'>
            9x de <?php echo "R$".number_format($_SESSION["precototal"]/9, 2, ",", "."); ?> s/juros
            </option>
            <option value='10'>
            10x de <?php echo "R$".number_format($_SESSION["precototal"]/10, 2, ",", "."); ?> s/juros
            </option>
            <option value='11'>
            11x de <?php echo "R$".number_format($_SESSION["precototal"]/11, 2, ",", "."); ?> s/juros
            </option>
            <option value='12'>
            12x de <?php echo "R$".number_format($_SESSION["precototal"]/12, 2, ",", "."); ?> s/juros
            </option>
          </select>

                  

          <button type='submit' class='btnpagar' name='cartao'>
            FECHAR PAGAMENTO
          </button>
        </div>


    </div>
    </form>
  </div>
  <!--TIPO CARTAO-->
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>