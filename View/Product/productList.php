<div class="search-page">
    <h2>HOME</h2>
</div>

<div class="product-cards-container">
    <?php foreach ($products as $product) { ?>
        <div class="product-card">
            <img src="<?= $product->picture ?>" alt="Product">
            <div class="name">
                <?= $product->name; ?>
            </div>
            <div class="description">
                <?= $product->description; ?>
            </div>
            <div class="price">
                <?= $product->price; ?>
            </div>
        </div>

    <?php } ?>
</div>