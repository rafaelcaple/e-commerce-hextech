<?php
session_start();
include_once('subsites\db.php');
$email="";
$senha="";
$statuslogin="";
$erro="";
$url="";


if (isset($_POST['btentrar'])) {
    $emailform = $_POST['email'];
    $senhaform = $_POST['senha'];

    $existeEMAIL = mysqli_query ($con,"SELECT * FROM cadastro WHERE email = '$emailform'");
    $existeSENHA = mysqli_query ($con,"SELECT * FROM cadastro WHERE senha = '$senhaform'");

        if (mysqli_num_rows($existeEMAIL)>0 && mysqli_num_rows($existeSENHA)>0) {
            $statuslogin = "<a style='color: green; font-size:20px;' >CONTA ACESSADA!</a>";
            $sql = mysqli_query(
            $con,"SELECT * FROM cadastro WHERE email='$emailform' and senha='$senhaform'");
            $row = mysqli_fetch_assoc($sql);
            $_SESSION["cadastro"] = $row;
            
        }
        else {
            $erro = "<a style='color: red; font-size:20px;' >EMAIL OU SENHA INVÁLIDOS!</a>";
        }
    
    
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

    <link rel="stylesheet" href="css\login.css?v=<?php echo $timestamp; ?>">
    <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
    

</head>

<body>

    <?php
    include 'nav.php';
    if (!empty($_SESSION["cadastro"])) {
        $statuslogin = "<a style='color: green; font-size:20px;' >CONTA ACESSADA!</a>";
      }
    echo '
    <div class="tudologin">

        <div class="card2">
            <div class="cardT">
            <div>
                '.$statuslogin.$erro.'
                </div>
                <div>
                Fazer Login 
                </div>
            </div>

            <div class="formu">

                <form action="" method="POST">
                    <div>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="senha">
                        <input type="password" placeholder="Senha" name="senha" required>
                    </div>

                    <div>
                        <button type="submit" class="btentrar" name="btentrar">
            <i class="fa-solid fa-right-to-bracket"></i>
                            ENTRAR
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <div class="card2">
            <div class="cardT"">
                Não possui uma Conta?
            </div>
            <a href="cadastro.php" class="ircadastro">
            <i class="fa-solid fa-right-to-bracket"></i>CRIAR MINHA CONTA</a>

        </div>

    </div>
    ';
    
    include 'footer.php';
    ?>




</body>

</html>