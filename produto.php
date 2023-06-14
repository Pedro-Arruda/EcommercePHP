<?php
session_start();
if (!isset($_SESSION["produtos"])) {
  $_SESSION['produtos'] = array();
}


$imagem = $_GET['imagem'];
$valorAVista = $_GET['valorAVista'];
$valorParcelado = $_GET['valorParcelado'];
$nome = $_GET['nome'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./produto.css">
  <title>Centauro</title>
  <script>

  </script>
</head>

<body>

  <div class="container">
    <?php
      include 'header.php';
    ?>

    <div class="container-produto">
      <?php
      echo "
          <div class='flex'>
              <img src='{$imagem}' class='img-produto'/>
              <div class='info-produtos'>
                  <h1>{$nome}</h1>
                  <span>á vista {$valorAVista}</span>
                  <caption>Em 12x de {$valorParcelado}</caption>
                  <a class='btn' href='carrinho.php?nome={$nome}&imagem={$imagem}&valorAVista={$valorAVista}&valorParcelado={$valorParcelado}&quantidade=1'>
                      <img src='img/carrinho.png' />
                  
                      Adicionar produto
                  </a>
              </div>
          </div>";
      ?>
    </div>
  </div>

  <?php
      include 'footer.php';
    ?>
</body>

</html>