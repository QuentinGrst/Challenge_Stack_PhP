<div class="seller_page">
    <h2>Page de vendeur</h2>
    <br>
    <h3><?= $seller->pseudo ?></h3>
    <div class="review">note:</div>
    <p>Description: <?php if ($seller->description) { echo ($seller->description); } else { echo ('Pas de description'); } ?></p>
</div>