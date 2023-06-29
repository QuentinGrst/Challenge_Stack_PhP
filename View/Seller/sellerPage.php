<div class="seller_page">
    <h2>Page de vendeur</h2>
    <br>
    <h3><?= $seller->pseudo ?></h3>
    <div>Note du vendeur: <?= $rating ?></div>

    <p>Description: <?php if ($seller->description) { echo ($seller->description); } else { echo ('Pas de description'); } ?></p>

    <?php if (!$review) : ?>
        <!-- Form for reviewing -->
        <form action="/Seller/Rating" method="POST">
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">&#9733;</label>
            </div>
            <input type="hidden" name="id" value="<?=$seller->id?>" />
            <input type="submit" value="Noter">
        </form>
    <?php endif ?>
</div>
