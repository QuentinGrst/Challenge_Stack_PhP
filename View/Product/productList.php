<div class="search-page">
    <h2>HOME</h2>
</div>

<div class="product-cards-container">
    <?php foreach ($products as $product) { ?>
        <div class="product-card">
            <div>
                <img src="<?= $product->picture ?>" alt="Product">
            </div>
            <div class="name">
                <h3>
                    <?= $product->name; ?>
                </h3>
                <h4><a href="/Seller/<?= $product->seller_id ?>">
                        <?= $product->seller_name ?></a>
                </h4>
                <p>Description:
                    <?= $product->description ?>
                </p>
                <div>Prix:
                    <?= $product->price ?>€
                </div>
            </div>
            <form action="/Product/<?= $product->id ?>/Basket" method="POST">
                <?php if (!empty($_SESSION['user']->role) && $_SESSION['user']->role == "client"): ?>
                    <input type="submit" value="Ajouter au panier"></input>
                <?php elseif (!isset($_SESSION['user'])): ?>
                    <a href="/Login">Connexion requise pour ajouter au panier</a>
                <?php endif ?>

            </form>
        </div>

    <?php } ?>
</div>