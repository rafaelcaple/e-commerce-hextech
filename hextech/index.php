<?php
session_start();
include_once('subsites\db.php');


$status = "";
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
      
    } else {

      $_SESSION["carrinho"] =  array_merge(
        $_SESSION["carrinho"],
        $cartArray
      );
    }
  }

  header("Location: ".$_SERVER['PHP_SELF']);
  die;
}
if (isset($_POST['produtounico'])) {
  $idprod = $_POST['idprod'];
  $_SESSION["produtounico"] = $idprod;
  header("location: produtounico.php");
  die;
}
?>


<!doctype html>
<html>

<head>
  <title>HexTech</title>
  <meta charset="utf-8">
  <?php
  $timestamp = date("YmdHis");
  ?>
  <link rel="stylesheet" href="css\fontawesome\css\all.css?v=<?php echo $timestamp; ?>">
  <script src="css\fontawesome\js\all.js"></script>
  <link rel="stylesheet" href="css\index.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
  
</head>

<body>

  <?php
  include 'nav.php';
  ?>


  <?php
  include 'slider.php';
  
  include 'multislider.php';
  ?>



  <div class="fundo">

    <div class="banners">

      <div class="banner1">
      <form method="POST">
      <input type='hidden' name='idprod' value="13">
      <button class='banner5' name='produtounico'>
      <img src="imagens/mousegamerbanner.png">
      </button>
      </form>
      </div>

      <div class="banner1">
      <form method="POST">
      <input type='hidden' name='idprod' value="14">

      <button class='banner5' name='produtounico'>
      <img src="imagens/tecladobanner.png">
      </button>
      
      </form>
      </div>

    </div>



    <div class="ProdutosT">
      <a>MAIS VENDIDOS</a> <i class="fa-solid fa-fire"></i>
    </div>
    <div class="Produtos">
      
      <?php
      
      $result = mysqli_query($con, "SELECT * FROM `produtos` ORDER BY RAND () LIMIT 16");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='cardProduto'>

        <div class='imagemProduto'>
        <form method='post' >
          <input type='hidden' name='idprod' value=".$row['idprod']." />
          <button name='produtounico' class='produtounico'>
          <img src='imgProdutos/".$row['imagem']."'/>
          </button>
    </form>
    </div>



    <form method='post' action=''>
    <input type='hidden' name='idprod' value=" . $row['idprod'] . " />


    <div class='nomeProduto'>
    " . $row['nome'] . "
    </div>
    <div class='price'>
    R$" . number_format($row['preco'], 2, ",", ".") . "
    </div>
    
    <button type='submit' class='btnProduto' name='carrinho'>
    <i class='fa-solid fa-cart-shopping'></i>
    COMPRAR
    </button>
    </form>
    </div>";
      }
      
      ?>
    </div>
    <div class='bannerretangular'>
      <div class='bannerR'>
      <img src="imagens/banner-lightspeed.png">
      </div>
      </div>
    <?php
    include 'multislider2.php';
    ?>
    <div class='bannerretangular'>
      <div class='bannerR'>
      <img src="imagens/banner-cafe.png">
      </div>
      </div>
    <?php
    mysqli_close($con);
    include "footer.php";
    ?>
</body>

</html>