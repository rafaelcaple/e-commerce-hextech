<?php
session_start()
?>

<!doctype html>
<html>

<head>
    <title>HexTech</title>
    <meta charset="utf-8">
    <?php
    $timestamp = date("YmdHis");
    ?>
    <link rel="stylesheet" href="css\form.css?v=<?php echo $timestamp; ?>">
    <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
    <script src="js\jquery.js"></script>
</head>

<body>
    <script>
var slider = document.getElementById("range");
var output = document.getElementById("impressao");
output.innerHTML = slider.value;

function slider() {
output.innerHTML = parseInt(this.value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}
    </script>
    <?php
    include 'nav.php';
    ?>
    <div class='tudoF'>
   
    <div class='T'>
    <i class="fa-solid fa-computer"></i>
    MONTAMOS O SEU PC !
    </div>

    <div class='checkT'>
        <label>Para que o computador será utilizado?</label>
    <div class='check'>
        <input type="checkbox" value="Jogos">
        <P>Jogos</P>
    </div>
    <div class='check'>
        <input type="checkbox" value="Trabalho Leve">
        <P>Trabalho</P>
    </div>
    <div class='check'>
        <input type="checkbox" value="Streaming">
        <P>Streaming</P>
    </div>
    </div> 
    <div class='range'>
    <label>Quanto você está disposto a pagar?</label>
    <h2><span id="impressao"></span></h2>
    <input oninput='slider()'type="range" value="500" min="500" max="10000" step="100" id="impressao">

    </div>
       

<div class='textareaT'>
    <label> Quais os principais aplicativos que você irá utilizar?</label>
    <div class='text'>   
    <textarea rows="5" placeholder=""></textarea>
    </div>
</div>
<div class='textareaT'>
    <label>Conte um pouco sobre você:</label>
    <div class='text'>
    <textarea  rows="5" placeholder=""></textarea>    
    </div> 
</div>   
    <div class='btnComprar'>
        <button><i class="fa-regular fa-paper-plane"></i>ENVIAR</button>
    </div>

</div>

    <?php
    include 'footer.php';
    ?>


</body>

</html>