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
      $_SESSION["carrinho"] = array_merge(
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

<!DOCTYPE html>
<html>
<head>

<title>HexTech</title>
  <meta charset="utf-8">
  <?php
  $timestamp = date("YmdHis");
  ?>

<link rel="stylesheet" href="css\fontawesome\css\all.css?v=<?php echo $timestamp; ?>">
    <script src="css\fontawesome\js\all.js"></script>

  <link rel="stylesheet" href="css\pesquisa.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">

</head>
<body>

<?php
  include 'nav.php';
?>

<?php
include('subsites\db.php');
$status = "";



?>


<?php  
    $tipodoproduto = 'Microfone';
    $result = mysqli_query($con,"SELECT * FROM produtos WHERE tipo LIKE '%$tipodoproduto%'");

    if (mysqli_num_rows($result) != 0) {
        echo "<div class='Produtos'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='cardProduto' action='carrinho.php'>

            <div class='imagemProduto'>
        <form method='post' >
          <input type='hidden' name='idprod' value=".$row['idprod']." />
          <button name='produtounico' class='produtounico'>
          <img src='imgProdutos/".$row['imagem']."'/>
          </button>
    </form>
    </div>

            <form method='post'>
            <input type='hidden' name='idprod' value=" . $row['idprod'] . " />
    
            <div class='nomeProduto'>
            " . $row['nome'] . "
            </div>
            <div class='price'>
            R$" . number_format($row['preco'], 2, ",", ".") . "
            </div>
            <button type='submit' class='btnProduto' name='carrinho' >
            COMPRAR
            </button>
            
            </form>
            </div>";
            }
            echo "</div>";
    }
    else {
        echo '<div class="vazio">Nada encontrado!</div>';
    }
    
?>  



<?php
  include 'footer.php';
?>
</body>
</html>

