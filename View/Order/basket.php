<div class="basket">
    <h2>Panier</h2>
    <?php foreach($orderElems as $elem):?>
        <div><?=$elem->product_name?></div>
        <div>x<?=$elem->quantity?></div>
        <div><?=$elem->quantity*$elem->product_price?>€</div>
        
    <?php endforeach?>
</div>