
<div class="home_page">
  <h2>HOME</h2>
  <h3></h3>
</div>

<div class="product-cards-container">
  <?php foreach($orderElems as $elem):?>
    <div class="product-card">
      <div>
        <img src="product1.jpg" alt="Product">
      </div>
      <div>
        <h4><?=$elem->name?></h4>
        <p>Description: <?=$elem->description?></p>
        <div>Prix: <?=$elem->price?>€</div>
      </div>
      <button>Ajouter au panier</button>
    </div>
  <?php endforeach?>
</div>








