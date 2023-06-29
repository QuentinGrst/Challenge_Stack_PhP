<div class="inventory-page">
    <h2>INVENTORY</h2>
</div>

<div class="productInventory">
    <?php foreach ($products as $product): ?>
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
            <p>
                <?= $product->seller_id ?>
            </p>
            <div class="actions">
                <form action="/Product/Archive" method="POST">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <input class="deleteButton" type="submit" value="Supprimer">
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div class="separator"></div>
<div class=" inventory-page">
    <h3>ARCHIVED</h3>
</div>
<div class="productInventory archived">
    <?php foreach ($archived as $product): ?>
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
                <form action="/Product/Archive" method="POST">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <input class="addButton" type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>