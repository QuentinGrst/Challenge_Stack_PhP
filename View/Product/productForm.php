<form method="POST" action="/Product/New">
    <h1>Créer un nouveau produit</h1>
    <div class="form-group">
        <input type="text" name="name" placeholder="nom du produit" />
    </div>
    <div class="form-group">
        <input type="number" name="price" step="0.01" min="0" placeholder="prix" />
    </div>
    <div class="form-group">
        <textarea name="description" placeholder="description"></textarea>
    </div>
    <div class="form-group">
        <label class="product-file">
            <input type="file" accept=".png,.jpg,.jpeg">
            <span class="label">Ajouter une image (.jpg, .png)</span>
            <img class="picture" />
            <input type="hidden" name="picture" />
        </label>
    </div>
    <div class="form-group">
        <input type="submit" value="Créer Produit" />
    </div>
</form>