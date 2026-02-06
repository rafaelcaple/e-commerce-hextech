<?php
session_start();
include_once('subsites\db.php');

$nome="";
$email="";

if (isset($_SESSION["cadastro"])) {
    $cadastro = $_SESSION["cadastro"];
    $nome = $cadastro["nome"];
    $email = $cadastro["email"];    
}
else {
    header("location: login.php"); 
    die;
}

if (isset($_POST['encerrar'])) {
    unset($_SESSION["cadastro"]);
    header("location: login.php"); 
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
  <link rel="stylesheet" href="css\minhaconta.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
  
</head>

<body>

    <?php
        include 'nav.php';
    ?>
<div class="tudo">
<div class="informacoes">
<div class="imagem">
<img src="imagens\conta.png"> 
</div>

    <div class="titulo">
    Bem vindo,
    <label>
    <?php echo $nome;?>
    </label>
    <span><?php echo $email;?></span>
    <form method="POST">
    
    <input type="submit" name="encerrar" value="Encerrar sessão">  
    </form>
    </div>
    
</div>

<div class="pedidos">

<div class="ptitulo">
    <i class="fa-solid fa-truck"></i> Seus pedidos:
    </div>

<?php 

//SELECIONA OS PEDIDOS CADASTRADOS NA CONTA DO USUARIO
$idcadastro = $cadastro["idcadastro"]; 
$sql = mysqli_query( $con,"SELECT * FROM pedidos WHERE idcadastro='$idcadastro'");
$row = mysqli_fetch_assoc($sql);


?>

        <?php 

        //SELECIONA OS PEDIDOS CADASTRADOS NA CONTA DO USUARIO
        $idcadastro = $cadastro["idcadastro"]; 
        $sql = mysqli_query( $con,"SELECT * FROM pedidos WHERE idcadastro='$idcadastro' ORDER BY idpedido DESC");
        

        foreach ($sql as $row) {
            echo '
            <div class="compras">
                <div class="info1">
                    <a>Número do pedido</a>
                     #'.$row['idpedido'].' 
                </div>   
                <div class="info1"> 
                    <a>Tipo de Pagamento</a>
                     '.$row['tipo'].' 
                </div>  
                <div class="info1">   
                    <a>Status</a>
                    <span>'. $row['status'].'</span>
                </div>    
                <div class="info1">
                <a>Produtos</a>
                <div class="nome"><ul>';
    
               
        //MOSTRAR O CODIGO DOS PRODUTOS
        $idpedido = $row['idpedido'];
        $result = mysqli_query($con,"SELECT * FROM pedidos_produtos WHERE idpedido=$idpedido");
        foreach ($result as $row) {
            $idprod = $row['idprod'];
            $result1 = mysqli_query($con,"SELECT * FROM produtos WHERE idprod=$idprod");
            $nome = mysqli_fetch_assoc($result1);
            echo '<li>'.$nome['nome'].'</li>';
        }
                echo '</ul></div></div>
                      </div> ';
    }
        ?>
    


</div>

</div>

</body>
</html>