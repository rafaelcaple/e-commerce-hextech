<?php
    $timestamp = date("YmdHis"); 
  ?>
    <link href="css\nav.css?v=<?php echo $timestamp;?>" rel="stylesheet">
<div class="nav">
  <div class="navL">
    <div class="navLogo">
      <img src="imagens\logo.png">
    </div>
    <div class="navNome">
      <a href="index.php">HexTech</a>
    </div>
  </div>

<!--
<div class="Pesquisar">
  <form method="post" action="pesquisa.php">
      <div>
      <input type="text" name="search">
      </div>
      <input type='hidden' name='pesquisar' value="pesquisar" />
      
      <div>
      <input type="submit" name="submit" value="&#xf002;">
      </div>
    </form>
</div>
-->

  <div class="navR">
    <div class="log">
       <img src="imagens\conta.png"> 
      <?php
      $url="";

      if (!empty($_SESSION["cadastro"])) {
        echo '<a href="minhaconta.php">Minha Conta</a>';
      }

      else {
        echo '<div class="log2">
        <div><label>Fazer</label> <a href="login.php"> LOGIN </a></div>
        <div> <label>ou</label> <a href="cadastro.php"> CADASTRO </a></div></div>';
      }

      ?>
    </div>

    

    <div class="carrinho">
      <a href="carrinho.php"> <img src="imagens\carrinho.png"> </a>
      <?php
      if (!empty($_SESSION["carrinho"])) {
        $cart_count = count(array_keys($_SESSION["carrinho"]));
      ?>
        <div class="carrinhoc">
          <?php
          echo $cart_count;
          ?></span></a>
        </div>


      <?php
      }
      ?>

    </div>
  </div>
</div>
<div class="menu">
  <div id='menu'>
    <script src="js\nav.js"></script>
    <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
    <ul>
      <li><a class='dropdown-arrow' href='#'>TODOS OS DEPARTAMENTOS</a>
        <ul class='sub-menus'>
          <li><a href='hardware.php'>| HARDWARE |</a></li>
          <li><a href='processadores.php'>PROCESSADORES</a></li>
          <li><a href='placasmae.php'>PLACAS MÁE</a></li>
          <li><a href='coolers.php'>COOLERS</a></li>
          <li><a href='fonte.php'>FONTES</a></li>
          <li><a href='memoriaram.php'>MEMORIAS RAM</a></li>
          <li><a href='armazenamento.php'>ARMAZENAMENTO</a></li>
          <li><a href='placasdevideo.php'>PLACAS DE VÍDEO</a></li>
          
          <li><a href='perifericos.php'>| PERIFÉRICOS |</a></li>
          <li><a href='mouse.php'>MOUSES</a></li>
          <li><a href='Teclado.php'>TECLADOS</a></li>
          <li><a href='headset.php'>HEADSETS</a></li>
          <li><a href='Microfone.php'>MICROFONES</a></li>
          <li><a href='gabinetes.php'>GABINETES</a></li>
        </ul>
      </li>
      <li><a href='form.php'>MONTAMOS O SEU PC!</a></li>
    </ul>
  </div>
</div>

