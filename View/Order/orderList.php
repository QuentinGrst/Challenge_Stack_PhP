<div class="order_history">
    <h2>Historique de commandes :</h2>
    <?php foreach ($orders as $order): ?>
        <?php if (!empty($order)): ?>
            <div class="order status_<?= $order->status ?>">
                <h3>
                    <?php if ($order->status == 0) {
                        echo "[en cours] ";
                    } ?>Commande du
                    <?= (new DateTime($order->datetime))->format('d-m-Y') ?> à
                    <?= (new DateTime($order->datetime))->format('H:m:s') ?>
                </h3>
                <div class="elems">
                    <?php if (!empty($orderElems[$order->id])): ?>
                        <?php foreach ($orderElems[$order->id] as $orderElem): ?>
                            <div class="elem">
                                <h4>
                                    <?= $orderElem->product_name ?>
                                </h4>
                                <h5>x
                                    <?= $orderElem->quantity ?>
                                </h5>
                                <p>
                                    <?= $orderElem->quantity * $orderElem->product_price ?>€
                                </p>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>