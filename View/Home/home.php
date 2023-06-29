<div class="home_page">
  <h2>HOME</h2>
</div>

<div class="product-cards-container">
  <?php foreach ($orderElems as $elem): ?>
    <div class="product-card">
      <div>
        <img src="<?= $elem->picture ?>" alt="Product">
      </div>
      <div>
        <div>
          <h3>
            <?= $elem->name ?>
          </h3>
          <h4><a href="/Seller/<?= $elem->seller_id ?>">
              <?= $elem->seller_name ?></a>
          </h4>
          <p>Description:
            <?= $elem->description ?>
          </p>
          <div>Prix:
            <?= $elem->price ?>€
          </div>
        </div>
        <form action="/Product/<?= $elem->id ?>/Basket" method="POST">
          <?php if (!empty($_SESSION['user']->role) && $_SESSION['user']->role == "client"): ?>
            <input type="submit" value="Ajouter au panier"></input>
          <?php elseif (!isset($_SESSION['user'])): ?>
            <a href="/Login">Connexion requise pour ajouter au panier</a>
          <?php endif ?>

        </form>
      </div>
    </div>
  <?php endforeach ?>
</div>