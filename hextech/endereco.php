<?php
session_start();
include_once('subsites\db.php');
$naocalc ="";
$row ="";
if (isset($_POST['endereco'])) {
  $frete = $_POST['frete'];
  $cep = $_POST['cep'];
  $num = $_POST['num'];
  $complemento = $_POST['complemento'];

  if (empty($frete)) {
    $naocalc ='<a style="color: red; font-size:20px;">Calcule o Frete!</a>';
  }
  else {
  $_SESSION["precototal"] = $_SESSION["precototal"] + $frete;
  $_SESSION["endereco"] =
    array(
      "cep" => $cep,
      "num" => $num,
      "complemento" => $complemento
    );
    header("location: pagamento.php");
    die;
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

  <link rel="stylesheet" href="css\endereco.css?v=<?php echo $timestamp; ?>">
  <link rel="icon" type="image/x-icon" href="imagens\Logo.png">
</head>

<body>
  <script> 
    
    function calccep() {
      
      const cep = document.getElementById('cep').value;
      let frete;

      //SUDESTE
      // Grande SP                        
      if (cep.charAt(0) == "0") {
        frete = 18;
      };
       // Interior SP
      if (cep.charAt(0) == "1") {
        frete = 18;
      };

      // RJ E Espirito santo               
      if (cep.charAt(0) == "2") {
        frete = 15;
      };
      // Minas Gerais
      if (cep.charAt(0) == "3") {
        frete = 20;
      };

      //NORDESTE e NORTE
      // Bahia e Sergipe                   
      if (cep.charAt(0) == "4") {
        frete = 30;
      };
      // Pernambuco, Alagoas, Paraíba e Rio Grande do Norte
      if (cep.charAt(0) == "5") {
        frete = 30;
      };

      // Ceará, Piauí, Maranhão, Pará, Amazonas, Acre, Amapá e Roraima
      if (cep.charAt(0) == "6") {
        frete = 30;
      };

      //CENTRO-OESTE
      //Distrito Federal, Goiás, Tocantins, Mato Grosso, Mato Grosso do Sul e Rondônia
      if (cep.charAt(0) == "7") {
        frete = 28;
      };

      //SUL
      //Paraná e Santa Catarina
      if (cep.charAt(0) == "8") {
        frete = 25;
      };

      //Rio Grande do Sul
      if (cep.charAt(0) == "9") {
        frete = 27;
      };
      document.getElementById("mostrarfrete").innerHTML = frete.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
      document.getElementById('frete').value = frete;
    }
  </script>
  <?php
  include 'nav.php';
  ?>
  <div class='tudo'>
    <div class="card">
      <div class="titulo">
        <i class="fa-solid fa-location-dot"></i>ENDEREÇO
      </div>
      <div class="conteudo">

        <div class="imagem">
          <img src="imagens\endereco.png">
        </div>


        <div>

          <form class="form" method="POST">
            <div class="cep">
              <input type="text" name="cep" id="cep" placeholder="CEP" pattern=".{8,}" maxlength="8" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
              <div class="cepbt" onclick="calccep()">CALCULAR FRETE</div>
            </div>


            <input type="text" name="num" placeholder="Número" required
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            <input type="text" name="complemento" placeholder="Complemento" maxlength="50">

        </div>

        <div class="frete">
          <label>Frete:</label>
          <P id="mostrarfrete">
          R$0,00
          </P>
          <input type="hidden" id="frete" name="frete">
          <div>
          <button type="submit"  name="endereco" id="btsubmit" >
            IR PARA O PAGAMENTO
          </button>
          </div>
          <?php 
          echo $naocalc; 
          ?>
          </form>
        </div>

      </div>
    </div>
  </div>



  <?php
  include 'footer.php';
  ?>
</body>

</html>