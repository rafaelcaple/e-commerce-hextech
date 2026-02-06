<?php
session_start();
include_once('subsites\db.php');

$statuscadastro = "";

$statussenha = ""; 
$statuscampo = ""; 
$statuscpfemail = "";
$statusemail = ""; 
$statuscpf = ""; 

if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarsenha = $_POST['confirmarsenha'];

    if ($senha != $confirmarsenha) {
        $statussenha = "<a style='color: red; font-size:20px;' >A CONFIRMAÇÃO DE SENHA NÃO CONFERE!</a>";
    }
    if ($senha == $confirmarsenha) {
        try {
        $result = mysqli_query ($con, 
        "INSERT INTO cadastro ( nome, cpf, email, senha) VALUES ('$nome','$cpf','$email','$senha')");
        $statuscadastro = "<a style='color: green; font-size:20px;'>CADASTRADO COM SUCESSO!</a>";   
        }
        catch (Exception $e) {
        $statuscpfemail = "<a style='color: red; font-size:20px;' >CPF OU EMAIL JÁ CADASTRADO!</a>";
        }
    }
}

?>

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
    ?>

    <div class='tudologin'>

        <div class="card2">
            <div class='cardT'>
                <div>
                <?php echo $statuscadastro; ?>
                <?php echo $statuscpfemail; ?>
                </div>
                <div>
                Criar minha Conta 
                </div>
                <div>
                
                </div>
            </div>

            <div class="formu">

                <form method="POST" action="">
                    <div class="nome">
                    
                    <input type="text" placeholder="Nome Completo" name="nome" required
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g,'');">
                    </div>
                    <div>
                    <input type="email" placeholder="Email" name="email" class="email" required>
                    <input type="text" placeholder="CPF" name="cpf" class="email"   pattern=".{11,}" maxlength="11" required
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="senha2">
                        <input type="password" placeholder="Senha" name="senha" maxlength="20" required>
                        <input type="password" placeholder="Confirmar Senha" name="confirmarsenha" maxlength="20" required>

                    </div>
                    <div class="cardcadastrar">
                        <button type='submit' class="cadastrar" name="cadastrar">
            <i class="fa-solid fa-right-to-bracket"></i>
                            Cadastrar
                        </button>
                        
                    </div>
                </form>
                
            </div>
         
        </div>
        <div class="card2">
            <div class='cardT'>
                Possui uma Conta?
            </div>
            <a href="login.php" class="ircadastro">
            <i class="fa-solid fa-right-to-bracket"></i>Fazer Login</a>
        </div>

    </div>

    <?php
    include 'footer.php';
    ?>




</body>

</html>