<?php
session_start();
include_once('subsites\db.php');
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

    <link rel="stylesheet" href="css\concluido2.css?v=<?php echo $timestamp; ?>">
    <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
    

</head>

<body>

<?php
    include 'nav.php';
?>



<div class='tudotudo'>

<div class='tudotudotudo'>
    
        <img src="imagens\check.png">
   
        <div class='meio'>
        <div>
        <label>Pedido concluído</label> <i class="fa-solid fa-face-laugh-beam"></i>
        </div>
        <p>Agora só é preciso realizar o pagamento</p>
        <p>Para acompanhar o pedido acesse a página <a href="minhaconta.php">MINHA CONTA</a></p>
        </div>
        <a class='bt' href="imagens\boleto.pdf" target="_blank" rel="noopener noreferrer">
            IMPRIMIR BOLETO
        </a>
</div>

</div>

<?php
    include 'footer.php';
?>


</body>
</html>