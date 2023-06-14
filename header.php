<div class="nav-bar">
    <a href="index.php">
      <img src="img/centauro.svg" width='130'>
    </a>

      <a class='sacola' href='carrinho.php'>
        <div class='qtd_produto'>
          <p> 
            <?php
            if (isset($_SESSION['produtos'])) {
              echo count($_SESSION['produtos']);
            } else {
              echo "0";
            }
            ?> 
          </p>
        </div>
        <img src="img/sacola.svg" width='25'>
      </a>

    </div>