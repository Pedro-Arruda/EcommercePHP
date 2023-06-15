<?php
session_start();

class Produto
{
  public $nome;
  public $valorParcelado;
  public $valorAVista;
  public $imagem;
  public $quantidade;
  public $valorTotal;
}

class Carrinho extends Produto {
  public function adicionaProduto($nome, $valorParcelado, $valorAVista, $imagem, $quantidade) {
    $produto = new Produto();
    $produto->nome = $nome;
    $produto->imagem = $imagem;
    $produto->valorAVista= str_replace(',', '.', $valorAVista);
    $produto->valorTotal= $produto->valorAVista;
    $produto->valorParcelado = $valorParcelado;
    $produto->quantidade = $quantidade; 

    $itemExist = false;

    foreach ($_SESSION['produtos'] as $item) {
      if ($item->nome === $nome) {
        $itemExist = true;
        $item->quantidade += 1;
        $item->valorTotal += $item->valorAVista;
      }
    }      

    if (!$itemExist) {
       array_push($_SESSION['produtos'], $produto);
    }
  }

  public function limpaCarrinho() {
     session_destroy();
  }

  public function removeProduto($nome, $valorParcelado, $valorAVista, $imagem, $quantidade) {
    $produto = new Produto();
    $produto->nome = $nome;
    $produto->imagem = $imagem;
    $produto->valorAVista= str_replace(',', '.', $valorAVista);
    $produto->valorTotal= $produto->valorAVista;
    $produto->valorParcelado = $valorParcelado;
    $produto->quantidade = $quantidade; 

    $itemExist = false;

    if (isset($_SESSION['produtos'])) {
      for ($i=0; $i <= count($_SESSION['produtos']) ; $i++) { 
        $item = $_SESSION['produtos'][$i];
  
        if ($item->nome === $nome) {
              $itemExist = true;
              $item->quantidade -= 1;
              $item->valorTotal -= $item->valorAVista;
      
              if ($item->quantidade === 0) {
                if (count($_SESSION['produtos']) === 0 || !isset($_SESSION['produtos'])) {
                  session_destroy();
                } else {
                  unset($_SESSION['produtos'][$i]);
                }
              }
            }
      }
  
      if (!$itemExist) {
         array_push($_SESSION['produtos'], $produto);
      }
    }
  }
}


if (isset($_GET['nome'])) {
  $nome = $_GET['nome'];
  $quantidade = $_GET['quantidade'];
  $valorParcelado = $_GET['valorParcelado'];
  $valorAVista = $_GET['valorAVista'];
  $imagem = $_GET['imagem'];


  if (isset($_GET['onClick'])) {
    $onClick = $_GET['onClick'];

    if ($onClick === 'remove') {
      $carrinho = new Carrinho();
  
      $carrinho->removeProduto($nome, $valorParcelado, $valorAVista, $imagem, $quantidade);
    } else {
      $carrinho = new Carrinho();
  
      $carrinho->adicionaProduto($nome, $valorParcelado, $valorAVista, $imagem, $quantidade);
    }
    
  } else {
    $carrinho = new Carrinho();
  
    $carrinho->adicionaProduto($nome, $valorParcelado, $valorAVista, $imagem, $quantidade);
  }

}

if (isset($_GET['limpaCarrinho'])) {
  $carrinho = new Carrinho();
  $carrinho->limpaCarrinho();
  header("location: index.php");
}

if (isset($_GET['nome'])) {
  header("location: carrinho.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="carrinho.css">
  <title>Carrinho</title>
</head>

<body>
  <div class="container">
    <?php
      include 'header.php';
    ?>

    <table>
      <tr>
        <td colspan='12'>Produto</td>
        <td colspan='5'>Qtd</td>
        <td class='valor'>Preço</td>
      </tr>
      <?php
      
      if (isset($_SESSION['produtos'])) {
        foreach ($_SESSION['produtos'] as $produto) {
          echo "
                <tr>  
                    <td colspan='16' >
                      <div class='td-produto'>
                        <img src='{$produto->imagem}' width='130'>
                        <span>
                          {$produto->nome}
                        </span>
                      </div>
                    </td>
                    <td class='td-quantidade'>
                    <form method='post' action='carrinho.php?nome={$produto->nome}&imagem={$produto->imagem}&valorAVista={$produto->valorAVista}&valorParcelado={$produto->valorParcelado}'>
                    
                      <a type='submit' href='carrinho.php?nome={$produto->nome}&imagem={$produto->imagem}&valorAVista={$produto->valorAVista}&valorParcelado={$produto->valorParcelado}&quantidade=$produto->quantidade&onClick=remove'>
                        <img src='./img/minus.png' width='25'/>
                      </a>

                      <p class='quantidade'>
                        $produto->quantidade
                      </p>

                      <a type='submit' href='carrinho.php?nome={$produto->nome}&imagem={$produto->imagem}&valorAVista={$produto->valorAVista}&valorParcelado={$produto->valorParcelado}&quantidade=$produto->quantidade&onClick=adiciona'>
                        <img src='./img/plus.svg' width='25'/>
                      </a>

                    </form>
                    </td>
                      <td class='valor'>
                        R$ {$produto->valorTotal}
                      </td>
                    </tr>
                  ";
                }
                }
              ?>
    </table>

    <?php

if (isset($_SESSION['produtos']) && count(($_SESSION['produtos']))) {
  ?>
  <div class='totais-container'>
    <div class='totais'>
      <p>Total: R$ <?php
        $total = array_reduce($_SESSION['produtos'], function($carry, $item) {
          return $carry + $item->valorTotal;
        });
        echo number_format($total, 2, ',', '');
        ?> 
      </p>
      <p class='center'>ou</p>
      <p>em 12x de R$ <?php echo number_format($total / 12, 2, ',', '')?></p>

      <a href='finalizaCompra.php' class='btn-finaliza-compra'>
        Finalizar compra
      </a>
    </div>
  </div>
  <?php
}
?>
  </div>

  <?php
    include 'footer.php'
  ?>
</body>

</html>