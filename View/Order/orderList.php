<div class="products">
    <?php foreach ($orders as $order) : ?>
        <?php if (!empty($order)) : ?>
        <div class="order">
            <h3>
                <?= $order->id ?>
            </h3>
            <?= (new DateTime($order->datetime))->format('c') ?>
            <?php foreach ($orderElems as $orderElem) : ?>
                <div class="elem">
                    <h4><?= $orderElem->product->name ?></h4>
                    <p><?= $orderElem->product->price ?>€</p>
                </div>
            <?php endforeach ?>
        </div>
        <?php endif ?>
    <?php endforeach ?>
</div>