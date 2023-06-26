<div class="productList">
<?php foreach($products as $product) { ?>
    <div class="product">
        <div class="name"><?= $product->name; ?></div>
        <div class="description"><?= $product->description; ?></div>
        <div class="price"><?= $product->price; ?></div>
    </div>
<?php } ?>
</div>
