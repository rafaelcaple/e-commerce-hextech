<?php
session_start();
include_once('subsites\db.php');


if (isset($_POST['carrinho'])) {
  $idprod = $_POST['idprod'];
  $result = mysqli_query(
    $con,
    "SELECT * FROM `produtos` WHERE `idprod`='$idprod'"
  );
  $row = mysqli_fetch_assoc($result);
  $nome = $row['nome'];
  $idprod = $row['idprod'];
  $preco = $row['preco'];
  $imagem = $row['imagem'];

  $cartArray = array(
    $idprod => array(
      'idprod' => $idprod,
      'nome' => $nome,
      'preco' => $preco,
      'quantity' => 1,
      'imagem' => $imagem
    )
  );

  if (empty($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = $cartArray;
  } else {
    $array_keys = array_keys($_SESSION["carrinho"]);
    if (in_array($idprod, $array_keys)) {
      $status = "<div class='box' style='color:red;'>
          Produto já foi adicionado ao carrinho!</div>";
    } else {
      $_SESSION["carrinho"] = array_merge(
        $_SESSION["carrinho"],
        $cartArray
      );
    }
  }

  header("Location: " . $_SERVER['PHP_SELF']);
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
  <script src="js\jquery.js"></script>
  <link rel="stylesheet" href="css\produtounico.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">


</head>

<body onload="esconder()">
  <script>
    function esconder() {
      var x = document.getElementById("mostrar")
      var y = document.getElementById("mais")
      var z = document.getElementById("menos")

      x.style.display = "none";
      y.style.display = "flex";
      z.style.display = "none";

    }

    $(document).ready(function() {
      $("#mais").click(function() {
        $("#mostrar").slideDown("slow");

        var x = document.getElementById("mais")
        x.style.display = "none";

        var z = document.getElementById("menos")
        z.style.display = "flex";
      });

      $('#menos').click(function() {
        $('#mostrar').slideUp(400);

        var x = document.getElementById("mais")
        x.style.display = "flex";

        var z = document.getElementById("menos")
        z.style.display = "none";
      });

    });
  </script>
  <?php
  include 'nav.php';
  ?>


  <?php
  $idprod = $_SESSION['produtounico'];
  $result = mysqli_query($con, "SELECT * FROM `produtos` WHERE idprod='$idprod'");
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='produto'>
   
    <input type='hidden' name='idprod' value=" . $row['idprod'] . " />
    <div class='imgProduto'>
    <img src='imgProdutos/" . $row['imagem'] . "'/>
    </div>

    

    <form method='post' action=''>
    <input type='hidden' name='idprod' value=" . $row['idprod'] . " />
    <div class='informacoes'>
    <div class='nome'>
    " . $row['nome'] . "
    </div>
    
    <div class='precopix'>
    Á vista com 15% de desconto no boleto ou no pix
    <label style='color: green;'>
    R$" . number_format($row['preco'] - ($row['preco'] * 0.15), 2, ",", ".") . "
    </label>
    </div>
    <div class='cartao'>
    <div class='preco'>
    <a>
    <i class='fa-solid fa-credit-card'></i> No cartão 
    </a>
    <label>
    R$" . number_format($row['preco'], 2, ",", ".") . "
    </label>
    </div>
    <div class='parcelamento'>
    <div class='titulo'>
    <i class='fa-regular fa-credit-card'></i> Parcelamentos 
    <i class='fa-solid fa-plus'  id='mais'></i>
    <i class='fa-solid fa-minus' id='menos'></i>
    </div>
    <div class='parcelamentot' id='mostrar'>
    

    <div class='linha'>

    <div>
    1x de " . number_format($row['preco'] / 1, 2, ",", ".") . "
    </div>
    <div>
    7x de " . number_format($row['preco'] / 7, 2, ",", ".") . "
    </div>

    </div>
    <div class='linha' >

    <div>
    2x de " . number_format($row['preco'] / 2, 2, ",", ".") . "
    </div>
    <div>
    8x de " . number_format($row['preco'] / 8, 2, ",", ".") . "
    </div>

    </div>

    <div class='linha' >

    <div>
    3x de " . number_format($row['preco'] / 3, 2, ",", ".") . "
    </div>
    <div>
    9x de " . number_format($row['preco'] / 9, 2, ",", ".") . "
    </div>

    </div>

    <div class='linha'>
      <div>
      4x de " . number_format($row['preco'] / 4, 2, ",", ".") . "
      </div>
    <div>
    10x de " . number_format($row['preco'] / 10, 2, ",", ".") . "
    </div>
    </div>
  
    <div class='linha' >

    <div>
    5x de " . number_format($row['preco'] / 5, 2, ",", ".") . "
    </div>
    <div>
    11x de " . number_format($row['preco'] / 11, 2, ",", ".") . "
    </div>

    </div>

    <div class='linha' >

    <div>
    6x de " . number_format($row['preco'] / 6, 2, ",", ".") . "
    </div>
    <div>
    12x de " . number_format($row['preco'] / 12, 2, ",", ".") . "
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    <button type='submit' name='carrinho'>
    <i class='fa-solid fa-cart-shopping'></i>
    COMPRAR
    </button>

    </div>
   
    </form>

    </div>";
  }

  include "footer.php";
  ?>


</body>

</html>