<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="finalizaCompra.css">
  <title>Finalizado</title>
</head>
<body>
  <div class="container">
    <?php 
        include 'header.php';
      ?>

      <div class='texto-agradecimento'>
        <h1>Obrigado por comprar conosco!</h1>
        <a href="carrinho.php?limpaCarrinho=true" class='btn-produtos'>Ver mais produtos</a>
      </div>
  </div>

  <?php
      include 'footer.php';
  ?>

</body>
</html>