<?php
error_reporting(0);
session_start();

$idprod = $_POST['idprod'];
if (isset($_POST['action']) && $_POST['action'] == "remove") {

  foreach ($_SESSION["carrinho"] as $select => $val) {
    if ($val["idprod"] == $idprod) {
      unset($_SESSION["carrinho"][$select]);
    }
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  die;
}

if (empty($_SESSION["carrinho"])) {
  unset($_SESSION["carrinho"]);
}
if (isset($_POST['action']) && $_POST['action'] == "change") {
  foreach ($_SESSION["carrinho"] as &$value) {
    if ($value['idprod'] === $_POST["idprod"]) {
      $value['quantity'] = $_POST["quantity"];
      break;
    }
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  die;
}


if (isset($_POST['action']) && $_POST['action'] == "removeall") {
  unset($_SESSION["carrinho"]);
  header("Location: " . $_SERVER['PHP_SELF']);
  die;
}

if (isset($_POST['pagamento'])) {
  if (!empty($_SESSION["cadastro"])) {
    $precototal = $_POST['precototal'];
    $_SESSION["precototal"] = $precototal;
    header("location: endereco.php");
    die;
  } else {
    header("location: login2.php");
    die;
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

  <link rel="stylesheet" href="css\carrinho.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">

</head>

<body>


  <?php
  include "nav.php";
  ?>




  <?php
  if (isset($_SESSION["carrinho"])) {
    $total_price = 0;
  ?>

  



    <div class="Titulo">
      <i class="fa-solid fa-cart-shopping"></i>
      <label> CARRINHO </label>
    </div>
    <div class='tudo'>

      <div class="cart">

        <div class='Produtos'>
          <div class='ProdutosT'>
            <a>Produtos</a>
            <div class="removeall">
              <form method='post' action='carrinho.php'>
                <input type='hidden' name='idprod' value="<?php echo $product["idprod"]; ?>" />
                <input type='hidden' name='action' value="removeall" />
                <button type='submit' class='removeall'> <i class="fa-solid fa-trash"></i> REMOVER TODOS OS PRODUTOS</button>
              </form>
            </div>
          </div>
          <?php
          foreach ($_SESSION["carrinho"] as $product) {
          ?>

            <?php
            echo "<div class='box'>";
            $img = $product["imagem"];
            echo "<img src='imgProdutos/$img'/>";
            ?>
            <?php
            echo '<div class="content">';
            echo '<div class="nome">' . $product["nome"] . '</div>';
            ?>

            <div class='qr'>
              Quant.
              <form method='post' action=''>
                <input type='hidden' name='idprod' value="<?php echo $product['idprod']; ?>" />
                <input type='hidden' name='action' value="change" />
                <select name='quantity' class='quantity' onChange="this.form.submit()">
                  <option hidden> <?php echo $product["quantity"]; ?> </option>
                  <option <?php if ($product["quantity"] == 1); ?> value="1">1</option>
                  <option <?php if ($product["quantity"] == 2); ?> value="2">2</option>
                  <option <?php if ($product["quantity"] == 3); ?> value="3">3</option>
                  <option <?php if ($product["quantity"] == 4); ?> value="4">4</option>
                  <option <?php if ($product["quantity"] == 5); ?> value="5">5</option>
                  <option <?php if ($product["quantity"] == 6); ?> value="6">6</option>
                  <option <?php if ($product["quantity"] == 7); ?> value="7">7</option>
                  <option <?php if ($product["quantity"] == 8); ?> value="8">8</option>
                  <option <?php if ($product["quantity"] == 9); ?> value="9">9</option>
                  <option <?php if ($product["quantity"] == 10); ?> value="10">10</option>
                </select>

              </form>
            </div>
            <!-- REMOVEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEER -->
            <form method='post' action=''>
              <input type='hidden' name='idprod' value="<?php echo $product['idprod']; ?>" />
              <input type='hidden' name='action' value="remove" />
              <button type='submit' class='remove'>
              <i class="fa-solid fa-trash"></i>
              REMOVER
              </button>
            </form>

            <?php
            echo "<div class='price'>R$" . number_format($product["preco"] * $product["quantity"], 2, ",", ".") . "</div>";

            echo "</div></div>";
            ?>





          <?php
            $total_price += ($product["preco"] * $product["quantity"]);
          }
          ?>

        </div>



        <div class="right-bar">
          <div class="ProdutosT2">
           
          </div>
          <div class='total'>
            Total: <?php echo "R$" . number_format($total_price, 2, ",", "."); ?>
          </div>
          <div class='frete'>

          </div>

          <div class='pagamento'>
            <form method="POST">
              <input type="hidden" name='precototal' value="<?php echo $total_price ?>">
              <button type="submit" name="pagamento">
                FECHAR PEDIDO
              </button>
            </form>

          </div>
        </div>


      </div>



    <?php
  } else {

    echo "<div class='vazio'>
        <label>Seu carrinho está vázio!</label>
        <a href='index.php'>Continuar comprando</a>
        </div>";
  }
    ?>


    </div>

    <?php
    include "footer.php";
    ?>

</body>

</html>