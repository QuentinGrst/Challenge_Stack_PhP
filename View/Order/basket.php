<div class="basket">
    <h2>Panier</h2>
</div>

<div class="product-container">
    <?php foreach ($orderElems as $elem): ?>
        <div class="product-card">
            <div>
                <?= $elem->product_name ?>
            </div>
            <div>
                <?= $elem->quantity ?>
            </div>
            <div>
                <?= $elem->quantity * $elem->product_price ?>€
            </div>
            <form method="POST" action="/Basket/Delete">
                <input type="submit" value="Supprimer">
                <input type="hidden" name="id" value="<?= $elem->id ?>">
            </form>
        </div>
    <?php endforeach ?>
    <form method="POST" action="/Basket/Validate">
        <input type="submit" value="Valider la commande">
    </form>
</div>