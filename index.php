<?php
  $produtos = array(
  (object) [
    'nome' => "Tênis Nike Air Force 1 07 Masculino",
    'imagem' => "https://imgnike-a.akamaihd.net/768x768/01113751.jpg",
    'valorAVista' => '799,99',
    'valorParcelado' => 'R$ 24,99',
  ],

  (object) [
    'nome' => "Camisa do Palmeiras I 23 Masculina Puma Torcedor",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/250x250/98054507A1/camisa-do-palmeiras-i-23-masculina-puma-torcedor-img.jpg',
    'valorAVista' => '329,90',
    'valorParcelado' => '24,99',
  ],

  (object) [
    'nome' => "Chuteira Society adidas Deportivo II - Adulto",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/250x250/97997829A1/chuteira-society-adidas-deportivo-ii-adulto-img.jpg',
    'valorAVista' => '259,90',
    'valorParcelado' => '21,66',
  ],

  (object) [
    'nome' => "Camisa do São Paulo II adidas - Masculina",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/500x500/9811683I/camisa-do-sao-paulo-ii-adidas-masculina-img.jpg',
    'valorAVista' => '349,99',
    'valorParcelado' => '29,17',
  ],

  (object) [
    'nome' => "Nike Dunk Low Black Panda",
    'imagem' => 'https://droper-media.us-southeast-1.linodeobjects.com/2712023191225313.webp',
    'valorAVista' => '1190,99',
    'valorParcelado' => '99,25',
  ],

  (object) [
    'nome' => "Mala Nike Brasilia M Duff 9.5 - 60 Litros",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/500x500/97063931/mala-nike-brasilia-m-duff-9-5-60-litros-img.jpg',
    'valorAVista' => '239,99',
    'valorParcelado' => '19,99',
  ],

  (object) [
    'nome' => "Conjunto de Agasalho Feminino Puma Treino Loungewear TR",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/250x250/98066612A1/conjunto-de-agasalho-feminino-puma-treino-loungewear-tr-img.jpg',
    'valorAVista' => '399,99',
    'valorParcelado' => '33,34',
  ],

  (object) [
    'nome' => "Tênis Cano Alto Converse All Star CT AS Core HI CT0004 - Unissex",
    'imagem' => 'https://imgcentauro-a.akamaihd.net/500x500/88383319A3/tenis-cano-alto-converse-all-star-ct-as-core-hi-ct0004-unissex-img.jpg',
    'valorAVista' => '249,99
    ',
    'valorParcelado' => '20,84',
  ],

  
);

session_start();
$_SESSION['carrinho'] = []
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Centauro</title>
</head>

<body>
  <div class="container">
    <?php
      include 'header.php';
    ?>

    <div class="container-promocoes">
      <div class="title">
        <img src="img/desconto" />
        <h1>Promoções</h1>
      </div>

      <div class="produtos">
        <?php
        for ($i = 0; $i < 4; $i++) {
          echo "
          <a class='card-produto' href='produto.php?nome={$produtos[$i]->nome}&imagem={$produtos[$i]->imagem}&valorAVista={$produtos[$i]->valorAVista}&valorParcelado={$produtos[$i]->valorParcelado}'>
          <img src={$produtos[$i]->imagem}>
          <p>{$produtos[$i]->nome}</p>
          <span>á vista por R$ {$produtos[$i]->valorAVista}</span>
          <caption>ou em 12 x de R$ {$produtos[$i]->valorParcelado} </caption>
      </a>";
        }
        ;
        ?>
      </div>

      <div class="title">
        <img src="img/novos-produtos" />
        <h1>Novos produtos</h1>
      </div>
      <div class="produtos">
        <?php
        for ($i = 4; $i < 8; $i++) {
          echo "
            <a class='card-produto' href='produto.php?nome={$produtos[$i]->nome}&imagem={$produtos[$i]->imagem}&valorAVista={$produtos[$i]->valorAVista}&valorParcelado={$produtos[$i]->valorParcelado}'>
                <img src={$produtos[$i]->imagem}>
                <p>{$produtos[$i]->nome}</p>
                <span>á vista por R$ {$produtos[$i]->valorAVista}</span>
                <caption>ou em 12 x de R$ {$produtos[$i]->valorParcelado} </caption>
            </a>";
        }
        ;
        ?>
      </div>
    </div>
  </div>

  <?php
      include 'footer.php';
  ?>
</body>

</html>