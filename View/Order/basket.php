<div class="basket">
    <h2>Panier</h2>
    <?php $total = 0 ?>
    <div class="product-container">
        <?php foreach ($orderElems as $elem): ?>
            <div class="product-card">
                <div class="product-name">
                    <?= $elem->product_name ?>
                </div>
                <div class="quantity">
                    <?= $elem->quantity ?>
                </div>
                <div class="price">
                    <?php $price =  $elem->quantity * $elem->product_price?>
                    <?php $total += $price?>
                    <?= $price ?>€
                </div>
                <form method="POST" action="/Basket/Delete">
                    <input type="submit" value="Supprimer">
                    <input type="hidden" name="id" value="<?= $elem->id ?>">
                </form>
            </div>
        <?php endforeach ?>
    </div>

    <div id="total">Montant TTC :<?= $total ?>€</div>

    <?php if (count($orderElems)) : ?>
    <div class="basket-footer">
        <form method="POST" action="/Basket/Validate">
            <input type="submit" value="Valider la commande" class="validate-btn">
        </form>
    </div>
    <?php else : ?>
        <div>Votre panier est vide</div>
    <?php endif ?>
</div>