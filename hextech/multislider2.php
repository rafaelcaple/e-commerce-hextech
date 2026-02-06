<html>
<head>
<link href="css\_carousel.scss?v=<?php echo $timestamp;?>" rel="stylesheet" >
<script src="js\carousel.js"></script>
<script src="js\jquery.js"></script>

</head>
<body>
<?php
    $timestamp = date("YmdHis"); 
  ?>
    <script src="js\multislider.js"></script>
    <link href="css\multislider.css?v=<?php echo $timestamp;?>" rel="stylesheet">
<div class="conteudo">
	<div class="row">
    <a>ACABOU DE CHEGAR</a> <i class="fa-solid fa-face-grin-hearts"></i>
</div>
		<div class="MultiCarousel" data-items="1,2,3,4,5,6" data-slide="1" id="MultiCarousel"  data-interval="100">
            <div class="MultiCarousel-inner">
                <?php
$result = mysqli_query($con,"SELECT * FROM `produtos` ORDER BY idprod DESC");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='item'>

    <form method='post'>
    <input type='hidden' name='idprod' value=".$row['idprod']." />
    <button name='produtounico' class='produtounico'>
    <img src='imgProdutos/".$row['imagem']."'/>
    </button>
    </form>

    
    <form method='post' action=''>
    <input type='hidden' name='idprod' value=".$row['idprod']." />

    <div class='nomeProduto'>".$row['nome']."</div>
    <div class='price'>R$".number_format($row['preco'],2,",",".")."</div>
    <button type='submit' class='btnProduto' name='carrinho'>
    <i class='fa-solid fa-cart-shopping'></i>
    COMPRAR</button>
    </form>
    </div>";
        }
?>            
            </div>
            <button class="btn btn-primary leftLst">    
                <img src="imagens\setinha1.png">
            </button>
            <button class="btn btn-primary rightLst">
                <img src="imagens\setinha2.png">
            </button>
        </div>
	

</div>
</body>
</html>