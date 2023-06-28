<div class="inventory-page">
    <h2>INVENTORY</h2>
</div>

<div class="productInventory">
    <?php foreach ($products as $product) { ?>
        <div class="product">
            <div class="name">
                <?= $product->name; ?>
            </div>
            <div class="description">
                <?= $product->description; ?>
            </div>
            <div class="price">
                <?= $product->price; ?>
            </div>
            <div class="actions">
                <button class="deleteButton">Supprimer</button>
            </div>
        </div>
    <?php } ?>
</div>